<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = "Nessuna query";

$query = "SELECT * FROM stampa_ddt";

if ($check != false) {
    $query .= " WHERE cliente LIKE \"%" . $check . "%\" OR Piva LIKE \"%" . $check . "%\" OR cf LIKE \"%" . $check . "%\"";
}

$result = $connd->query($query);

$newKey = array();

while ($ddt = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $ddt->id,
        "data" => [
            "num" => $ddt->id,
            "data_doc" => $ddt->data_doc,
            "arr_qta" => $ddt->arr_qta,
            "arr_beni" => $ddt->arr_beni,
            "arr_misure" => $ddt->arr_misure,
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}