<?php

include_once("../function/session.php");
include_once("../DB/config.php");

// Queries
if (isset($_GET["check"])) {
    $check = mysqli_real_escape_string($conndb, $_GET["check"]);
} else {
    $check = false;
}

$query = "SELECT stampa_ddt.*, clienti.*
                FROM stampa_ddt
                  LEFT JOIN clienti
                    ON stampa_ddt.cf=clienti.CFC";

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

while ($ddt = $result->fetch_object()) {
    array_push($newKey, [
        "value" => $ddt->id,
        "data" => [
            "num" => $ddt->id,
            "codC" => $ddt->codC,
            "nomeC" => $ddt->nomeC,
            "cognomeC" => $ddt->cognomeC,
            "data_doc" => $ddt->data_doc,
            "data_rit" => $ddt->data_rit,
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