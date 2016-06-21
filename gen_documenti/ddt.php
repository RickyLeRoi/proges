<?php
$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("../DB/config.php");
include_once("./../function/session.php");

if ((isset($post)) == true) {

    $idRiga = count($quantita) + 1;
    $modifica = true;

} else {
    $data = date('Y-m-d');
    $anno = date("Y");
    $idRiga = 1;
    $memory = '["default"]';
}

// Mezzi

$query = "SELECT * FROM ck_mezzo";
$result = $conndb->query($query);
$mezzi = [];
if ($result) {
    while ($row = $result->fetch_object()) {
        array_push($mezzi, $row->descr);
    }
}


?>

<!doctype html>
<html>
<head>
    <title>DDT</title>
    <meta charset="utf-8">
    <meta name="image" content="../images/logos.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script language="JavaScript">
        data = new Date();
        var aaaa = data.getFullYear();
        var MM = data.getMonth() + 1;
        var gg = data.getDate();
        if (gg < 10) {
            gg = "0" + gg;
        }
        if (MM < 10) {
            MM = "0" + MM;
        }
        var hh = data.getHours();
        var mm = data.getMinutes();
        if (hh < 10) {
            hh = "0" + hh;
        }
        if (mm < 10) {
            mm = "0" + mm;
        }
    </script>
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
                height: 13px;
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
<div style="padding-top: 10px; padding-bottom: 10px;" class="stampa container-fluid text-center">        <span
        class="h1">
<a href="../ddt.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span></div>

<page>
    <div style="background: #FFF" class="container-fluid">
        <div class="table-responsive">
            <table class="table-bordered table table-striped">
                <thead>
                <tr colspan="2">
                    <td>
                        <div class="col-md-12"><img width="550px" src="../images/logobb.png"
                                                    alt="Tipografia Provenzano">
                        </div>
                    </td>
                    <td colspan="2">

                        <p class="col-md-12"><h5 class="text-center"><strong>DOCUMENTO DI TRASPORTO DPR 476/96</strong>
                        </h5></p>
                        <div class="text-left">
                            <p class="col-xs-4"><input type="checkbox"> Mittente </p>
                            <p class="col-xs-4"><input type="checkbox"> Destinatario </p>
                            <p class="col-xs-4"><input type="checkbox"> Vettore</p>
                            <strong>
                                <p class="col-md-12 text-center">Bagheria, <input id="data" type="date"
                                                                                  value="<?php echo $data ?>"
                                                                                  class="stampa form-control"
                                                                                  style="width:30%; display:inline">
                            </strong></p>

                            N° <input id="idDDT" type="number" readonly placeholder="0000"></p>
                            </strong>
                        </div>

                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="3">
                        <p class="col-sm-4">Destinatario</p>
                        <p class="col-sm-8"><input id="cliente" class="form-control" style="width:50%; display:inline"
                                                   type="text"
                                                   placeholder="Nome cliente"><input id="piva" class="form-control"
                                                                                     style="width:50%; display:inline"
                                                                                     type="text" readonly
                                                                                     placeholder="auto P.IVA"></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="3"><p class="col-sm-4">Domicilio o residenza</p>
                        <p class="col-sm-8"><input id="indirizzo" class="form-control" style="width:50%; display:inline"
                                                   type="text"
                                                   readonly
                                                   placeholder="auto Indirizzo"><input id="citta" class="form-control"
                                                                                       style="width:50%; display:inline"
                                                                                       type="text"
                                                                                       readonly
                                                                                       placeholder="auto Citta'"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><p class="col-sm-4">Causale del trasporto</p>
                        <p class="col-sm-8"><select id="causale" class="form-control">
                                <option>Vendita</option>
                                <option>Campionatura</option>
                                <option>Reso</option>
                            </select></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Aspetto esteriore dei beni</p>
                        <p class="col-md-12"><select id="aspettoBeni" class="form-control">
                                <option>Pacchi o scatoli</option>
                                <option>Pedana</option>
                                <option>Proprio dei beni</option>
                            </select></p>

                    </td>
                    <td>
                        <p class="col-md-12">N. Colli</p>
                        <p class="col-md-12"><input id="colli" type="number" class="form-control" min="0"></p>
                    </td>
                    <td>
                        <p class="col-md-12">Peso Kg.</p>
                        <p class="col-md-12"><input id="peso" type="number" class="form-control" min="0"></p>
                    </td>


                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Consegna o inizio trasporto a mezzo mittente o destinatario</p>
                    </td>
                    <td>
                        <p class="col-md-12">Data e ora</p>
                        <p class="col-md-12">
                            <input id="consegnaData" required class="form-control text-center"
                                   style="width:50%; display:inline"
                                   type="date"><input id="consegnaOra"
                                                      class="form-control text-center" style="width:50%; display:inline"
                                                      type="time"></p>
                    <td>
                        <p class="col-md-12">Firma del Conducente</p>
                    </td>
                </tr>
                <tr>
                    <td><p class="col-md-12">Q.tà'</p></td>
                    <td colspan="2"><p class="col-md-12">Descrizione dei beni</p></td>
                </tr>
                <tr class="qnt" height="400">

                    <td id="incolonnaQuantita">
                        <input id="idQuantita-default" type="number" style="visibility: hidden"
                               class="stampa form-control" min="0">
                    </td>

                    <td id="incolonnaArticoli" colspan="2">
                        <input id="incolonnatore" type="text" class="stampa form-control"
                               placeholder="Descrizione articolo">
                    </td>

                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Vettori, domicilio o residenza</p>
                        <p class="col-md-12">
                            <select id="mezzo">
                                <?php foreach ($mezzi as $mezzo) : ?>
                                    <option value="<?php echo $mezzo ?>"><?php echo $mezzo ?></option>
                                <?php endforeach; ?>
                            </select></p>
                    </td>
                    <td>
                        <p class="col-md-12">Data e ora di ritiro</p>
                    </td>
                    <td>
                        <p class="col-md-12">Firme</p>
                    </td>
                </tr>
                <tr>
                    <td height=60><p class="col-md-12"></p></td>
                    <td height=60><p class="col-md-12"></p></td>
                    <td height=60><p class="col-md-12"></p></td>
                </tr>
                <tr height="400" class="var">
                    <td><p class="col-md-12">Annotazioni - Variazioni</p>
                        <p class="col-md-12"><textarea id="nota" class="form-control" cols="50"
                                                       rows="10">Nessuna nota</textarea></p></td>
                    <td colspan="2"><p class="col-md-12">Firma del destinatario</p></td>

                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <p class="col-md-12">CONDIZIONI GENERALI DI VENDITA: Il Destinatario dichiara di accettare a titolo di
                vendita le merci sopradescritte, dopo averne verificato la corrispondenza per qualità e quantità. I
                reclami devono essere avanzati entro 8 gg dal ricevimento della merce. Per qualsiasi controversia sarà
                esclusivamente competente il Foro di Palermo.</p>
        </div>
    </div>
