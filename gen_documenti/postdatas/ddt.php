<?php

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

$insert["nota"] = htmlentities($insert["nota"], ENT_QUOTES,  'UTF-8');
$insert["indirizzo_dest"] = htmlentities($insert["indirizzo_dest"], ENT_QUOTES,  'UTF-8');
$insert["citta_dest"] = htmlentities($insert["citta_dest"], ENT_QUOTES,  'UTF-8');  

if ($insert["azione"] === "modifica") {

    $doc_n = $insert["idDDT"];
    $sql = "UPDATE stampa_" . mysqli_real_escape_string($conndb, $stampa) . "
        SET data_doc='" . mysqli_real_escape_string($conndb, $insert["data"]) . "', 
        peso=" . mysqli_real_escape_string($conndb, $insert["peso"]) . ", 
        data_consegna='" . mysqli_real_escape_string($conndb, $insert["consegnaData"]) . "',
        data_rit='" . mysqli_real_escape_string($conndb, $insert["ritiroData"]) . "', 
        mezzo='" . mysqli_real_escape_string($conndb, $insert["mezzo"]) . "', 
        cliente='" . mysqli_real_escape_string($conndb, $insert["cliente"]) . "', 
        Piva='" . mysqli_real_escape_string($conndb, $insert["piva"]) . "', 
        indirizzo='" . mysqli_real_escape_string($conndb, $insert["indirizzo"]) . "', 
        citta='" . mysqli_real_escape_string($conndb, $insert["citta"]) . "', 
        causale='" . mysqli_real_escape_string($conndb, $insert["causale"]) . "', 
        imballo='" . mysqli_real_escape_string($conndb, $insert["aspettoBeni"]) . "', 
        n_colli='" . mysqli_real_escape_string($conndb, $insert["colli"]) . "', 
        arr_qta='" . mysqli_real_escape_string($conndb, $insert["quantita"]) . "', 
        arr_beni='" . mysqli_real_escape_string($conndb, $insert["articoli"]) . "', 
        vettore='" . mysqli_real_escape_string($conndb, $insert["vettore"]) . "', 
        note='" . mysqli_real_escape_string($conndb, $insert["nota"]) . "', 
        arr_imp_uni='" . mysqli_real_escape_string($conndb, $insert["prezzi"]) . "', 
        arr_tipologia='" . mysqli_real_escape_string($conndb, $insert["tipologie"]) . "', 
        indirizzo_dest='" . mysqli_real_escape_string($conndb, $insert["indirizzo_dest"]) . "',
        codC='" . mysqli_real_escape_string($conndb, $insert["codC"]) . "',
        citta_dest='" . mysqli_real_escape_string($conndb, $insert["citta_dest"]) . "'  WHERE id=" . $doc_n;


} else {
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

    if ($stampa == "ddt") {
        $sql = "INSERT INTO stampa_" . $stampa . " 
            (id, peso, data_doc, mezzo, cliente, Piva, indirizzo, citta, causale, n_colli, arr_qta, arr_beni, note, imballo, data_consegna, data_rit, vettore, arr_imp_uni, arr_tipologia, indirizzo_dest, citta_dest, codC) values
            ('" . mysqli_real_escape_string($conndb, $doc_n) . "',
            '" . mysqli_real_escape_string($conndb, $insert["peso"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["data"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["mezzo"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["cliente"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["piva"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["indirizzo"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["citta"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["causale"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["colli"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["quantita"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["articoli"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["nota"]) . "', 
            '" . mysqli_real_escape_string($conndb, $insert["aspettoBeni"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["consegnaData"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["ritiroData"]) . "', 
            '" . mysqli_real_escape_string($conndb, $insert["vettore"]) . "', 
            '" . mysqli_real_escape_string($conndb, $insert["prezzi"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["tipologie"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["indirizzo_dest"]) . "', 
            '" . mysqli_real_escape_string($conndb, $insert["citta_dest"]) . "',
            '" . mysqli_real_escape_string($conndb, $insert["codC"]) . "')";
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
