<?php
date_default_timezone_set('Europe/Rome');
$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("../DB/config.php");
include_once("./../function/session.php");


//prendi i tipi di pagamento
$query = "SELECT descr FROM ck_pagam";

if ($result = $conndb->query($query)) {
    $pagamenti = [];
    while ($row = $result->fetch_object()) {
        array_push($pagamenti, $row->descr);
    }
}
// Prendi le aliquote
$query = "SELECT aliquota FROM ck_iva";
if ($result = $conndb->query($query)) {
    $iva = [];
    while ($row = $result->fetch_object()) {
        array_push($iva, $row->aliquota);
    }
}

//Checka se si tratta della pagina output di post.php

if ((isset($post)) == true) {

    $idRiga = count($quantita) + 1;
    $modifica = true;

} else {
    $data = date('Y-m-d');
    $anno = date("Y");
    $idRiga = 1;
    $memory = '["default"]';
}

?>

<html>
<head>
    <title>NDC</title>
    <meta charset="utf-8">
    <meta name="image" content="../images/logos.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <style>

        body {
            padding-bottom: 60px;
        }

        .arrArticoli:hover {
            cursor: pointer;
            color: firebrick;
        }
        .hiddenElement {
            visibility: hidden;
        }

        .borderless td {
            border-top: none !important;
            border-bottom: none !important;
            height: auto;
            padding-bottom: 0px;
        }

        @media screen {

            #stampa {
                position: fixed;
                z-index: 100;
                bottom: 0;
                left: 0;
                width: 100%;
                padding-top: 10px;
                padding-bottom: 10px;
                background: #FFF;
                border-top: solid 1px;
                font-size: 36px;
            }

            .noMargin {
                padding: 6px 12px;
                margin: 0;
                line-height: 1.42857143;
                height: 34px;
            }

            body {
                max-width: 1400px;
                margin: auto;
            }
        }
        @media print {
            .noMargin {
                margin: 0 0 0;
            }

            .form-control {
                display: inline-block;
                width: auto;
            }

            select.form-control {
                position: relative !important;
                top: -1px !important;
                z-index: 1;
            }

            input[type=number],
            input[type=text],
            input[type=date],
            select.form-control,
            input[type=datetime] {
                border: none;
                background: transparent;
                box-shadow: none;
                height: 13px;
                padding-left: 0;
                padding-right: 0;
                margin: 0 0 0;
                font-size: 7pt;
                position: relative;
                top: -1px;
                width: auto;
            }

            p {
                font-size: 7pt;
                //height: 13px;
            }

            .logo {
                max-width: 100%;
                width: 100px;
                height: auto;
            }

            #sottotabella {
                border: none !important;
                border-collapse: collapse;
            }

            page {
                size: a4;
            }

            .qnt {
                height: 6cm;
            }

            .var {
                height: 3cm;
            }

            .stampa {
                display: none;
            }
        }
        .autocomplete-suggestions {
            color: #000000
        }

        .autocomplete-suggestions {
            border: 1px solid #999;
            background: #FFF;
            overflow: auto;
        }

        .autocomplete-suggestion {
            padding: 2px 5px;
            white-space: nowrap;
            overflow: hidden;
        }

        .autocomplete-selected {
            background: #F0F0F0;
        }

        .autocomplete-suggestions strong {
            font-weight: normal;
            color: #3399FF;
        }

        .autocomplete-group {
            padding: 2px 5px;
        }

        .autocomplete-group strong {
            display: block;
            border-bottom: 1px solid #000;
        }

        .valuta:before {
            content: "\f153 ";
            font-family: FontAwesome;
            position: relative;
            margin-right: 5px;
        }

        .form-control {
            margin: 0;
            padding: 0;
        }

        @media print {
            p {
                font-size: 7pt;
            }

            .smaller {
                font-size: 5pt;
            }
            .logo {
                max-width: 100%;
                width: 100px;
                height: auto;
            }

            #sottotabella {
                border: none !important;
                border-collapse: collapse;
            }

            page {
                size: a4;
            }

            .qnt {
                height: 6cm;
            }

            .var {
                height: 3cm;
            }

            #stampa {
                display: none;
            }
        }

        #controlloQuery {
            position: fixed;
            top: 50px;
            right: 15px;
            z-index: 100;
        }

    </style>
