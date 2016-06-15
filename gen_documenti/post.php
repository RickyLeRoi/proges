<?php

$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("../DB/config.php");
include_once("./../function/session.php");
$modifica = false;
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
    //print_r($_POST["data"]);
    $sql = "SELECT id FROM stampa_" . $stampa . " ORDER BY id DESC";

    if ($result = $conndb->query($sql)) {
        $obj = $result->fetch_object();
        $fattura_n = $obj->id + 1;
    }

    //print_r($_POST["data"]);

    $insert = $_POST["data"];

    if ($insert["esenteNum"] === "") {
        $insert["esenteNum"] = 1;
        $insert["esIvaDal"] = date('Y-m-d');
        $insert["esIvaAl"] = date('Y-m-d');
    }

    if ($modifica == true) {

        $sql = "UPDATE stampa_" . $stampa . "
        SET data='" . $insert["data"] . "', pagamento='" . $insert["pagamento"] . "', cliente='" . $insert["cliente"] . "', piva='" . $insert["ivaCliente"] . "', indirizzo='" . $insert["indirizzoCliente"] . "', citta='" . $insert["cittaCliente"] . "', prov='" . $insert["pr"] . "', cap='" . $insert["cap"] . "', quantita='" . $insert["arrayQuantita"] . "', prodotti='" . $insert["arrayProdotti"] . "', prezziCad='" . $insert["arrayPrezziCad"] . "', prezzi='" . $insert["arrayPrezzi"] . "', parziale='" . $insert["parziale"] . "', totale='" . $insert["totaleDovuto"] . "', esente_num='" . $insert["esenteNum"] . "', esente_dal='" . $insert["esIvaDal"] . "', esente_al='" . $insert["esIvaAl"] . "'
        WHERE id=" . $insert["fattId"];

        $fattura_n = $insert["fattId"];
    } else {

    $sql = "INSERT INTO stampa_" . $stampa . " 
    (id, data, pagamento, cliente, piva, indirizzo, citta, prov, cap, quantita, prodotti, prezziCad, prezzi, parziale, totale, iva, esente_num, esente_dal, esente_al) values
    ('" . $fattura_n . "','" . $insert["data"] . "','" . $insert["pagamento"] . "','" . $insert["cliente"] . "','" . $insert["ivaCliente"] . "','" . $insert["indirizzoCliente"] . "','" . $insert["cittaCliente"] . "','" . $insert["pr"] . "','" . $insert["cap"] . "','" . $insert["arrayQuantita"] . "','" . $insert["arrayProdotti"] . "','" . $insert["arrayPrezziCad"] . "','" . $insert["arrayPrezzi"] . "','" . $insert["parziale"] . "','" . $insert["totaleDovuto"] . "','" . $insert["iva"] . "','" . $insert["esenteNum"] . "','" . $insert["esIvaDal"] . "','" . $insert["esIvaAl"] . "')";
        //echo "/*".$sql."*/";
    }
    if ($result = $conndb->query($sql)) {
        //echo $sql;
        echo json_encode(
            [
                "vai" => "ok",
                "dove" => $fattura_n,
                "cosa" => $stampa . "_n"
            ]
        );

    } else {
        echo "//" . $conndb->error;
        echo json_encode(
            [
                "vai" => "no"
            ]
        );
    }
}

if (isset($_GET["fattura_n"])) {
    $id_fattura = $_GET["fattura_n"];

    $sql = "SELECT * FROM stampa_" . $stampa . " WHERE id=" . $id_fattura;

    if ($result = $conndb->query($sql)) {
        $obj = $result->fetch_object();

        $id = $obj->id;
        $data = $obj->data;
        $anno = explode("-", $obj->data);
        $anno = $anno[0];
        $cliente = $obj->cliente;
        $piva = $obj->piva;
        $indirizzo = $obj->indirizzo;
        $citta = $obj->citta;
        $prov = $obj->prov;
        $cap = $obj->cap;

        $pagamento_scelto = $obj->pagamento;
        $quantita = explode("||", $obj->quantita);      //
        $prodotti = explode("||", $obj->prodotti);      //  Da ciclare nel foglio fatture stampato.
        $prezzi_cad = explode("||", $obj->prezziCad);   //
        $prezzi = explode("||", $obj->prezzi);          //
        $iva = $obj->iva;
        $parziale = $obj->parziale;
        $totale = $obj->totale;
        $esente_num = $obj->esente_num;
        $esente_dal = $obj->esente_dal;
        $esente_al = $obj->esente_al;

        $memory = "[";
        foreach ($prodotti as $prodotto) {
            $memory .= '"' . $prodotto . '",';
        }
        $memory .= "\"default\"]";
        $post = true;
        include_once("fattura.php");
        $modifica = true;
    }

}


?>