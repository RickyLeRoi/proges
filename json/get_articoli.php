<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb,$_GET["check"]);

else $check = "Nessuna query";





$query = "SELECT * FROM articoli WHERE misura LIKE \"%" . $check . "%\" OR descr LIKE \"%" . $check . "%\" OR cod_barre LIKE \"%" . $check . "%\" OR prezzo LIKE \"%" . $check . "%\" OR cod_int LIKE \"%" . $check . "%\"";

//print_r($query);
if ((isset($_GET["page"])) && (isset($_GET["limit"]))) {
    $page = $_GET["page"];
    $limit = $_GET["limit"];

    $query .= "ORDER BY articoli.id DESC LIMIT " . $limit . " OFFSET " . $page;
    //print_r($query);
}



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
            "note" => $articoli->note,
            "cliente" => $articoli->cliente
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

