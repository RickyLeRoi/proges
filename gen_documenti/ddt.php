<?php $base_url = $_SERVER["SERVER_NAME"]."/proges"; ?>
<!doctype html>
<html>
<head>
    <title>Carta Intestata</title>
    <meta charset="utf-8">
    <meta name="author" content="Daniele Irsuti">
    <meta name="image" content="../images/logos.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" >
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <style>
        .autocomplete-suggestions {color: #000000}
        .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
        .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
        .autocomplete-selected { background: #F0F0F0; }
        .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
        .autocomplete-group { padding: 2px 5px; }
        .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
    </style>
    <style>
        @media screen {
            .noMargin {
                padding: 6px 12px;
                margin: 0;
                line-height: 1.42857143;
                height: 34px;
            }
        }
        @media print {
            .noMargin {
                margin: 0 0 0;
            }
            input[type=number],
            input[type=text],
            input[type=date],
            input[type=datetime]{
                border: none;
                background: transparent;
                box-shadow: none;
                height: 7pt;
                padding: 0;
                margin: 0 0 0;
                font-size: 7pt;
            }
            p {
                font-size: 7pt;
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
        .typo {
            font-family: monospace, monospace;
            padding-left: 5px;
            font-size: 14px;
        }

    </style>
</head>
<body>
<div style="padding-top: 10px; padding-bottom: 10px;" class="stampa container-fluid text-center"><span class="h1"><a href="#" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Stampa</a></span></div>
<page>
    <div style="background: #FFF" class="container-fluid">
        <div class="table-responsive">
            <table class="table-bordered table table-striped">
                <thead>
                <tr colspan="2">
                    <td><div class="col-md-12">
                            <img class="logo" src="../images/logos.png" alt="" width="127">
                        </div></td>
                    <td colspan="2">

                        <p class="col-md-12"><h5 class="text-center"><strong>DOCUMENTO DI TRASPORTO<br>DPR 476/96</strong></h5></p>
                        <div class="text-left">
                            <p class="col-xs-4"><input type="checkbox"> Mittente </p>
                            <p class="col-xs-4"><input type="checkbox"> Destinatario </p>
                            <p class="col-xs-4"><input type="checkbox"> Vettore</p>
                        </div>

                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="3">
                        <p class="col-sm-4">Destinatario</p>
                        <p class="col-sm-8"><input class="form-control" type="text"></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="3"><p class="col-sm-4">Domicilio o residenza</p><p class="col-sm-8"><input class="form-control" type="text"></p></td>
                </tr>
                <tr>
                    <td colspan="3"><p class="col-sm-4">Causale del trasporto</p><p class="col-sm-8"><input class="form-control" type="text"></p></td>
                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Aspetto esteriore dei beni</p>
                        <p class="col-md-12"><input type="text" class="form-control"></p>

                    </td>
                    <td>
                        <p class="col-md-12">N. Colli</p>
                        <p class="col-md-12"><input type="number" class="form-control"></p>
                    </td>
                    <td>
                        <p class="col-md-12">Peso Kg.</p>
                        <p class="col-md-12"><input type="number" class="form-control"></p>
                    </td>


                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Consegna o inizio trasporto a mezzo mittente o destinatario</p>
                        <p class="col-md-12"><!-- <input type="text" class="form-control"> --></p>
                    </td>
                    <td>
                        <p class="col-md-12">Data e ora</p>
                        <p class="col-md-12"><!--<input type="date" class="form-control">--></p>
                    <td>
                        <p class="col-md-12">Firma del Conducente</p>
                        <p class="col-md-12">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><p class="col-md-12">Descrizione dei beni</p></td><td><p class="col-md-12">Q.tà'</p></td></tr>
                <tr class="qnt" height="400">
                    <td id="incolonnaArticoli" class="text-right" colspan="2">
                        <input id="incolonnatore" type="text" class="stampa form-control">
                    </td>
                    <td id="incolonnaQuantita">
                        <input id="idQuantita-default" type="number" class="stampa form-control arrQuantita" min="1" value="1">
                    </td>

                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Vettori, domicilio o residenza</p>
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
                    <td><p  class="col-md-12">Annotazioni - Variazioni</p></td>
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
<div  class=" stampa container-fluid text-center"><span class="h1"><a href="#" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Stampa</a></span></div>
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
