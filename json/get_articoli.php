<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb,$_GET["check"]);

    else $check = "Nessuna query";

$query = "SELECT * FROM articoli WHERE misura LIKE \"%" . $check . "%\" OR descr LIKE \"%" . $check . "%\" OR cod_barre LIKE \"%" . $check . "%\" OR prezzo LIKE \"%" . $check . "%\" OR cod_int LIKE \"%" . $check . "%\"";

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

while ($articoli= $result->fetch_object()) {
//echo $articoli->id;
    array_push($newKey, [
        "value" => $articoli->id,
        "data" => [
            "cod_int" => $articoli->cod_int,
            "misura" => $articoli->misura,
            "descr" => $articoli->descr,
            "misura" => $articoli->misura,
            "cod_barre" => $articoli->cod_barre,
            "prezzo" => $articoli->prezzo,
            "tipologia" => $articoli->tipologia,
            "note" => $articoli->note
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

