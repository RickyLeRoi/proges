<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = "Nessuna query";

$query = "SELECT id, nomeC, cognomeC, indirizzoLC, cittaLC, provLC, capLC, PIVAC, CFC FROM clienti WHERE nomeC LIKE \"%" . $check . "%\" OR cognomeC LIKE \"%" . $check . "%\" OR indirizzoLC LIKE \"%" . $check . "%\" OR cittaLC LIKE \"%" . $check . "%\" OR PIVAC LIKE \"%" . $check . "%\" OR emailLC LIKE \"%" . $check . "%\"";

/* check connection */


if ($result = $conndb->query($query)) {
    //if ($debug === true) printf("/* Select returned %d rows. */\n", $result->num_rows);
    //echo $query;

    $result = $conndb->query($query);
}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);

}

$newKey = array();

while ($clienti = $result->fetch_object()) {
//echo $clienti->id;
    if ($clienti->PIVAC == "") {
        $clienti->PIVAC = $clienti->CFC;
    }

    array_push($newKey, [
        "value" => $clienti->id,
        "data" => [
            "nomeC" => check_null($clienti->nomeC),
            "cognomeC" => check_null($clienti->cognomeC),
            "indirizzoLC" => check_null($clienti->indirizzoLC),
            "cittaLC" => check_null($clienti->cittaLC),
            "provLC" => check_null($clienti->provLC),
            "capLC" => check_null($clienti->capLC),
            "PIVAC" => check_null($clienti->PIVAC)
        ]
    ]);
}

function check_null($val)
{
    if (($val == "") || ($val == " ")) {
        return "ND";
    } else return $val;
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

