<?php $base_url = $_SERVER["SERVER_NAME"] . "/proges"; ?>
<html>
<head>
    <title>Fattura</title>
    <meta charset="utf-8">
    <meta name="author" content="Daniele Irsuti">
    <meta name="image" content="../images/logos.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <style>
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
        / / display: inline-block;
        / / width: auto;
        }

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

        .typo {
            font-family: monospace, monospace;
            padding-left: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div style="padding-top: 10px; padding-bottom: 10px;" class="container-fluid stampa">
<span class="h1">
<a href="../ddt.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span>
</div>

<page>
    <div style="background: #FFF" class="container-fluid">
        <div class="table-responsive">
            <table class="table-bordered table table-striped">
                <thead>
                <tr>
                    <td colspan="4">
                        <div class="row"> <!-- 1 -->
                            <div class="col-xs-4">
                                <p><b>FATT. N°</b></p>
                            </div>
                            <div class="col-xs-2">
                                <div class="row">
                                    <input class="form-control" value="0" type="number" size="4" placeholder="0000"
                                           readonly>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <p><b id="datime"></b></p>
                            </div>
                        </div>
                        <div class="row"><!-- 2 -->
                            <div class="col-xs-4">
                                <p>Pagamento</p>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" class="form-control" value="lo prendo dal db">
                            </div>
                        </div>
                        <div class="row"><!-- 3 -->
                            <div class="col-xs-12">
                                <p>CREDITO SICILIANO - AG. BAGHERIA</p>
                                <p>IBAN: <strong>IT 69 F 03019 43070 000008380468</strong></p>
                            </div>
                        </div>
                    </td>
                    <td colspan="1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-xs-3"><p>Spett.le</p></div>
                                <div class="col-xs-9"><input class="form-control" type="text" placeholder="Cliente">
                                </div>
                                <div class="col-xs-12"><input class="form-control" type="text" placeholder="P.IVA">
                                </div>
                                <div class="col-xs-12"><input class="form-control" type="text"
                                                              placeholder="Indirizzo legale"></div>

                                <div class="col-xs-6">
                                    <input class="form-control" type="text" placeholder="Città">
                                </div>
                                <div class="col-xs-3">
                                    <input class="form-control" type="text" placeholder="(PR)">
                                </div>
                                <div class="col-xs-3">
                                    <input class="form-control" type="text" placeholder="CAP">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </thead>

                <tbody>

                <tr>
                    <td colspan="2"><p class="col-md-12">Descrizione della merce</p></td>
                    <td><p class="col-md-12">Quantità</p></td>
                    <td colspan="1"><p class="col-md-12">Imp.unit.</p></td>
                    <td><p class="col-md-12">Importo</p></td>
                </tr>

                <tr class="qnt" height="400">
                    <td id="incolonnaArticoli" colspan="2">
                        <input id="idProdotto" class=" stampa form-control incolonnatore" type="text"
                               placeholder="Cod. Articolo">
                    </td>
                    <td id="incolonnaQuantita">
                        <input id="idQuantita-default" type="number" class="stampa form-control arrQuantita" min="0">
                    </td>
                    <td id="incolonnaPrezzi">
                        <input class="form-control stampa" type="text" value="Auto" readonly>
                    </td>
                    <td id="incolonnaPrezziTot">
                        <input class="form-control stampa" type="text" value="Auto" readonly>
                    </td>
                </tr>

                </tbody>


                </tr>

            </table>
        </div>
    </div>
</page>

<div style="padding-top: 10px; padding-bottom: 10px;" class="container-fluid stampa">
<span class="h1">
<a href="../ddt.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span>
</div>
<?php include_once("../template/parrot/foot.php") ?>

<script>
    var idRiga = 1;
    $('.incolonnatore').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_articoli.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.value + ' - ' + suggestion.data.descr + " - " + suggestion.data.prezzo + "€";
        },
        onSelect: function (suggestion) {
            $(function () {
                var articoli = "<p class=\"col-xs-12 arrArticoli noMargin\" id=\"idArticoli-" + idRiga + "\" >" + suggestion.value + " - " + suggestion.data.descr + "</p>";
                $("#incolonnaArticoli").append(articoli);

                var quantita = "<input id=\"idQuantita-" + idRiga + "\" type=\"number\" class=\"form-control arrQuantita\" min=\"1\" value=\"1\">";
                $("#incolonnaQuantita").append(quantita);

                var prezzo = "<p class=\"valuta col-xs-10 noMargin\" id=\"prezzo-" + idRiga + "\">" + suggestion.data.prezzo + "</p> ";
                var prezzoTOT = "<p class=\"valuta col-xs-10 noMargin\" id=\"prezzoTOT-" + idRiga + "\">" + parseFloat(suggestion.data.prezzo, 2) + "</p>";
                $("#incolonnaPrezzi").append(prezzo);
                $("#incolonnaPrezziTot").append(prezzoTOT);
                idRiga++;
            });

            $(".arrQuantita").keyup(function () {
                prezziTot($(this));
            });
            $(".arrQuantita").click(function () {
                prezziTot($(this));
            });
        }
    });

    $(function () {
        var Stamp = new Date(),
            min = Stamp.getMinutes();

        if (min < 10) {
            min = "0" + min;
        }
        var stampElem = Stamp.getDate() + "/" + (Stamp.getMonth() + 1) + "/" + (Stamp.getYear() + 1900) + "   " + Stamp.getHours() + ":" + min;
        $("#datime").html(stampElem);
    });

    function prezziTot(quantita) {
        console.log(quantita);
        quantitaScelta = quantita.val();

        quantitaId = quantita.attr("id");
        quantitaId = quantitaId.split("-");

        prezzoUnitario = $("#prezzo-" + quantitaId[1]).text();
        prezzoTotale = quantitaScelta * (parseInt(prezzoUnitario));

        prezzoTotID = $("#prezzoTOT-" + quantitaId[1]);
        prezzoTotID.text(prezzoTotale);


        //console.log(prezzoUnitario[1]);
    }


</script>
</body>
</html>
