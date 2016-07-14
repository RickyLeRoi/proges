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
    $query = "SELECT stampa_ndc.*
              FROM stampa_ndc
              WHERE cliente LIKE \"%" . $check . "%\" OR codC LIKE \"%" . $check . "%\"
              ORDER BY id DESC LIMIT " . $limit . " OFFSET " . $page;
} else {
    $check = '';
    $query = "SELECT stampa_ndc.*
              FROM stampa_ndc
              ORDER BY id DESC";
}

$result = $conndb->query($query);

$newKey = array();

while ($ndc = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $ndc->id,
        "data" => [
            "num" => $ndc->id,
            "codC" => $ndc->codC,
            "cliente" => $ndc->cliente,
            "data_doc" => $ndc->data_doc,
            "pagamDescr" => $ndc->pagamento,
            "totale" => $ndc->tot_dovuto,
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}
