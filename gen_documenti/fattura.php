<?php
$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include("../function/session.php");
include("../DB/config.php");
?>

<?php // IVA

$query = "SELECT * FROM iva";
$iva = [];
/* check connection */


if ($result = $conndb->query($query)) {
    //if ($debug === true) printf("/* Select returned %d rows. */\n", $result->num_rows);
    //echo $query;

    $result = $conndb->query($query);
    //print_r($result->fetch_object());
    while ($list = $result->fetch_object()) {
        array_push($iva, $list->aliquota);
    }
}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);

}

//print_r($iva);
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

        .readOnly {
            visibility: hidden;
        }

        @media screen {
            .noMargin {
                padding: 6px 12px;
                margin: 0;
                line-height: 1.42857143;
                height: 34px;
            }

            table {
                margin-top: 40px;
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
<page>
    <div style="background: #FFF" class="container-fluid">
        <div class="table-responsive">

            <table class="table-bordered table table-striped">

                <thead>

                <tr>

                    <td colspan="4" style="width:600;">
                        <p class="col-md-12">
                        <h5 class="text-center">
                            <strong>FATT N.
                                <input class="form-control" style="width:15%; text-align:right; display:inline"
                                       type="number" size="4" placeholder="0000" readonly>/
                                <script language="javascript">
                                    document.write(aaaa);
                                </script>
                                <br/> del
                                <script language="javascript">
                                    document.write(gg + "/" + MM + "/" + aaaa);
                                </script>
                                ore
                                <script language="javascript">
                                    document.write(hh + ":" + mm);
                                </script>
                            </strong>
                        </h5>
                        </p>
                        <div class="row">
                            <p class="col-xs-6 text-right">Pagamento - </p>
                            <div class="col-xs-6">
                                <select class="form-control">
                                    <option>DA DOVE LO PRENDE?</option>
                                    <option>DAL DB</option>
                                </select>
                            </div>

                        </div>
                        <div class="row text-center">
                            <p class="col-md-12">CREDITO SICILIANO - AG. BAGHERIA</p>
                            <p class="col-md-12">IBAN: <strong>IT 69 F 03019 43070 000008380468</strong></p>

                        </div>

                    </td>

                    <td colspan="3">
                        <div class="col-md-12">
                            Spett.le<br/><br/>
                            <input id="nomeCliente" type="text" class="text-center form-control"
                                   placeholder="Cliente con suggerimento"><br/>
                            <input id="pivaCliente" type="text" class="text-center form-control"
                                   placeholder="auto P.IVA" readonly><br/>
                            <input id="indirizzoLegale" type="text" class="text-center form-control"
                                   placeholder="auto Indirizzo legale" readonly><br/>
                            <input id="cittaLegale" class="text-center form-control" type="text"
                                   style="width:45%; display:inline;" placeholder="auto Città" readonly>
                            <span style="width:7%;"> - </span>
                            <input id="provinciaLegale" class="text-center form-control" type="text"
                                   style="width:15%; display:inline;" placeholder="(PR)" readonly>
                            <span style="width:7%;"> - </span>
                            <input id="capLegale" class="text-center form-control" type="number" min="00010" max="98199"
                                   style="width:25%; display:inline;" placeholder="auto CAP" readonly>
                        </div>
                    </td>

                </tr>

                </thead>

                <tbody>

                <tr>
                    <td colspan="4"><p class="col-md-12">Descrizione della merce</p></td>
                    <td><p class="col-md-12">Quantità</p></td>
                    <td><p class="col-md-12">Imp.unit.</p></td>
                    <td><p class="col-md-12">Importo</p></td>
                </tr>

                <tr class="qnt" height="auto">

                    <td colspan="4">
                        <div id="incolonnaArticoli" class="row">
                            <div class="stampa col-xs-4"><input id="idProdotto" class="form-control incolonnatore"
                                                                type="text" placeholder="Cod. Articolo"></div>
                            <div class="stampa col-xs-1"><p> - </p></div>
                            <div class="stampa col-xs-7"><input class="stampa form-control" type="text"
                                                                placeholder="Descrizione articolo automatica" readonly>
                            </div>

                        </div>

                    </td>

                    <td id="incolonnaQuantita">
                        <input id="idQuantita-default" type="number" style="text-align:right;"
                               class="stampa form-control arrQuantita readOnly" min="0">
                    </td>

                    <td id="incolonnaPrezzi">
                        <input class="form-control stampa readOnly" type="text" placeholder="auto da DB €" readonly>
                    </td>

                    <td id="incolonnaPrezziTot">
                        <input class="form-control stampa readOnly" style="text-align:right;" type="text"
                               placeholder="auto da riga €" readonly>
                    </td>

                </tr>

                <tr>
                    <td style="text-align:center" colspan="5" rowspan="3"><p>Contributo CONAI assolto ove dovuto.</p>
                    </td>
                    <td style="text-align:right"><p>Totale parziale €</p></td>
                    <td>
                        <input class="form-control stampa hidden" style="text-align:right" type="number"
                               placeholder="auto da colonna €" readonly>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:right"><p>IVA %</p></td>
                    <td>
                        <select class="form-control" style="text-align:right">
                            <?php foreach ($iva as $key => $aliquota) : ?>
                                <option value="<?php echo $key ?>"><?php echo $aliquota ?>%</option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:right"><p><strong>Totale dovuto €</strong></p></td>
                    <td>
                        <p id="totaleDovuto"></p>
                    </td>
                </tr>

                </tbody>

            </table>
        </div>
    </div>
</page>

<div id="stampa"
     style="position: fixed; bottom: 0; left: 0; width: 100%; padding-top: 10px; padding-bottom: 10px; background: lightskyblue"
     class="container-fluid">
<span class="h1">
<a href="../ddt.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span>
</div>
<?php include_once("../template/parrot/foot.php") ?>

<script>
    var idRiga = 1;
    $('#nomeCliente').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_clienti.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.value + ' - ' + suggestion.data.nomeC + " - " + suggestion.data.cognomeC + ' - ' + suggestion.data.PIVAC;
        },
        onSelect: function (suggestion) {
            $(function () {
                $("#nomeCliente").val(suggestion.data.nomeC + " " + suggestion.data.cognomeC);
                $("#pivaCliente").val(suggestion.data.PIVAC);
                $("#indirizzoLegale").val(suggestion.data.indirizzoLC);
                $("#cittaLegale").val(suggestion.data.cittaLC);
                $("#provinciaLegale").val(suggestion.data.provLC);
                $("#capLegale").val(suggestion.data.capLC);
            });
        }
    });
    $('.incolonnatore').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_articoli.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.value + ' - ' + suggestion.data.descr + " - " + suggestion.data.prezzo + "€";
        },
        onSelect: function (suggestion) {
            $(function () {
                var articoli = "<p class=\"text-right col-xs-12 arrArticoli noMargin\" id=\"idArticoli-" + idRiga + "\" >" + suggestion.value + " - " + suggestion.data.descr + "</p>";
                $("#incolonnaArticoli").append(articoli);
                var quantita = "<input id=\"idQuantita-" + idRiga + "\" type=\"number\" class=\"form-control arrQuantita\" min=\"1\" value=\"1\">";
                $("#incolonnaQuantita").append(quantita);
                var prezzo = "<p class=\"valuta col-xs-10 noMargin\" id=\"prezzo-" + idRiga + "\">" + suggestion.data.prezzo + "</p> ";
                var prezzoTOT = "<p class=\"valuta col-xs-10 noMargin prezzi\" id=\"prezzoTOT-" + idRiga + "\">" + parseFloat(suggestion.data.prezzo, 2) + "</p>";
                $("#incolonnaPrezzi").append(prezzo);
                $("#incolonnaPrezziTot").append(prezzoTOT);
                idRiga++;
                totaleDovuto();
            });
            $(".arrQuantita").keyup(function () {
                prezziTot($(this));
                totaleDovuto();
            });
            $(".arrQuantita").click(function () {
                prezziTot($(this));
                totaleDovuto();
            });
        }
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

    function totaleDovuto() {
        var prezzo = $(".prezzi"),
            i = 0;
        console.log(prezzo[i]);
        risultato = 0;
        while (prezzo[i]) {
            risultato += parseInt(prezzo[i].textContent);
            i++;
        }
        $("#totaleDovuto").text(risultato);

        return risultato;
    }
</script>
</body>
