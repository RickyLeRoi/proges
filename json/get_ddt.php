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
    $query = "SELECT stampa_ddt.*
              FROM stampa_ddt
              WHERE cliente LIKE \"%" . $check . "%\" OR  codC LIKE \"%" . $check . "%\"
              ORDER BY id DESC LIMIT " . $limit . " OFFSET " . $page;
} else {
    $check = '';
    $query = "SELECT stampa_ddt.*
              FROM stampa_ddt
              ORDER BY id DESC";
}

$result = $conndb->query($query);

$newKey = array();

while ($ddt = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $ddt->id,
        "data" => [
            "num" => $ddt->id,
            "codC" => $ddt->codC,
            "cliente" => $ddt->cliente,
            "data_doc" => $ddt->data_doc,
            "data_rit" => $ddt->data_rit,
            "data_consegna" => $ddt->data_consegna,
            "note" => $ddt->note
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}
