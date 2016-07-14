<?php
/**
 * Created by PhpStorm.
 * User: danielo
 * Date: 20/06/2016
 * Time: 17:20
 */
//header("Content-type: text/html; charset=UTF-8");


date_default_timezone_set("europe/rome");

//print_r($_POST["data"]);
$insert["note"] = htmlentities($insert["note"], ENT_QUOTES,  'UTF-8');
if (!isset($insert["esenteNum"]) || @$insert["esenteNum"] == 0) {

    $insert["esenteNum"] = 1;
    $insert["esIvaDal"] = date('Y-m-d');
    $insert["esIvaAl"] = date('Y-m-d');
}



if ($insert["azione"] === "modifica") {

    $sql = "UPDATE stampa_" . $stampa . "
        SET codC='" . mysqli_real_escape_string($conndb, $insert["codC"]) . "', 
        data_doc='" . mysqli_real_escape_string($conndb, $insert["data"]) . "', 
        pagamento='" . mysqli_real_escape_string($conndb, $insert["pagamento"]) . "', 
        cliente='" . mysqli_real_escape_string($conndb, $insert["cliente"]) . "', 
        Piva='" . mysqli_real_escape_string($conndb, $insert["ivaCliente"]) . "', 
        indirizzo='" . mysqli_real_escape_string($conndb, $insert["indirizzoCliente"]) . "', 
        citta='" . mysqli_real_escape_string($conndb, $insert["cittaCliente"]) . "', 
        prov='" . mysqli_real_escape_string($conndb, $insert["pr"]) . "', 
        cap='" . mysqli_real_escape_string($conndb, $insert["cap"]) . "', 
        arr_qta='" . mysqli_real_escape_string($conndb, $insert["arrayQuantita"]) . "',
        arr_beni='" . mysqli_real_escape_string($conndb, $insert["arrayProdotti"]) . "', 
        arr_imp_uni='" . mysqli_real_escape_string($conndb, $insert["arrayPrezziCad"]) . "', 
        arr_importo='" . mysqli_real_escape_string($conndb, $insert["arrayPrezzi"]) . "', 
        tot_parziale='" . mysqli_real_escape_string($conndb, $insert["parziale"]) . "', 
        tot_dovuto='" . mysqli_real_escape_string($conndb, $insert["totaleDovuto"]) . "' , 
        iva='" . mysqli_real_escape_string($conndb, $insert["iva"]) . "', 
        note='" . mysqli_real_escape_string($conndb, $insert["note"]) . "'";

//tipologia
    if ($stampa == "fattura" || $stampa == "ndc") {
        $sql .= ", 
        esente_num='" . mysqli_real_escape_string($conndb, $insert["esenteNum"]) . "', 
        esente_dal='" . mysqli_real_escape_string($conndb, $insert["esIvaDal"]) . "', 
        esente_al='" . mysqli_real_escape_string($conndb, $insert["esIvaAl"]) . "',";
    }

    if ($stampa == "fattura") {
        $sql .= " 
        all_ddt='" . mysqli_real_escape_string($conndb, $insert["ddt"]) . "', 
        tipologia='" . mysqli_real_escape_string($conndb, $insert["tipologie"]) . "'";
    }

    if ($stampa == "ndc") {
        $sql .= " 
        arr_tipologia='" . mysqli_real_escape_string($conndb, $insert["tipologie"]) . "', 
        doc_fatt='" . mysqli_real_escape_string($conndb, $insert["doc_fatt"]) . "'";
    }

    $sql .= 'WHERE id="' . mysqli_real_escape_string($conndb, $insert["id"]) . '"';
    $doc_n = mysqli_real_escape_string($conndb, $insert["id"]);
} else {

    // Controlla a che numero siamo
    $sql = "SELECT id FROM stampa_" . $stampa . " ORDER BY id DESC";

    if ($result = $conndb->query($sql)) {

        if ($result->num_rows == 0) {
            $doc_n = 1;
        }

        else {
            $obj = $result->fetch_object();
            $doc_n = $obj->id + 1;
        }
    }


    if ($stampa == "fattura") {
        $sql = "INSERT INTO stampa_" . $stampa . "
            (id, codC, data_doc, pagamento, cliente, Piva, indirizzo, citta, prov, cap, arr_qta, arr_beni, arr_imp_uni, arr_importo, tot_parziale, tot_dovuto, iva, esente_num, esente_dal, esente_al, all_ddt, tipologia, note) values
            ('" . $doc_n . "',
            '" . mysqli_real_escape_string($conndb, $insert["codC"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["data"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["pagamento"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["ivaCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["indirizzoCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cittaCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["pr"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cap"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayQuantita"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayProdotti"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayPrezziCad"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayPrezzi"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["parziale"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["totaleDovuto"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["iva"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["esenteNum"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["esIvaDal"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["esIvaAl"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["ddt"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["tipologie"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["note"]) . "')";
    }

    if ($stampa == "ndc") {
        $sql = "INSERT INTO stampa_" . $stampa . " 
            (id, codC, data_doc, pagamento, cliente, Piva, indirizzo, citta, prov, cap, arr_qta, arr_beni, arr_imp_uni, arr_importo, tot_parziale, tot_dovuto, iva, esente_num, esente_dal, esente_al, arr_tipologia, doc_fatt, note) values
            ('" . $doc_n . "',
            '" . mysqli_real_escape_string($conndb, $insert["codC"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["data"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["pagamento"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["ivaCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["indirizzoCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cittaCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["pr"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cap"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayQuantita"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayProdotti"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayPrezziCad"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayPrezzi"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["parziale"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["totaleDovuto"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["iva"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["esenteNum"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["esIvaDal"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["esIvaAl"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["tipologie"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["doc_fatt"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["note"]) . "')";
    }

    if ($stampa == "preventivo") {
        $sql = "INSERT INTO stampa_" . $stampa . " 
            (id, codC, data_doc, pagamento, cliente, Piva, indirizzo, citta, prov, cap, arr_qta, arr_beni, arr_imp_uni, arr_importo, tot_parziale, tot_dovuto, iva, note) values
            ('" . $doc_n . "',
            '" . mysqli_real_escape_string($conndb, $insert["codC"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["data"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["pagamento"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["ivaCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["indirizzoCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cittaCliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["pr"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cap"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayQuantita"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayProdotti"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayPrezziCad"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["arrayPrezzi"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["parziale"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["totaleDovuto"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["iva"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["note"]) . "')";
    }
    //echo "/*".$sql."*/";
}
if ($result = $conndb->query($sql)) {
    //echo $sql;
    echo json_encode(
        [
            "debug" => "//Error:" .$sql.$conndb->error,
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
            "debug" => "//" . $conndb->error,
            "vai" => "no",
            "perche" => "Non è stato possibile salvare " . $stampa . ", controlla tutti i campi"
        ]
    );
}
