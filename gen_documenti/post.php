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
$stampa = "fattura";

if (isset($_POST["data"])) {

    //Parti dalla numerazione attuale

    $sql = "SELECT id FROM stampa_" . $stampa . " ORDER BY id DESC";

    if ($result = $conndb->query($sql)) {
        $obj = $result->fetch_object();
        $fattura_n = $obj->id + 1;
    }

    //print_r($_POST["data"]);

    $insert = $_POST["data"];
    $sql = "INSERT INTO stampa_" . $stampa . " 
    (id, pagamento, cliente, iva, indirizzo, citta, prov, cap, quantita, prodotti, prezziCad, prezzi, parziale, totale, iva_dal, iva_al, data) values
    (" . $fattura_n . ",'" . $insert["pagamento"] . "','" . $insert["cliente"] . "','" . $insert["ivaCliente"] . "','" . $insert["indirizzoCliente"] . "','" . $insert["cittaCliente"] . "','" . $insert["pr"] . "','" . $insert["cap"] . "','" . $insert["arrayQuantita"] . "','" . $insert["arrayProdotti"] . "','" . $insert["arrayPrezziCad"] . "','" . $insert["arrayPrezzi"] . "','" . $insert["parziale"] . "','" . $insert["totaleDovuto"] . "','" . $insert["esIvaDal"] . "','" . $insert["esIvaAl"] . "','" . $insert["data"] . "')";
    //echo "/*".$sql."*/";
    if ($result = $conndb->query($sql)) {
        echo $sql;
    } else echo "//" . $conndb->error;
}

if (isset($_GET["fattura_n"])) {
    $id_fattura = $_GET["fattura_n"];
    $sql = "SELECT * FROM stampa_" . $stampa . " WHERE id=" . $id_fattura;
    $result = $conndb->query($sql);
    $obj = $result->fetch_object();

    $quantita = explode("||", $obj->quantita);      //
    $prodotti = explode("||", $obj->prodotti);      //  Da ciclare nel foglio fatture stampato. 
    $prezzi_cad = explode("||", $obj->prezziCad);   //
    $prezzi = explode("||", $obj->prezzi);          //

    print_r($prezzi);
}
?>