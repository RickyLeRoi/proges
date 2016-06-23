<?php

include_once("../function/session.php");
include_once("../DB/config.php");

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
    $query = "SELECT stampa_fattura.*, codC, nomeC, cognomeC
              FROM stampa_fattura
              LEFT JOIN clienti ON stampa_fattura.Piva=clienti.PIVAC OR stampa_fattura.Piva=CFC
              WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"
              ORDER BY stampa_fattura.id ASC";
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
