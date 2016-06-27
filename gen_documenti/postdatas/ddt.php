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
if ($insert["azione"] === "modifica") {

    $doc_n = $insert["idDDT"];
    $sql = "UPDATE stampa_" . $stampa . "
        SET data_doc='" . $insert["data"] . "', peso='" . $insert["peso"] . "', data_consegna='" . $insert["consegnaData"] . "',data_rit='" . $insert["ritiroData"] . "', mezzo='" . $insert["mezzo"] . "', cliente='" . $insert["cliente"] . "', Piva='" . $insert["piva"] . "', indirizzo='" . $insert["indirizzo"] . "', citta='" . $insert["citta"] . "', causale='" . $insert["causale"] . "', imballo='" . $insert["aspettoBeni"] . "', n_colli='" . $insert["colli"] . "', arr_qta='" . $insert["quantita"] . "', arr_beni='" . $insert["articoli"] . "', vettore='" . $insert["vettore"] . "', note='" . $insert["nota"] . "', arr_imp_uni='" . $insert["prezzi"] . "', arr_tipologia='" . $insert["tipologie"] . "' WHERE id=" . $doc_n;


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
            (id, peso, data_doc, mezzo, cliente, Piva, indirizzo, citta, causale, n_colli, arr_qta, arr_beni, note, imballo, data_consegna, data_rit, vettore, arr_imp_uni, arr_tipologia) values
            ('" . $doc_n . "','" . $insert["peso"] . "','" . $insert["data"] . "','" . $insert["mezzo"] . "','" . $insert["cliente"] . "','" . $insert["piva"] . "','" . $insert["indirizzo"] . "','" . $insert["citta"] . "','" . $insert["causale"] . "','" . $insert["colli"] . "','" . $insert["quantita"] . "','" . $insert["articoli"] . "','" . $insert["nota"] . "', '" . $insert["aspettoBeni"] . "','" . $insert["consegnaData"] . "','" . $insert["ritiroData"] . "', '" . $insert["vettore"] . "', '" . $insert["prezzi"] . "','" . $insert["tipologie"] . "')";
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
