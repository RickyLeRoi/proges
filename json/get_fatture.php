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
    $query = "SELECT stampa_fattura.*, codC, nomeC, cognomeC
              FROM stampa_fattura
              LEFT JOIN clienti ON stampa_fattura.Piva=clienti.PIVAC OR stampa_fattura.Piva=CFC
              WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"
              ORDER BY stampa_fattura.id ASC LIMIT " . $limit . " OFFSET " . $page;
} else {
    $check = '';
    $query = "SELECT stampa_fattura.*, codC, nomeC, cognomeC
              FROM stampa_fattura
              LEFT JOIN clienti ON stampa_fattura.Piva=clienti.PIVAC OR stampa_fattura.Piva=CFC
              ORDER BY stampa_fattura.id ASC";
}

$result = $conndb->query($query);

$newKey = array();

while ($fattura = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $fattura->id,
        "data" => [
            "num" => $fattura->id,
            "codC" => $fattura->codC,
            "nomeC" => $fattura->nomeC,
            "cognomeC" => $fattura->cognomeC,
            "data_doc" => $fattura->data_doc,
            "pagamDescr" => $fattura->pagamento,
            "totale" => $fattura->tot_dovuto,
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}
