<?php
$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("../DB/config.php");
include_once("./../function/session.php");
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
<div style="padding-top: 10px; padding-bottom: 10px;" class="stampa container-fluid text-center">        <span class="h1">
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
        <div class="col-md-12"><img width="550px" src="../images/logobb.png" alt="Tipografia Provenzano">
</div></td>
<td colspan="2">

    <p class="col-md-12"><h5 class="text-center"><strong>DOCUMENTO DI TRASPORTO DPR 476/96</strong></h5></p>
<div class="text-left">
<p class="col-xs-4"><input type="checkbox"> Mittente </p>
<p class="col-xs-4"><input type="checkbox"> Destinatario </p>
<p class="col-xs-4"><input type="checkbox"> Vettore</p>
    <strong>
        <p class="col-md-12 text-center">Bagheria,
            <script language="javascript">
                document.write(" " + gg + "/" + MM + "/" + aaaa + "  ");
            </script>
            N° <input type="number" readonly placeholder="0000"></p>
    </strong>
</div>

</td>
</tr>
</thead>
<tbody>
<tr>
<td colspan="3">
<p class="col-sm-4">Destinatario</p>
    <p class="col-sm-8"><input class="form-control" style="width:50%; display:inline" type="text"
                               placeholder="Nome cliente"><input class="form-control" style="width:50%; display:inline"
                                                                 type="text" readonly placeholder="auto P.IVA"></p>
</td>
</tr>

<tr>
    <td colspan="3"><p class="col-sm-4">Domicilio o residenza</p>
        <p class="col-sm-8"><input class="form-control" style="width:50%; display:inline" type="text" readonly
                                   placeholder="auto Indirizzo"><input class="form-control"
                                                                       style="width:50%; display:inline" type="text"
                                                                       readonly placeholder="auto Citta'"></p></td>
</tr>
<tr>
<td colspan="3"><p class="col-sm-4">Causale del trasporto</p><p class="col-sm-8"><select class="form-control">
<option>Vendita</option>
<option>Campionatura</option>
<option>Reso</option>
</select></p></td>
</tr>
<tr>
<td>
<p class="col-md-12">Aspetto esteriore dei beni</p>
<p class="col-md-12"><select class="form-control">
<option>Pacchi o scatoli</option>
<option>Pedana</option>
<option>Proprio dei beni</option>
</select></p>

</td>
<td>
<p class="col-md-12">N. Colli</p>
    <p class="col-md-12"><input type="number" class="form-control" min="0"></p>
</td>
<td>
<p class="col-md-12">Peso Kg.</p>
    <p class="col-md-12"><input type="number" class="form-control" min="0"></p>
</td>


</tr>
<tr>
<td>
<p class="col-md-12">Consegna o inizio trasporto a mezzo mittente o destinatario</p>
</td>
<td>
    <p class="col-md-12">Data e ora</p>
    <p class="col-md-12">
        <input class="form-control text-center" style="width:50%; display:inline" type="date"><input
            class="form-control text-center" style="width:50%; display:inline" type="time"></p>
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
<input id="idQuantita-default" type="number" class="stampa form-control arrQuantita" min="0">
</td>

    <td id="incolonnaArticoli" colspan="2">
        <p><input id="incolonnatore" type="text" class="stampa form-control" placeholder="Descrizione articolo"></p>
    </td>

</tr>
<tr>
<td>
<p class="col-md-12">Vettori, domicilio o residenza</p>
    <p class="col-md-12"><input type="text" readonly placeholder="auto da mezzo trasporto"></p>
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
<td><p  class="col-md-12">Annotazioni - Variazioni</p>
    <p class="col-md-12"><textarea class="form-control" cols="50" rows="10">Nessuna nota</textarea></p></td>
<td colspan="2"><p class="col-md-12">Firma del destinatario</p></td>

</tr>
</tbody>
</table>
</div>
<div class="row">
<p class="col-md-12">CONDIZIONI GENERALI DI VENDITA: Il Destinatario dichiara di accettare a titolo di vendita le merci sopradescritte, dopo averne verificato la corrispondenza per qualità e quantità. I reclami devono essere avanzati entro 8 gg dal ricevimento della merce. Per qualsiasi controversia sarà esclusivamente competente il Foro di Palermo.</p>
</div>
</div>
</page>
<div  class=" stampa container-fluid text-center"><span class="h1">
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
formatResult: function(suggestion, currentValue){
return suggestion.value + ' - ' + suggestion.data.descr + " - " + suggestion.data.prezzo + "€";
},
onSelect: function (suggestion) {
$(function () {
var articoli = "<p class=\"col-sm-12 arrArticoli noMargin\" id=\"idArticoli-"+ idRiga +"\" >" + suggestion.data.nome + " - " + suggestion.data.note + "</p>";
$("#incolonnaArticoli").append(articoli);

var quantita = "<input id=\"idQuantita-" + idRiga +"\" type=\"number\" class=\"form-control arrQuantita\" min=\"1\" value=\"1\">";
$("#incolonnaQuantita").append(quantita);
idRiga++;
});
}
});
</script>

</body>
</html>
