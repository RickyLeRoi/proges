<?php
/**
 * Created by PhpStorm.
 * User: danielo
 * Date: 20/06/2016
 * Time: 21:10
 */


/*
    [id] => 2
    [data_doc] => 2016-06-22
    [mezzo] => corriere
    [cliente] => Daniele Irsuti
    [Piva] => 335252542525
    [cf] =>
    [indirizzo] => via daniele
    [citta] => Danielopoli
    [prov] =>
    [cap] =>
    [causale] => Vendita
    [imballo] =>
    [n_colli] => 1
    [peso] =>
    [data_rit] => 2016-06-22 02:03:00
    [arr_qta] => 1||1
    [arr_beni] => piselli non surgelati||piselli surgelati Findus
    [arr_misure] =>
    [vettore] =>
    [note] => dassdasadsadsad
    [data_consegna] => 2016-06-03 01:02:00

 */
//print_r($_POST["data"]);


if ($insert["azione"] === "modifica") {
    $doc_n = $insert["id"];
    $sql = "UPDATE stampa_" . $stampa . "
        SET data_doc='" . $insert["data"] . "', data_consegna='" . $insert["consegnaData"] . "',data_rit='" . $insert["ritiroData"] . "', mezzo='" . $insert["mezzo"] . "', cliente='" . $insert["cliente"] . "', Piva='" . $insert["ivaCliente"] . "', indirizzo='" . $insert["indirizzoCliente"] . "', citta='" . $insert["cittaCliente"] . "', prov='" . $insert["pr"] . "', cap='" . $insert["cap"] . "', causale='" . $insert["causale"] . "', imballo='" . $insert["imballo"] . "', colli='" . $insert["colli"] . "', arr_qta='" . $insert["quantita"] . "', arr_beni='" . $insert["articoli"] . "', nota='" . $insert["nota"] . "' WHERE id=" . $doc_n;


} else {
    $sql = "SELECT id FROM stampa_" . $stampa . " ORDER BY id DESC";

    if ($result = $conndb->query($sql)) {
        $obj = $result->fetch_object();
        $doc_n = $obj->id + 1;
    }

    if ($stampa == "ddt") {
        $sql = "INSERT INTO stampa_" . $stampa . " 
            (id, data_doc, mezzo, cliente, Piva, indirizzo, citta, causale, n_colli, arr_qta, arr_beni, note, imballo, data_consegna, data_rit) values
            ('" . $doc_n . "','" . $insert["data"] . "','" . $insert["mezzo"] . "','" . $insert["cliente"] . "','" . $insert["piva"] . "','" . $insert["indirizzo"] . "','" . $insert["citta"] . "','" . $insert["causale"] . "','" . $insert["colli"] . "','" . $insert["quantita"] . "','" . $insert["articoli"] . "','" . $insert["nota"] . "', '" . $insert["aspettoBeni"] . "','" . $insert["consegnaData"] . "','" . $insert["ritiroData"] . "')";
        //echo $sql;
    }
//"INSERT INTO stampa_ddt (id, data_doc, mezzo, cliente, Piva, indirizzo, citta, causale, colli, arr_qta, arr_beni, nota) values ('2','2016-06-21','carico del mittente','1','ND','via daniele','Danielopoli','Vendita','1','1','etichette sardine 10000pz','Nessuna nota'"
    //echo "/*" . $sql . "*/";
}
if ($result = $conndb->query($sql)) {
    //echo $sql;
    echo json_encode(
        [
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
            "perche" => "Non è stato possibile salvare " . $stampa . " \, controlla tutti i campi -" . $sql
        ]
    );
}