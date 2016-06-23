<?php

include_once("../function/session.php");
include_once("../DB/config.php");

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
    $query = "SELECT stampa_ddt.*, codC, nomeC, cognomeC
              FROM stampa_ddt
              LEFT JOIN clienti ON stampa_ddt.Piva=clienti.PIVAC OR stampa_ddt.Piva=CFC
              WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"
              ORDER BY stampa_ddt.id ASC";
} else {
    $check = '';
    $query = "SELECT stampa_ddt.*, codC, nomeC, cognomeC
              FROM stampa_ddt
              LEFT JOIN clienti ON stampa_ddt.Piva=clienti.PIVAC OR stampa_ddt.Piva=CFC
              ORDER BY stampa_ddt.id ASC";
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
