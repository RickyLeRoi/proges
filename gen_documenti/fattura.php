<?php
$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("../DB/config.php");
include_once("./../function/session.php");

$query = "SELECT descr FROM pagam";

if ($result = $conndb->query($query)) {
    $pagamenti = [];
    while ($row = $result->fetch_object()) {
        array_push($pagamenti, $row->descr);
    }
}

$query = "SELECT aliquota FROM iva";
if ($result = $conndb->query($query)) {
    $iva = [];
    while ($row = $result->fetch_object()) {
        array_push($iva, $row->aliquota);
    }
}
?>

<html>
<head>
    <title>Fattura</title>
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
        .hiddenElement {
            visibility: hidden;
        }

        @media screen {
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

    </style>
</head>
<body>

<div id="stampa" style="padding-top: 10px; padding-bottom: 10px;" class="container-fluid">
<span class="h1">
<a href="../fatture.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print(); save()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span>
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
                        <p><strong>FATTURA N.
                                <input class="stampa form-control" style="width:15%; text-align:right; display:inline"
                                       type="number" size="4" placeholder="0000" readonly>/
                                <script language="javascript">
                                    document.write(aaaa);
                                </script>
                                <br/> del <input id="data" type="date" class="stampa form-control"
                                                 style="width:30%; display:inline">
                            </strong></p>
                        </h5>
                        </p><br/>
<span>Pagamento
<select id="pagamento" class="form-control" name="pagamento" style="width:50%; display:inline">
    <?php foreach ($pagamenti as $pagamento) : ?>
        <option value="<?php echo $pagamento ?>"><?php echo $pagamento ?></option>
    <?php endforeach ?>
</select></span><br/><br/>
<span class="row"><p>CREDITO SICILIANO - AG. BAGHERIA</p><br/>
<p>IBAN: <strong>IT 69 F 03019 43070 000008380468</strong></p></span>
                    </td>

                    <td colspan="2">
                        <div class="col-md-12">
                            Spett.le<br/><br/>
                            <input id="cliente" type="text" class="text-center form-control"
                                   placeholder="Cliente con suggerimento"><br/>
                            <input id="ivaCliente" type="text" class="text-center form-control" placeholder="auto P.IVA"
                                   readonly><br/>
                            <input id="indirizzo" type="text" class="text-center form-control"
                                   placeholder="auto Indirizzo legale"
                                   readonly><br/>
                            <input id="citta" class="text-center form-control" type="text"
                                   style="width:45%; display:inline;"
                                   placeholder="auto Città" readonly>
                            <span style="width:7%;"> - </span>
                            <input id="pr" class="text-center form-control" type="text"
                                   style="width:15%; display:inline;"
                                   placeholder="(PR)" readonly>
                            <span style="width:7%;"> - </span>
                            <input id="cap" class="text-center form-control" type="number" min="00010" max="98199"
                                   style="width:25%; display:inline;" placeholder="auto CAP" readonly>
                        </div>
                    </td>

                </tr>

                </thead>

                <tbody>

                <tr>
                    <td><p class="col-md-12">Quantità</p></td>
                    <td width="300px"><p class="col-md-12">Descrizione della merce</p></td>
                    <td><p class="col-md-12">Imp.unit.</p></td>
                    <td><p class="col-md-12">Importo</p></td>
                </tr>

                <tr class="qnt" height="800px">

                    <td id="incolonnaQuantita">
                        <input id="idQuantita-default" type="number" style="text-align:right;"
                               class="stampa hiddenElement form-control arrQuantita" min="1">
                    </td>

                    <td id="incolonnaArticoli">
                        <input class="stampa form-control incolonnatore" type="text"
                               placeholder="Descrizione articolo automatica">
                    </td>

                    <td id="incolonnaPrezzi">
                        <input class="hiddenElement form-control stampa" style="text-align:right;" type="text"
                               placeholder="auto da DB €" readonly>
                    </td>

                    <td id="incolonnaPrezziTot">
                        <input class="hiddenElement form-control stampa" style="text-align:right;" type="text"
                               placeholder="auto da riga €" readonly>
                    </td>

                </tr>

                <tr>
                    <td style="text-align:center" colspan="2" rowspan="3"><p>Contributo CONAI assolto ove dovuto.</p>
                    </td>
                    <td style="text-align:right"><p>Totale parziale €</p></td>
                    <td>
                        <input id="parziale" class="form-control stampa" style="text-align:right" type="number"
                               placeholder="auto da colonna €" readonly>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:right"><p>IVA %</p></td>
                    <td><select id="iva" class="form-control" style="text-align:right">
                            <?php foreach ($iva as $aliquota) : ?>
                                <option value="<?php echo $aliquota ?>"><?php echo $aliquota ?></option>
                            <?php endforeach ?>
                        </select></td>
                </tr>

                <tr>
                    <td style="text-align:right"><p><strong>Totale dovuto €</strong></p></td>
                    <td>
                        <input id="totaleDovuto" class="form-control stampa" style="text-align:right" type="number"
                               placeholder="auto da colonna €" readonly>
                    </td>
                </tr>

                <tr>
                    <td colspan="3"><p class="smaller">Esente IVA ai sensi dell’art.8 del D.P.R. 633/72. Documento
                            n°<input id="esIvaDal" type="number"
                                     class="smaller form-control"
                                     style="width:5%; display:inline"
                                     placeholder="0000">
                            valido dal <input id="esIvaAl" type="date" class="smaller form-control"
                                              style="display:inline; width:20%"> al <input
                                type="date" class="smaller form-control" style="display:inline; width:20%"></p></td>
                    <td class="text-center"><p>S. E. & O.</p></td>
                </tr>

                </tbody>

            </table>
        </div>
    </div>
</page>

<div id="stampa" style="padding-top: 10px; padding-bottom: 10px;" class="container-fluid">
<span class="h1">
<a href="../fatture.php."> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span>
</div>
<?php include_once("../template/parrot/foot.php") ?>

<script>
    var memory = ["default"];
    var idRiga = 1;
    $('.incolonnatore').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_articoli.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.value + ' - ' + suggestion.data.descr + " - " + suggestion.data.prezzo + "€";
        },
        onSelect: function (suggestion) {
            var execute = false;
            $(function () {
                for (var prodotto in memory) {
                    if (suggestion.value == memory[prodotto]) {
                        console.log(prodotto);
                        alert("Hai già inserito questo prodotto");
                        execute = false;
                    }
                    else {
                        execute = true;
                    }
                }
                if (execute === true) {
                    var articoli = "<p class=\"col-xs-12 arrArticoli noMargin\" id=\"idArticoli-" + idRiga + "\" >" + suggestion.data.descr + "</p>";
                    $("#incolonnaArticoli").append(articoli);
                    var quantita = "<input id=\"idQuantita-" + idRiga + "\" type=\"number\" class=\"form-control arrQuantita\" min=\"1\" value=\"1\">";
                    $("#incolonnaQuantita").append(quantita);
                    var prezzo = "<p class=\"valuta col-xs-10 noMargin\" id=\"prezzo-" + idRiga + "\">" + parseFloat(suggestion.data.prezzo).toFixed(2) + "</p> ";
                    var prezzoTOT = "<p class=\"valuta col-xs-10 noMargin\" id=\"prezzoTOT-" + idRiga + "\">" + parseFloat(suggestion.data.prezzo).toFixed(2) + "</p>";
                    $("#incolonnaPrezzi").append(prezzo);
                    $("#incolonnaPrezziTot").append(prezzoTOT);
                    prezziTot($("#idQuantita-" + idRiga));
                    memory.push(suggestion.value);
                    idRiga++;

                    $(".arrQuantita, #iva").keyup(function () {
                        prezziTot($(this));
                    });
                    $(".arrQuantita, #iva").click(function () {
                        prezziTot($(this));
                    });
                }



            });
        }
    });
    function prezziTot(quantita) {
        quantitaScelta = quantita.val();
        quantitaId = quantita.attr("id");
        quantitaId = quantitaId.split("-");
        prezzoUnitario = $("#prezzo-" + quantitaId[1]).text();
        prezzoTotale = quantitaScelta * (parseFloat(prezzoUnitario));
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

        $("#parziale").val(somma.toFixed(2));
        var iva = $("#iva").val();
        iva = somma * (iva / 100);
        $("#totaleDovuto").val((somma + iva).toFixed(2));
    }

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

        }
    });

    function save() {
        var dati = {
            data: $("#data").val(),
            pagamento: $("#pagamento").val(),
            cliente: $("#cliente").val(),
            ivaCliente: $("#ivaCliente").val(),
            indirizzoCliente: $("#indirizzo").val(),
            cittaCliente: $("#citta").val(),
            pr: $("#pr").val(),
            cap: $("#cap").val(),
            arrayQuantita: ciclaArray($("p[id*=idQuantita-]")),
            arrayProdotti: ciclaArray($("p[id*=idArticoli-]")),
            arrayPrezziCad: ciclaArray($("p[id*=prezzo-]")),
            arrayPrezzi: ciclaArray($("p[id*=prezzoTOT-]")),
            parziale: $("#parziale").val(),
            iva: $("#iva").val(),
            totaleDovuto: $("#totaleDovuto").val(),
            esIvaDal: $("#esIvaDal").val(),
            esIvaAl: $("#esIvaAl").val()
        };

        var call = $.ajax({
            url: "http://<?php echo $base_url ?>/gen_documenti/post.php",
            method: "POST",
            data: {data: dati},
            dataType: "json"
        });
        call.done(function (msg) {
            console.log(msg);
        });
        console.log(dati);
        return true;
    }

    function ciclaArray(variabile) {
        var i = 0,
            ritorna = "";
        for (i = 0; i < variabile.length; i++) {
            if ((i + 1) < variabile.length) {
                ritorna += variabile[i].textContent + "||";
            }
            else {
                ritorna += variabile[i].textContent;
            }
        }

        return ritorna;
    }
</script>
</body>
