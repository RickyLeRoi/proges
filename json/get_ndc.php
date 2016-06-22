<?php

include_once("../function/session.php");
include_once("../DB/config.php");

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
} else {
    $check = false;
}

$querya = "SELECT * FROM stampa_ndc";
$queryb = "SELECT codC, nomeC, cognomeC FROM clienti";

if ($check != false) {
    $queryb .= " WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"";
}

$resulta = $conndb->query($querya);
$resultb = $conndb->query($queryb);

$newKey = array();

while (($ndc = $resulta->fetch_object()) && ($clienti = $resultb->fetch_object())) {
    array_push($newKey, [
        "value" => $ndc->id,
        "data" => [
            "num" => $ndc->id,
            "codC" => $clienti->codC,
            "nomeC" => $clienti->nomeC,
            "cognomeC" => $clienti->cognomeC,
            "data_doc" => $ndc->data_doc,
            "pagamDescr" => $ndc->pagamento,
            "totale" => $ndc->tot_dovuto
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}