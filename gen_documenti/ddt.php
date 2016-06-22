<?php
$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("../DB/config.php");
include_once("./../function/session.php");
date_default_timezone_set("europe/rome");

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

if ((isset($post)) == true) {

    $idRiga = count($quantita) + 1;
    $modifica = true;

} else {

    $idRiga = 1;
    $memory = '["default"]';
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
            input[type=datetime],
            #nota, .form-control {
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
                            <p class="col-xs-4"><input name="sceltaConsegna" <?php if (@$vettore == "Mittente") {
                                    echo "checked";
                                } ?> value="Mittente" type="radio"> Mittente </p>
                            <p class="col-xs-4"><input name="sceltaConsegna" <?php if (@$vettore == "Destinatario") {
                                    echo "checked";
                                } ?> value="Destinatario" type="radio"> Destinatario </p>
                            <p class="col-xs-4"><input name="sceltaConsegna" <?php if (@$vettore == "Vettore") {
                                    echo "checked";
                                } ?> value="Vettore" id="vect" type="radio">
                                Vettore</p>
                            <div class="clearfix"></div>
                            <p class="col-md-12 text-center"><strong>Bagheria,</strong> <input id="data" type="date"
                                                                                               value="<?php echo $data ?>"
                                                                                               class="stampa form-control"
                                                                                               style="width: auto; display:inline">
                            </p>

                            <p class="col-md-12">N° <input class="form-control" style="width: auto; display: inline"
                                                           id="idDDT" type="number" value="<?php echo @$id ?>" readonly
                                                           placeholder="0000"></p>
                            </strong>
                        </div>

                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="3">
                        <p class="col-sm-4">Destinatario</p>
                        <p class="col-sm-8"><input value="<?php echo @$cliente ?>" id="cliente" class="form-control"
                                                   style="width:50%; display:inline"
                                                   type="text"
                                                   placeholder="Nome cliente"><input id="piva"
                                                                                     value="<?php echo @$piva ?>"
                                                                                     class="form-control"
                                                                                     style="width:50%; display:inline"
                                                                                     type="text" readonly
                                                                                     placeholder="auto P.IVA"></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="3"><p class="col-sm-4">Domicilio o residenza</p>
                        <p class="col-sm-8"><input value="<?php echo @$indirizzo ?>" id="indirizzo" class="form-control"
                                                   style="width:50%; display:inline"
                                                   type="text"
                                                   readonly
                                                   placeholder="auto Indirizzo"><input value="<?php echo @$citta ?>"
                                                                                       id="citta" class="form-control"
                                                                                       style="width:50%; display:inline"
                                                                                       type="text"
                                                                                       readonly
                                                                                       placeholder="auto Citta'"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><p class="col-sm-4">Causale del trasporto</p>
                        <p class="col-sm-8"><select id="causale" class="form-control">
                                <?php if (isset($causale)) : ?>
                                    <option selected value="<?php echo $causale ?>"><?php echo $causale ?></option>
                                <?php endif; ?>
                                <option value="Vendita">Vendita</option>
                                <option value="Campionatura">Campionatura</option>
                                <option value="Reso">Reso</option>
                            </select></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Aspetto esteriore dei beni</p>
                        <p class="col-md-12"><select id="aspettoBeni" class="form-control">
                                <?php if (isset($imballo)) : ?>
                                    <option selected value="<?php echo $imballo ?>"><?php echo $imballo ?></option>
                                <?php endif; ?>
                                <option>Pacchi o scatoli</option>
                                <option>Pedana</option>
                                <option>Proprio dei beni</option>
                            </select></p>

                    </td>
                    <td>
                        <p class="col-md-12">N. Colli</p>
                        <p class="col-md-12"><input id="colli" value="<?php echo @$colli ?>" type="number"
                                                    class="form-control" min="1"></p>
                    </td>
                    <td>
                        <p class="col-md-12">Peso Kg.</p>
                        <p class="col-md-12"><input id="peso" value="<?php echo @$peso ?>" type="number"
                                                    class="form-control" min="0"></p>
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
                                   value="<?php echo @$data_consegna ?>"
                                   type="datetime-local"></p>
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
                        <?php
                        if (isset($post)) :
                            foreach ($quantita as $q_id => $quantitaProdotto) : ?>
                                <input id="idQuantita-<?php echo $q_id + 1 ?>" type="number"
                                       class="form-control arrQuantita" min="1" value="<?php echo $quantitaProdotto ?>">
                            <?php endforeach; endif ?>
                    </td>

                    <td id="incolonnaArticoli" colspan="2">
                        <input id="incolonnatore" type="text" class="stampa form-control"
                               placeholder="Descrizione articolo">
                        <?php
                        if (isset($post)) :
                            foreach ($prodotti as $p_id => $prodotto) : ?>
                                <p class="col-xs-12 arrArticoli noMargin"
                                   id="idArticoli-<?php echo $p_id + 1 ?>"><?php echo $prodotto ?></p>
                            <?php endforeach; endif ?>
                    </td>

                </tr>
                <tr>
                    <td>
                        <p class="col-md-12">Vettori, domicilio o residenza</p>
                        <p class="col-md-12">
                            <select style="display: none;" id="mezzo" class="form-control">
                                <?php foreach ($mezzi as $mezzo) :
                                    if ($mezzo == $vettore) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    ?>

                                    <option <?php echo $selected ?>
                                        value="<?php echo $mezzo ?>"><?php echo $mezzo ?></option>
                                <?php endforeach; ?>
                            </select></p>
                    </td>
                    <td>
                        <p class="col-md-12">Data e ora di ritiro</p>
                        <p class="col-md-12"><input class="form-control" value="<?php echo @$data_rit ?>"
                                                    type="datetime-local" id="dataRitiro"></p>
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
                        <p class="col-md-12"><textarea placeholder="Nessuna nota..." id="nota" class="form-control"
                                                       cols="50"
                                                       rows="10"><?php echo @$note ?></textarea></p></td>
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
<div id="stampa" class="row">
    <div class="container">
        <div class="row text-right">
            <div class="col-sm-4">
                <a href="../fatture.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
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
<?php include_once("../template/parrot/foot.php") ?>

<script>
    var memory = <?php echo $memory ?>;
    var idRiga = <?php echo $idRiga ?>;
    $('#incolonnatore').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_articoli.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.value + ' - ' + suggestion.data.descr + " - " + suggestion.data.misura;
        },
        onSelect: function (suggestion) {
            var execute = false;
            $(function () {
                var checkIfExists = memory.indexOf(suggestion.data.descr);
                console.log(checkIfExists);
                if (checkIfExists !== -1) {
                    alert("Hai già inserito questo prodotto");
                    execute = false;
                }
                else {
                    execute = true;
                }

                if (execute === true) {
                    $(function () {
                        var articoli = "<p class=\"col-sm-12 arrArticoli noMargin\" id=\"idArticoli-" + idRiga + "\" >" + suggestion.data.descr + " - " + suggestion.data.misura + "</p>";
                        $("#incolonnaArticoli").append(articoli);

                        var quantita = "<input id=\"idQuantita-" + idRiga + "\" type=\"number\" class=\"form-control arrQuantita\" min=\"1\" value=\"1\">";
                        $("#incolonnaQuantita").append(quantita);
                        memory.push(suggestion.data.descr);
                        idRiga++;

                        $(".arrArticoli").click(function () {
                            cancella($(this));
                        });
                    });
                }
            });
        }
    });
    $(".arrArticoli").click(function () {
        cancella($(this));
    });
    function cancella(elemento) {
        id = elemento.attr("id");
        id = id.split("-");
        index = memory.indexOf(elemento.text());
        console.log(elemento.text());
        console.log("array - " + index);
        delete memory[index];
        $("#prezzo-" + id[1] + ",#idArticoli-" + id[1] + ",#idQuantita-" + id[1] + ",#prezzo-" + id[1] + ",#prezzoTOT-" + id[1]).remove();
    }
    $('#cliente').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'http://<?php echo $base_url ?>/json/get_clienti.php',
        formatResult: function (suggestion, currentValue) {
            return suggestion.data.PIVAC + ' - ' + suggestion.data.nomeC + " " + suggestion.data.cognomeC;
        },
        onSelect: function (suggestion) {
            $(function () {
                $("#cliente").val(suggestion.data.nomeC + " " + suggestion.data.cognomeC);
                $("#piva").val(suggestion.data.PIVAC);
                $("#citta").val(suggestion.data.cittaLC);
                $("#indirizzo").val(suggestion.data.indirizzoLC);
            });
        }
    });

    $('input[name=sceltaConsegna]').click(function () {
        if ($(this).val() == "Vettore") {
            $("#mezzo").show();
        }
        else {
            $("#mezzo").hide();
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
            aspettoBeni: $("#aspettoBeni").val(),
            cliente: $("#cliente").val(),
            indirizzo: $("#indirizzo").val(),
            citta: $("#citta").val(),
            piva: $("#piva").val(),
            causale: $("#causale").val(),
            aspettoBeni: $("#aspettoBeni").val(),
            colli: $("#colli").val(),
            peso: $("#peso").val(),
            consegnaData: $("#consegnaData").val(),
            ritiroData: $("#dataRitiro").val(),
            quantita: ciclaArray($(".arrQuantita"), "value"),
            articoli: ciclaArray($(".arrArticoli "), "textContent"),
            mezzo: $("#mezzo").val(),
            nota: $("#nota").val(),
            vettore: $("input[name=sceltaConsegna]:checked").val()


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
