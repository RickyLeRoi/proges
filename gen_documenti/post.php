<?php

$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("../DB/config.php");
include_once("./../function/session.php");
/*

    [data] =>
    [pagamento] => rimessa diretta
    [cliente] =>
    [ivaCliente] =>
    [indirizzoCliente] =>
    [cittaCliente] =>
    [pr] =>
    [cap] =>
    [arrayQuantita] =>
    [arrayProdotti] => piselli surgelati Findus||Bellissimo
    [arrayPrezziCad] => 28.00||30.00
    [arrayPrezzi] => 28.00||30.00
    [parziale] => 58.00
    [iva] => 22
    [totaleDovuto] => 70.76
    [esIvaDal] =>
    [esIvaAl] =>

*/

if (isset($_POST["data"])) {
    $insert = $_POST["data"];
    $sql = "INSERT INTO" ... 
    /*..*/
}
?>