</head>
<body>

<span id="controlloQuery"></span>
<div id="stampa" class="row">
    <div class="container">
        <div class="row text-right">
            <div class="col-sm-4">
                <a href="../ndc.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
            </div>
            <div class="col-sm-4">
                <a href="#" onclick=save()> <i class="fa fa-floppy-o" aria-hidden="true"></i> Salva</a>
            </div>
            <div class="col-sm-4">
                <?php if (isset($post)) : ?>
                    <a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
                <?php endif; ?>
            </div>
            </span>
        </div>
    </div>
</div>

<page>
    <div style="background: #FFF" class="container-fluid">
        <div class="table-responsive">

            <table class="table-bordered table table-striped">

                <thead>

                <tr height="150px"></tr>

                <tr>

                    <td colspan="2" style="width:600;">
                        <p class="col-md-12">
                            <h5>
                        <p><strong>NDC N.
                                <input id="fattId" class="stampa form-control"
                                       style="width:15%; text-align:right; display:inline" type="number" size="4"
                                       placeholder="0000" <?php if (isset($id)) echo "value='" . $id . "'" ?> readonly>/
                                <?php echo $anno ?>
                                <br/> del <input id="data" type="date" value="<?php echo $data ?>"
                                                 class="stampa form-control"
                                                 style="width:30%; display:inline">
                            </strong></p>
                        </h5>
                        </p>
                        <p>Pagamento
                            <select id="pagamento" class="form-control" name="pagamento"
                                    style="width:50%; display:inline">

                                <?php $selected = "";
                                foreach ($pagamenti as $pagamento) : ?>
                                    <?php
                                    if (isset($pagamento_scelto)) {
                                        if ($pagamento_scelto == $pagamento) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                    }
                                    ?>
                                    <option <?php echo $selected ?>
                                        value="<?php echo $pagamento ?>"><?php echo $pagamento ?></option>
                                <?php endforeach ?>
                            </select></p>
                        <p>CREDITO SICILIANO - AG. BAGHERIA</p>
                        <p>IBAN: <strong>IT 69 F 03019 43070 000008380468</strong></p>
                    </td>

                    <td colspan="2">
                        <div class="col-md-12">
                            Spett.le<br/><br/>
                            <input id="cliente" type="text" class="text-left form-control"
                                   placeholder="Cliente con suggerimento" <?php if (isset($cliente)) echo "value='" . $cliente . "'" ?>><br/>
                            <input id="ivaCliente" type="text" class="text-left form-control" placeholder="auto P.IVA"
                                <?php if (isset($cliente)) echo "value='" . $piva . "'" ?> readonly><br/>
                            <input id="indirizzo" type="text" class="text-left form-control"
                                   placeholder="auto Indirizzo legale"
                                   readonly <?php if (isset($indirizzo)) echo "value='" . $indirizzo . "'" ?>><br/>
                            <input id="citta" class="text-left form-control" type="text"
                                   style="width: auto; max-width:45%; display:inline;"
                                   placeholder="auto Città" <?php if (isset($citta)) echo "value='" . $citta . "'" ?>
                                   readonly>
                            <span style="width: auto;"> - </span>
                            <input id="pr" class="text-left form-control" type="text"
                                   style="width: auto; max-width:15%; display:inline;"
                                   placeholder="(PR)" <?php if (isset($prov)) echo "value='" . $prov . "'" ?> readonly>
                            <span style="width: auto;"> - </span>
                            <input id="cap" class="text-left form-control" type="number" min="00010" max="98199"
                                   style="width: auto; max-width:25%; display:inline;"
                                   placeholder="auto CAP" <?php if (isset($cap)) echo "value='" . $cap . "'" ?>
                                   readonly>
                        </div>
                    </td>

                </tr>

                </thead>

                <tbody>
                <tr style="background: lightgreen" class="stampa">
                    <td id="scegliDDT" colspan="2">
                        <input id="selectDDT" placeholder="Riferimento Fattura..." type="number" class="stampa form-control arrQuantita" min="1">
                        <!-- QUI -->
                    </td>

                    <td id="incolonnaArticoli" colspan="2">
                        <input class="stampa form-control incolonnatore" type="text"
                               placeholder="Descrizione articolo automatica">
                    </td>
                </tr>
                <tr>
                    <td><p class="col-md-12">Quantità</p></td>
                    <td width="300px"><p class="col-md-12">Descrizione della merce</p></td>
                    <td><p class="col-md-12">Imp.unit.</p></td>
                    <td><p class="col-md-12">Importo</p></td>
                </tr>

 <!-- Tabella interattiva // INIZIO -->
                <tr class="qnt hiddenElement stampa">

                <!--
                    <td id="incolonnaPrezzi">
                        <input class="hiddenElement form-control stampa" style="text-align:right;" type="text"
                               placeholder="auto da DB €" readonly>
                    </td>

                    <td id="incolonnaPrezziTot">
                        <input class="hiddenElement form-control stampa" style="text-align:right;" type="text"
                               placeholder="auto da riga €" readonly>
                    </td>
                -->
                </tr>
                        <?php

                        // fatture allegate
                        //print_r($ddt_n[0]);
                        if (!empty($doc_fatt[0])) :
                            for ($ii = 0; $ii < count(@$doc_fatt); $ii++) :

                                $num_doc_ = $doc_fatt[$ii];

                                $query = "SELECT * FROM stampa_fattura WHERE id=".$num_doc_;
                                $result = $conndb->query($query);
                                $fatt = $result->fetch_object();
                                //print_r($ddt);

                                $data_fatt = $fatt->data_doc;

                                 ?>

                                <tr onclick="cancellaFATT($(this))" id="fatt-<?php echo $doc_fatt[$ii] ?>">
                                <th colspan="4">
                                <p>rif. FATTURA n° <?php echo $doc_fatt[$ii] ?> del <?php echo $data_fatt ?> </p>
                                </th>
                                </tr>

                                <?php

                            endfor;
                        endif;
                        // Articoli salvati
                        if (isset($post)) :
                            if ($quantita[0] != "") {
                            for ($i = 0; count($quantita) > $i; $i++) : ?>
                            <tr id="ordini-<?php echo $i+1 ?>" class="borderless">

                                <td>
                                    <input id="idQuantita-<?php echo $i + 1 ?>" type="number" class="form-control arrQuantita" min="1" value="<?php echo $quantita[$i] ?>">
                                </td>
                                <td>
                                    <p class="col-xs-12 arrArticoli noMargin"
                                   id="idArticoli-<?php echo $i + 1 ?>"><?php echo $prodotti[$i] ?></p>
                                </td>
                                <td><p class="valuta col-xs-10 noMargin"
                                   id="prezzo-<?php echo $i + 1 ?>"><?php echo $prezzi_cad[$i] ?></p></td>
                                <td><p class="valuta col-xs-10 noMargin"
                                   id="prezzoTOT-<?php echo $i + 1 ?>"><?php echo $prezzi[$i] ?></p></td>
                               <input type="hidden" value="<?php echo $arr_tipologia[$i]; ?>" id="tipologia-<?php echo $i + 1 ?>">
                            </tr>
                            <?php endfor; }?>


                        <?php endif ?>
                <!-- Tabella interattiva // FINE -->

                <tr>
                </tr>
                <tfoot>
                    <td style="text-align:center" colspan="2" rowspan="3">
                        <p class="col-md-12"><textarea id="nota" class="form-control" cols="50" rows="10"><?php echo @$note ?></textarea></p>
                        <p>Contributo CONAI assolto ove dovuto.</p>
                    </td>
                    <td style="text-align:right"><p>Totale parziale €</p></td>
                    <td>
                        <input id="parziale" class="form-control " style="text-align:right" type="number"
                               placeholder="auto da colonna €" <?php if (isset($parziale)) echo "value='" . $parziale . "'" ?>
                               readonly>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:right"><p>IVA %</p></td>
                    <td><select id="iva" class="form-control" style="text-align:right">
                            <?php foreach ($iva as $aliquota) :
                                if (isset($iva_scelta)) {
                                    if ($iva_scelta == $aliquota) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                }
                                ?>
                                <option value="<?php echo $aliquota ?>"><?php echo $aliquota ?></option>
                            <?php endforeach ?>
                        </select></td>
                </tr>

                <tr>
                    <td style="text-align:right"><p><strong>Totale dovuto €</strong></p></td>
                    <td>
                        <input id="totaleDovuto" class="form-control" style="text-align:right" type="number"
                               placeholder="auto da colonna €" <?php if (isset($totale)) echo "value='" . $totale . "'" ?>
                               readonly>
                    </td>
                </tr>

                <tr>
                    <td id="ifIva0" colspan="3"><p class="smaller">Esente IVA ai sensi dell’art.8 del D.P.R. 633/72.
                            Documento
                            n°<input id="esenteNum" min=1 type="number"
                                     class="smaller form-control"
                                     style="width:5%; display:inline"
                                     placeholder="0000" <?php if (isset($esente_num)) echo "value='" . $esente_num . "'" ?>>
                            valido dal <input id="esIvaDal" type="date" class="smaller form-control"
                                              style="display:inline; width:20%" <?php if (isset($esente_dal)) echo "value='" . $esente_dal . "'" ?>>
                            al <input id="esIvaAl"
                                      type="date" <?php if (isset($esente_al)) echo "value='" . $esente_al . "'" ?>
                                      class="smaller form-control" style="display:inline; width:20%"></p></td>
                    <td class="text-center"><p>S. E. & O.</p></td>
                </tr>

                <tfoot>
            </table>
        </div>
    </div>