</page>
<div class=" stampa container-fluid text-center"><span class="h1">
<a href="../ddt.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span></div>
<?php include_once("../template/parrot/foot.php") ?>

<script>
    var idRiga = 1;
    $('#incolonnatore').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_articoli.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.value + ' - ' + suggestion.data.descr + " - " + suggestion.data.prezzo + "€";
        },
        onSelect: function (suggestion) {
            $(function () {
                var articoli = "<p class=\"col-sm-12 arrArticoli noMargin\" id=\"idArticoli-" + idRiga + "\" >" + suggestion.data.descr + "</p>";
                $("#incolonnaArticoli").append(articoli);

                var quantita = "<input id=\"idQuantita-" + idRiga + "\" type=\"number\" class=\"form-control arrQuantita\" min=\"1\" value=\"1\">";
                $("#incolonnaQuantita").append(quantita);
                idRiga++;
            });
        }
    });

    $('#cliente').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_clienti.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.data.PIVAC + ' - ' + suggestion.data.nomeC + " " + suggestion.data.cognomeC;
        },
        onSelect: function (suggestion) {
            $(function () {
                $("#clienti").val(suggestion.data.nomeC + " " + suggestion.data.cognomeC);
                $("#piva").val(suggestion.data.PIVAC);
                $("#citta").val(suggestion.data.cittaLC);
                $("#indirizzo").val(suggestion.data.indirizzoLC);
            });
        }
    });
    function save() {
        var dati = {
            data: $("#data").val(),
            idDDT: $("#idDDT").val(),
            richiesta: "ddt",
            azione: "<?php if (!isset($azione)) {
                echo "aggiungi";
            } else {
                echo $azione;
            } ?>",
            cliente: $("#cliente").val(),
            indirizzo: $("#indirizzo").val(),
            citta: $("#citta").val(),
            piva: $("#piva").val(),
            causale: $("#causale").val(),
            aspettoBeni: $("#aspettoBeni").val(),
            colli: $("#colli").val(),
            peso: $("#peso").val(),
            consegnaData: $("#consegnaData").val(),
            consegnaOra: $("#consegnaOra").val(),
            quantita: ciclaArray($(".arrQuantita"), "value"),
            articoli: ciclaArray($(".arrArticoli "), "textContent"),
            mezzo: $("#mezzo").val(),
            nota: $("#nota").val()


        };

        function err(value) {
            var mancante = "";
            var indici = Object.keys(dati);
            console.log(Object.keys(dati));
            for (var i = 0; indici.length > i; i++) {

                if (dati[indici[i]] == "") {
                    if (indici[i] == "idDDT") {
                        dati.idDDT = "ok";
                    }
                    else {
                        mancante += indici[i] + " ";
                    }
                    console.log(mancante);
                }
            }

            if (mancante == " ") {
                var elem = '<div class="alert alert-danger" role="alert"><strong>Campi mancanti: </strong><span class="text">' + mancante + ' </span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&nbsp &times;</span></button>';
                $("#controlloQuery").removeClass("hidden");
                $("#controlloQuery").append(elem);
            }
        }

        err(dati);
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
                return true;
            }

            if (msg.vai == "no") {
                console.log(msg.perche);
                var elem = '<div class="alert alert-danger" role="alert"><strong>Errore: </strong><span class="text">' + msg.perche + ' </span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&nbsp &times;</span></button>';

                $("#controlloQuery").removeClass("hidden");
                $("#controlloQuery").append(elem);
                return false;
            }
        });
    }


    function ciclaArray(variabile, nodo) {
        var i = 0,
            ritorna = "";
        for (i = 0; i < variabile.length; i++) {
            if ((i + 1) < variabile.length) {
                ritorna += escapeHtml(variabile[i][nodo]) + "||";
            }
            else {
                ritorna += variabile[i][nodo];
            }
        }

        return ritorna;
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
</script>

</body>
</html>
