<?php
/**
 * Created by PhpStorm.
 * User: danielo
 * Date: 20/06/2016
 * Time: 17:20
 */

date_default_timezone_set("europe/rome");

//print_r($_POST["data"]);


if (!isset($insert["esenteNum"]) || @$insert["esenteNum"] == 0) {
    $insert["esenteNum"] = 1;
    $insert["esIvaDal"] = date('Y-m-d');
    $insert["esIvaAl"] = date('Y-m-d');
}

if ($insert["azione"] === "modifica") {

    $sql = "UPDATE stampa_" . $stampa . "
        SET data_doc='" . $insert["data"] . "', pagamento='" . $insert["pagamento"] . "', cliente='" . $insert["cliente"] . "', Piva='" . $insert["ivaCliente"] . "', indirizzo='" . $insert["indirizzoCliente"] . "', citta='" . $insert["cittaCliente"] . "', prov='" . $insert["pr"] . "', cap='" . $insert["cap"] . "', arr_qta='" . $insert["arrayQuantita"] . "', arr_beni='" . $insert["arrayProdotti"] . "', arr_imp_uni='" . $insert["arrayPrezziCad"] . "', arr_importo='" . $insert["arrayPrezzi"] . "', tot_parziale='" . $insert["parziale"] . "', tot_dovuto='" . $insert["totaleDovuto"] . "' , iva='" . $insert["iva"] . "'";


    if ($stampa == "fattura" || $stampa == "ndc") {
        $sql .= ", esente_num='" . $insert["esenteNum"] . "', esente_dal='" . $insert["esIvaDal"] . "', esente_al='" . $insert["esIvaAl"] . "'";
    }


    $sql .= 'WHERE id="' . $insert["id"] . '"';
    $doc_n = $insert["id"];
} else {

    // Controlla a che numero siamo
    $sql = "SELECT id FROM stampa_" . $stampa . " ORDER BY id DESC";

    if ($result = $conndb->query($sql)) {
        $obj = $result->fetch_object();
        $doc_n = $obj->id + 1;
    }

    if ($stampa == "fattura" || $stampa == "ndc") {
        $sql = "INSERT INTO stampa_" . $stampa . " 
            (id, data_doc, pagamento, cliente, Piva, indirizzo, citta, prov, cap, arr_qta, arr_beni, arr_imp_uni, arr_importo, tot_parziale, tot_dovuto, iva, esente_num, esente_dal, esente_al) values
            ('" . $doc_n . "','" . $insert["data"] . "','" . $insert["pagamento"] . "','" . $insert["cliente"] . "','" . $insert["ivaCliente"] . "','" . $insert["indirizzoCliente"] . "','" . $insert["cittaCliente"] . "','" . $insert["pr"] . "','" . $insert["cap"] . "','" . $insert["arrayQuantita"] . "','" . $insert["arrayProdotti"] . "','" . $insert["arrayPrezziCad"] . "','" . $insert["arrayPrezzi"] . "','" . $insert["parziale"] . "','" . $insert["totaleDovuto"] . "','" . $insert["iva"] . "','" . $insert["esenteNum"] . "','" . $insert["esIvaDal"] . "','" . $insert["esIvaAl"] . "')";
    }

    if ($stampa == "preventivo") {
        $sql = "INSERT INTO stampa_" . $stampa . " 
            (id, data_doc, pagamento, cliente, Piva, indirizzo, citta, prov, cap, arr_qta, arr_beni, arr_imp_uni, arr_importo, tot_parziale, tot_dovuto, iva) values
            ('" . $doc_n . "','" . $insert["data"] . "','" . $insert["pagamento"] . "','" . $insert["cliente"] . "','" . $insert["ivaCliente"] . "','" . $insert["indirizzoCliente"] . "','" . $insert["cittaCliente"] . "','" . $insert["pr"] . "','" . $insert["cap"] . "','" . $insert["arrayQuantita"] . "','" . $insert["arrayProdotti"] . "','" . $insert["arrayPrezziCad"] . "','" . $insert["arrayPrezzi"] . "','" . $insert["parziale"] . "','" . $insert["totaleDovuto"] . "','" . $insert["iva"] . "')";
    }
    //echo "/*".$sql."*/";
}
if ($result = $conndb->query($sql)) {
    //echo $sql;
    echo json_encode(
        [
            //"debug" => "//" . $conndb->error,
            "vai" => "ok",
            "dove" => $doc_n,
            "cosa" => $stampa . "_n",
            "documento" => $stampa
        ]
    );

} else {
    echo "//" . $conndb->error;
    echo json_encode(
        [
            "vai" => "no",
            "perche" => "Non è stato possibile salvare " . $stampa . ", controlla tutti i campi"
        ]
    );
}