</page>

<?php include_once("../template/parrot/foot.php") ?>

<script>
    var memory = <?php echo $memory ?>;
    var sommaDDT = 0; <?php //echo $DDTarray ?>;
    var idRiga = <?php echo $idRiga ?>;
    var controlloClick = 1;
    var codCliente = "<?php if (isset($codC)) { echo $codC; } ?>";


    $('.incolonnatore').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_articoli.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.value + " - " + suggestion.data.descr + " - " + suggestion.data.misura + " - " + suggestion.data.prezzo + "€";
        },
        onSelect: function (suggestion) {
            var execute = false;
            $(function () {
                var checkIfExists = memory.indexOf(suggestion.data.descr +" - "+suggestion.data.misura);
                console.log(checkIfExists);
                if (checkIfExists !== -1) {
                        alert("Hai già inserito questo prodotto");
                        execute = false;
                    }
                    else {
                        execute = true;
                    }

                if (execute === true) {

                    var tr = "<tr id=ordini-"+ idRiga +" class=\"borderless\">";

                    tr += "<td><input id=\"idQuantita-" + idRiga + "\" type=\"number\" class=\"form-control arrQuantita\" min=\"1\" value=\"1\"></td>";

                    tr += "<td><p class=\"col-xs-12 arrArticoli noMargin\" id=\"idArticoli-" + idRiga + "\" >" + suggestion.data.descr + " - " + suggestion.data.misura + "</p></td>";


                    tr += "<td><p class=\"valuta col-xs-10 noMargin\" id=\"prezzo-" + idRiga + "\">" + parseFloat(suggestion.data.prezzo).toFixed(2) + "</p></td>";

                    tr += "<td><p class=\"valuta col-xs-10 noMargin\" id=\"prezzoTOT-" + idRiga + "\">" + parseFloat(suggestion.data.prezzo).toFixed(2) + "</p></td>";

                    tr += '<input type="hidden" id="tipologia-'+ idRiga +'" value="' + suggestion.data.tipologia + '">'
                    $(".qnt").after(tr);

                    prezziTot($("#idQuantita-" + idRiga));
                    memory.push(suggestion.data.descr +" - "+suggestion.data.misura);
                    idRiga++;

                    $(".arrQuantita, #iva").keyup(function () {
                        prezziTot($(this));
                    });
                    $(".arrQuantita, #iva").click(function () {
                        prezziTot($(this));
                    });

                    $(".arrArticoli").click(function () {
                        cancella($(this));
                        prezziTot($(this));
                    })
                }

            });
        }
    });
    $(".arrArticoli").click(function () {
        cancella($(this));
        prezziTot($(this));
    });

    function prezziTot(quantita) {
        quantitaScelta = quantita.val();
        quantitaId = quantita.attr("id");
        quantitaId = quantitaId.split("-");
        prezzoUnitario = $("#prezzo-" + quantitaId[1]).text();
        tipologia = $("#tipologia-" + quantitaId[1]).val(); //
        console.log(tipologia);

        //controlla tipologia

        /*  Normale
        *   Scaglione

            Es. 19458 etichette. verrà scritto quantità 20000 (manualmente) = (20000/1000) * 11.64 [quantità/1000 * pr.unitarioSCAGLIONE]


        *   Stock
        */

        if (tipologia == "Normale" || tipologia == undefined) {
            prezzoTotale = quantitaScelta * (parseFloat(prezzoUnitario));
        }

        if (tipologia == "Scaglione") {
            prezzoTotale = ((quantitaScelta / 1000) * (parseFloat(prezzoUnitario)));
        }

        if (tipologia == "Stock") {
            prezzoTotale = parseFloat(prezzoUnitario);
        }

        prezzoTotID = $("#prezzoTOT-" + quantitaId[1]);
        prezzoTotID.text(prezzoTotale.toFixed(2));
        var selectPrezzi = $("p[id*=prezzoTOT-]");
        //console.log(selectPrezzi.length);
        //console.log(selectPrezzi);
        var somma = 0;
        for (var i = 0; i < selectPrezzi.length; i++) {
            //console.log(selectPrezzi[i]);
            prezzoDaSommare = parseFloat(selectPrezzi[i].textContent);
            //console.log(prezzoDaSommare);
            somma += prezzoDaSommare;

        }
        somma += sommaDDT;
        $("#parziale").val(somma.toFixed(2));
        var iva = $("#iva").val();
        iva = somma * (iva / 100);
        $("#totaleDovuto").val((somma + iva).toFixed(2));
    }

    $(".arrQuantita, #iva").click(function () {
        prezziTot($(this));
    });

    $('#cliente').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_clienti.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.data.PIVAC + " - " + suggestion.data.nomeC + "  " + suggestion.data.cognomeC;
        },
        onSelect: function (suggestion) {

            $("#cliente").val(suggestion.data.nomeC + "  " + suggestion.data.cognomeC);
            $("#ivaCliente").val(suggestion.data.PIVAC);
            $("#indirizzo").val(suggestion.data.indirizzoLC);
            $("#citta").val(suggestion.data.cittaLC);
            $("#pr").val(suggestion.data.provLC);
            $("#cap").val(suggestion.data.capLC);
            codCliente = suggestion.data.codC;

        }
    });

