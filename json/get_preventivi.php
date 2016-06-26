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
    $query = "SELECT stampa_preventivo.*, codC, nomeC, cognomeC
              FROM stampa_preventivo
              LEFT JOIN clienti ON stampa_preventivo.Piva=clienti.PIVAC OR stampa_preventivo.Piva=CFC
              WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"
              ORDER BY stampa_preventivo.id DESC LIMIT " . $limit . " OFFSET " . $page;
} else {
    $check = '';
    $query = "SELECT stampa_preventivo.*, codC, nomeC, cognomeC
              FROM stampa_preventivo
              LEFT JOIN clienti ON stampa_preventivo.Piva=clienti.PIVAC OR stampa_preventivo.Piva=CFC
              ORDER BY stampa_preventivo.id DESC";
}

$result = $conndb->query($query);

$newKey = array();

while ($prev = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $prev->id,
        "data" => [
            "num" => $prev->id,
            "codC" => $prev->codC,
            "nomeC" => $prev->nomeC,
            "cognomeC" => $prev->cognomeC,
            "data_doc" => $prev->data_doc,
            "pagamDescr" => $prev->pagamento,
            "totale" => $prev->tot_dovuto,
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}
