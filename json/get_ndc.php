<?php

include_once("../function/session.php");
include_once("../DB/config.php");

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
} else {
    $check = false;
}

$query = "SELECT stampa_ndc.*, clienti.*
                FROM stampa_ndc
                  LEFT JOIN clienti
                    ON stampa_ndc.cf=clienti.CFC";

if ($check != false) {
    $query .= " WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"";
}

/* check connection */
if ($result = $conndb->query($query)) {
    $result = $conndb->query($query);
}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);
}

$newKey = array();

while ($ndc = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $ndc->id,
        "data" => [
            "num" => $ndc->id,
            "codC" => $ndc->codC,
            "nomeC" => $ndc->nomeC,
            "cognomeC" => $ndc->cognomeC,
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