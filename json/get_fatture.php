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
    $query = "SELECT stampa_fattura.*
              FROM stampa_fattura
              WHERE cliente LIKE \"%" . $check . "%\" OR codC LIKE \"%" . $check . "%\"
              ORDER BY id DESC LIMIT " . $limit . " OFFSET " . $page;
} else {
    $check = '';
    $query = "SELECT stampa_fattura.*
              FROM stampa_fattura
              ORDER BY id DESC";
}

$result = $conndb->query($query);

$newKey = array();

while ($fattura = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $fattura->id,
        "data" => [
            "num" => $fattura->id,
            "codC" => $fattura->codC,
            "cliente" => $fattura->cliente,
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
