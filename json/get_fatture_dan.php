<?php

include_once("../function/session.php");
include_once("../DB/config.php");

/*sei solo un coglione*/

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
} else {
    $check = false;
}

$querya = "SELECT stampa_fattura.*, codC, nomeC, cognomeC FROM stampa_fattura LEFT JOIN clienti on stampa_fattura.Piva=clienti.PIVAC";

$resulta = $conndb->query($querya);

$newKey = array();

while ($fattura = $resulta->fetch_object()) {
    array_push($newKey, [
        "value" => $fattura->id,
        "data" => [
            "num" => $fattura->id,
            "codC" => $fattura->codC,
            "nomeC" => $fattura->nomeC,
            "cognomeC" => $fattura->cognomeC,
            "data_doc" => $fattura->data_doc,
            "pagamDescr" => $fattura->pagamento,
            "totale" => $fattura->tot_dovuto
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}