// ------------------------


    // array_push($newKey, [
    //     "value" => $ddt->id,
    //     "data" => [
    //         "num" => $ddt->id,
    //         "data_doc" => $ddt->data_doc,
    //         "arr_qta" => $arr_qta,
    //         "arr_beni" => $arr_beni,
    //         "arr_prezzi" => $arr_prezzi,
    //         "arr_prezzi_tot" => $arr_prezzi_tot,
    //         "somma" => array_sum($arr_prezzi_tot)
    //     ]
    // ]);

    $('#selectDDT').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_fatture_xndc.php',
        formatResult: function (suggestion, currentValue) {
            return "Fattura n° " + suggestion.data.num;
        },
        onSelect: function (suggestion) {
            console.log($("#fatt-" + suggestion.data.num));
            if ($("#fatt-" + suggestion.data.num).length == 0) {
                var fatt = `
                    <tr onclick="cancellaFATT($(this))" id="fatt-` + suggestion.data.num +`">
                        <th colspan="4"><p>rif. FATTURA n° ` + suggestion.data.num + ` del ` + suggestion.data.data_doc +` </p></th>
                    </tr>`;
                $("#nota").val(($("#nota").val()) + suggestion.data.note + "\n");
                $(".qnt").before(fatt);


            }
            else {
                alert("Fattura già esistente!");
            }
        }
    });


