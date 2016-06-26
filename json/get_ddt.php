<?php

include_once("../function/session.php");
include_once("../DB/config.php");

if ((isset($_GET["page"])) && (isset($_GET["limit"]))) {
    $page = $_GET["page"];
    $limit = $_GET["limit"];
} else {
    $page = 0;
    $limit = 30;
}

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
    $query = "SELECT stampa_ddt.*, codC, nomeC, cognomeC
              FROM stampa_ddt
              LEFT JOIN clienti ON stampa_ddt.Piva=clienti.PIVAC OR stampa_ddt.Piva=CFC
              WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"
              ORDER BY stampa_ddt.id DESC LIMIT " . $limit . " OFFSET " . $page;
} else {
    $check = '';
    $query = "SELECT stampa_ddt.*, codC, nomeC, cognomeC
              FROM stampa_ddt
              LEFT JOIN clienti ON stampa_ddt.Piva=clienti.PIVAC OR stampa_ddt.Piva=CFC
              ORDER BY stampa_ddt.id DESC";
}

$result = $conndb->query($query);

$newKey = array();

while ($ddt = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $ddt->id,
        "data" => [
            "num" => $ddt->id,
            "codC" => $ddt->codC,
            "nomeC" => $ddt->nomeC,
            "cognomeC" => $ddt->cognomeC,
            "data_doc" => $ddt->data_doc,
            "data_rit" => $ddt->data_rit,
            "data_consegna" => $ddt->data_consegna,
            "note" => $ddt->note
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}
