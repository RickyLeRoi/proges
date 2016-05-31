<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = false;

$query = "SELECT ddt.*, numerazione_ddt.*, clienti.nomeC, clienti.cognomeC, clienti.codC
                FROM ddt
                  LEFT JOIN numerazione_ddt
                    ON ddt.id=numerazione_ddt.id
                  LEFT JOIN clienti
                    ON numerazione_ddt.dest=clienti.id";

//echo $query;
if ($check != false) {
    $query .= " WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"";
}

/* check connection */


if ($conndb->query($query)) {
    //if ($debug === true) printf("/* Select returned %d rows. */\n", $result->num_rows);
    $result = $conndb->query($query);
} else {
    echo $conndb->connect_errno;
}

if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);

}

$newKey = array();


while ($ddt = $result->fetch_object()) {
//echo $ddt->id;
    array_push($newKey, [
        "value" => $ddt->id,
        "data" => [
            "num" => $ddt->num,
            "codC" => $ddt->codC,
            "nomeC" => $ddt->nomeC,
            "cognomeC" => $ddt->cognomeC,
            "note" => $ddt->note,
            "reg_date" => $ddt->reg_date
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

