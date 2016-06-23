<?php

include_once("../function/session.php");
include_once("../DB/config.php");

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
    $query = "SELECT stampa_preventivo.*, codC, nomeC, cognomeC
              FROM stampa_preventivo
              LEFT JOIN clienti ON stampa_preventivo.Piva=clienti.PIVAC OR stampa_preventivo.Piva=CFC
              WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"
              ORDER BY stampa_preventivo.id ASC";
} else {
    $check = '';
    $query = "SELECT stampa_preventivo.*, codC, nomeC, cognomeC
              FROM stampa_preventivo
              LEFT JOIN clienti ON stampa_preventivo.Piva=clienti.PIVAC OR stampa_preventivo.Piva=CFC
              ORDER BY stampa_preventivo.id ASC";
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
