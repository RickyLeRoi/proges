<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = "Nessuna query";

$querya = "SELECT * FROM articoli";
$queryb = "SELECT * FROM stampa_ddt";

if ($check != false) {
    $querya .= " WHERE descr LIKE \"%" . $check . "%\" OR cod_barre LIKE \"%" . $check . "%\" OR cod_int LIKE \"%" . $check . "%\"";
    $queryb .= " WHERE cliente LIKE \"%" . $check . "%\" OR Piva LIKE \"%" . $check . "%\" OR cf LIKE \"%" . $check . "%\"";
}

$resulta = $conndb->query($querya);
$resultb = $conndb->query($queryb);

$newKey = array();

while ($articoli = $resulta->fetch_object()) {
    array_push($newKey, [
        "value" => $articoli->id,
        "data" => [
            "cod_int" => $articoli->cod_int,
            "misura" => $articoli->misura,
            "descr" => $articoli->descr,
            "cod_barre" => $articoli->cod_barre,
            "prezzo" => $articoli->prezzo,
            "note" => $articoli->note,
        ]
    ]);
}

while ($ddt = $resultb->fetch_object()) {
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