//-------------------------

    function cancellaFATT(elemento) {
        console.log(elemento);
        id = elemento.attr("id");
        id = id.split("-");
        $("#fatt-"+ id[1]).remove();

    }

    function saveFATT() {
        var countFATT = $("tr[id*=fatt-]");
        //console.log(countDDT);
        var id_fatt = [];
        for (var i = 0; i < countFATT.length; i++) {
            //console.log(countDDT.length);
            idFATT = countFATT[i].id;
            idFATT = idFATT.split("-");
            id_fatt.push(idFATT[1]);
        }

        return String(id_fatt);
    }
       //console.log(dati);
function ciclaArray(variabile, nodo) {
        var i = 0,
            ritorna = "";
        for (i = 0; i < variabile.length; i++) {
            if ((i + 1) < variabile.length) {
                ritorna += escapeHtml(variabile[i][nodo]) + "||";
            }
            else {
                ritorna += escapeHtml(variabile[i][nodo]);
            }
        }

        return ritorna;
    }

    function cancella(elemento) {
        id = elemento.attr("id");
        id = id.split("-");
        index = memory.indexOf(elemento.text());
        console.log(elemento.text());
        console.log("array - " + index);
        delete memory[index];
        console.log("#ordini-" + id[1]);
        $("#ordini-" + id[1]).remove();
    }

    function checkIva() {
        var ammIva = $("#iva").val();
        if (ammIva != 0) {
            console.log($("#iva").val());
            $("#ifIva0 p").hide();
        }

        else {
            $("#ifIva0 p").show();
        }
    }
    checkIva();
    $("#iva").click(function () {
        checkIva();
    });

        function save() {
        var dati = {
            richiesta: "ndc",
            azione: "<?php if (!isset($azione)) {
                echo "aggiungi";
            } else {
                echo $azione;
            } ?>",
            id: $("#fattId").val(),
            data: $("#data").val(),
            pagamento: $("#pagamento").val(),
            cliente: $("#cliente").val(),
            tipologie: ciclaArray($("input[id*=tipologia-]"), "value"),
            ivaCliente: $("#ivaCliente").val(),
            indirizzoCliente: $("#indirizzo").val(),
            cittaCliente: $("#citta").val(),
            pr: $("#pr").val(),
            cap: $("#cap").val(),
            arrayQuantita: ciclaArray($("input[id*=idQuantita-]"), "value"),
            arrayProdotti: ciclaArray($("p[id*=idArticoli-]"), "textContent"),
            arrayPrezziCad: ciclaArray($("p[id*=prezzo-]"), "textContent"),
            arrayPrezzi: ciclaArray($("p[id*=prezzoTOT-]"), "textContent"),
            doc_fatt: saveFATT(),
            parziale: $("#parziale").val(),
            iva: $("#iva").val(),
            note: $("#nota").val(),
            totaleDovuto: $("#totaleDovuto").val(),
            esenteNum: $("#esenteNum").val(),
            esIvaDal: $("#esIvaDal").val(),
            esIvaAl: $("#esIvaAl").val(),
            codC : codCliente
        };

        var call = $.ajax({
            url: "http://<?php echo $base_url ?>/gen_documenti/post.php",
            method: "POST",
            data: {data: dati},
            dataType: "json"
        });
        call.done(function (msg) {
            console.log(msg.vai);
            if (msg.vai == "ok") {
                window.location.assign("http://<?php echo $base_url ?>/gen_documenti/post.php?" + msg.cosa + "=" + msg.dove + "&documento=" + msg.documento);
            }

            if (msg.vai == "no") {
                console.log(msg.perche);
                var elem = '<div class="alert alert-danger" role="alert"><strong>Errore: </strong><span class="text">' + msg.perche + ' </span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&nbsp &times;</span></button>';

                $("#controlloQuery").removeClass("hidden");
                $("#controlloQuery").append(elem);
            }
        });

        //console.log(dati);
        return true;
    }

    function escapeHtml(text) {
        var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };

        return text.replace(/[&<>"']/g, function (m) {
            return map[m];
        });
    }

   //------

</script>
</body>
