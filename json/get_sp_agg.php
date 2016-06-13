<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb,$_GET["check"]);

    else $check = "Nessuna query";

$query = "SELECT * FROM ck_sp_agg WHERE tipo LIKE \"%" . $check . "%\" OR descr LIKE \"%" . $check . "%\"";

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

while ($sp_agg= $result->fetch_object()) {
//echo $articoli->id;
    array_push($newKey, [
        "valua" => $sp_agg->id,
        "dati" => [
            "tipo" => $sp_agg->tipo,
            "descr" => $sp_agg->descr,
            "prezzo" => $sp_agg->prezzo,
            "reg_note" => $sp_agg->reg_date
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

