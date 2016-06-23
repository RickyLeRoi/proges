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

//$stampa = "fattura";

// INSERIMENTO DATI VIA POST
if (isset($_POST["data"])) {
    $insert = $_POST["data"];
    $stampa = $insert["richiesta"];
    //Parti dalla numerazione attuale

    //Se si tratta di fattura o preventivo
    if ($stampa == "fattura" || $stampa == "preventivo") {
        include_once("./postdatas/fatt_prev.php");
    }

    if ($stampa == "ddt") {
        include_once("./postdatas/ddt.php");
    }

}

// RICEZIONE DEI DATI VIA GET
if (isset($_GET["fattura_n"]) || isset($_GET["preventivo_n"]) || isset($_GET["ndc_n"]) && isset($_GET["documento"])) {
    $stampa = $_GET["documento"];
    if (isset($_GET["fattura_n"])) {
        $id_doc = $_GET["fattura_n"];
    }
    if (isset($_GET["preventivo_n"])) {
        $id_doc = $_GET["preventivo_n"];
    }

    if (isset($_GET["ndc_n"])) {
        $id_doc = $_GET["ndc_n"];
    }


    $sql = "SELECT * FROM stampa_" . $stampa . " WHERE id=" . $id_doc;

    if ($result = $conndb->query($sql)) {
        $obj = $result->fetch_object();

        $id = $obj->id;
        $data = $obj->data_doc;
        $anno = explode("-", $obj->data_doc);
        $anno = $anno[0];
        $cliente = $obj->cliente;
        $piva = $obj->Piva;
        $indirizzo = $obj->indirizzo;
        $citta = $obj->citta;
        $prov = $obj->prov;
        $cap = $obj->cap;

        $pagamento_scelto = $obj->pagamento;
        $quantita = explode("||", $obj->arr_qta);      //
        $prodotti = explode("||", $obj->arr_beni);      //  Da ciclare nel foglio fatture stampato.
        $prezzi_cad = explode("||", $obj->arr_imp_uni);   //
        $prezzi = explode("||", $obj->arr_importo);          //
        $iva_scelta = $obj->iva;
        $parziale = $obj->tot_parziale;
        $totale = $obj->tot_dovuto;

        $memory = "[";
        foreach ($prodotti as $prodotto) {
            $memory .= '"' . $prodotto . '",';
        }
        $memory .= "\"default\"]";
        $post = true;
        $azione = "modifica";
        if (isset($_GET["fattura_n"])) {
            $esente_num = $obj->esente_num;
            $esente_dal = $obj->esente_dal;
            $esente_al = $obj->esente_al;

            include_once("fattura.php");
        }

        if (isset($_GET["ndc_n"])) {
            $esente_num = $obj->esente_num;
            $esente_dal = $obj->esente_dal;
            $esente_al = $obj->esente_al;
            include_once("ndc.php");
        }

        if (isset($_GET["preventivo_n"])) {
            include_once("preventivo.php");
        }

    }

}

if (isset($_GET["ddt_n"])) {
    $stampa = $_GET["documento"];
    $id_doc = $_GET["ddt_n"];
    $azione = "modifica";

    $sql = "SELECT * FROM stampa_" . $stampa . " WHERE id=" . $id_doc;

    if ($result = $conndb->query($sql)) {
        $obj = $result->fetch_object();
        $post = true;

        //print_r($obj);




        $id = $obj->id;
        $data = $obj->data_doc;

        $cliente = $obj->cliente;
        $piva = $obj->Piva;
        $indirizzo = $obj->indirizzo;
        $citta = $obj->citta;
        $prov = $obj->prov;
        $cap = $obj->cap;
        $causale = $obj->causale;
        $imballo = $obj->imballo;
        $colli = $obj->n_colli;
        $peso = $obj->peso;
        $quantita = explode("||", $obj->arr_qta);      //
        $prodotti = explode("||", $obj->arr_beni);      //  Da ciclare nel foglio fatture stampato.
        $prezzi_cad = explode("||", $obj->arr_imp_uni);

        $data_rit = $obj->data_rit;
        $data_rit = explode(" ", $data_rit);
        $data_rit = $data_rit[0] . "T" . $data_rit[1];


        $data_consegna = $obj->data_consegna;
        $data_consegna = explode(" ", $data_consegna);
        $data_consegna = $data_consegna[0] . "T" . $data_consegna[1];

        $vettore = $obj->vettore;
        $note = $obj->note;

        $vettore = $obj->vettore;

        $memory = "[";
        foreach ($prodotti as $prodotto) {
            $memory .= '"' . $prodotto . '",';
        }
        $memory .= "\"default\"]";
        include_once("./ddt.php");
    }
}

?>
