<?php

include_once("../function/session.php");
include_once("../DB/config.php");

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
    $query = "SELECT * FROM stampa_fattura WHERE id LIKE \"%" . $check . "%\" OR cliente LIKE \"%" . $check . "%\" OR Piva LIKE \"%" . $check . "%\"  OR cf LIKE \"%" . $check . "%\"";
} else {
    $check = '';
$query = "SELECT * FROM stampa_fattura";
}

$result = $conndb->query($query);

$newKey = array();

while ($fattura = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $fattura->id,
        "data" => [
            "num" => $fattura->id,
            "data_doc" => $fattura->data_doc,
            "arr_qta" => $fattura->arr_qta,
            "arr_beni" => $fattura->arr_beni,
            "arr_misure" => $fattura->arr_misure,
            "note" => $fattura->note
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}
