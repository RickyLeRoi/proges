<?php
    include("./DB/config.php");

$query = "SELECT stampa_preventivo.*, clienti.nomeC, clienti.cognomeC, clienti.codC
                FROM stampa_preventivo
                LEFT JOIN clienti
                    ON stampa_preventivo.cf=clienti.CFC,
                    AND stampa_preventivo.Piva=clienti.PIVAC";

/* check connection */
if ($result = $conndb->query($query)) {
    if ($debug === true) printf("<!-- Select returned %d rows.\n -->", $result->num_rows);
    $oggett_fatt = 1;
    if ($result->num_rows === 0) {
        $norows = "Non è presente alcun record";
    }

}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);
    $oggett_fatt = 0;
}

$queryb = "SELECT id
                FROM stampa_preventivo";

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
    <meta charset="utf-8">
    <title>Preventivi - Gestionale Provenzano</title>
    <meta name="description" content="Gestionale per etichettificio Provenzano"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php") // Carica gli stili del tema in uso ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <?php include_once("function/session.php") ?>

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
    </style>

</head>

<body>
<!-- #### Navbars #### -->
<?php include_once("template/parrot/navbar.php") ?>

<div class="masthead">
    <div class="masthead-title">
        <div class="container">
            Genera Preventivo
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <form class="form-horizontal" method="post" action="gen_documenti/preventivo.php">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Genera</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="masthead">
    <div class="masthead-title">
        <div class="container">
            Lista Preventivi
            <form method="post" action="#">
                <input onkeyup="suggerimento($(this).val())" id="filtro" class="form-control" type="text"
                       placeholder="Filtra per utente">
            </form>
        </div>
    </div>
</div>

<div class="container">
<span style="color:#EA640C">
Totale voci n. <span id="voci"></span>
</span>
</div>

<div class="container">
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Preventivo n°</th>
            <th>Codice Cliente</th>
            <th>Cliente</th>
            <th>Data</th>
            <th>Pagamento</th>
            <th>Totale</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody id="records">

        </tbody>

    </table>
    <div class="row">
        <nav class="col-sm-12">
            <ul class="pager">
                <li class="previous"><a style="display:none" id="prec" href="#"><span aria-hidden="true">&larr;</span> Precedente</a></li>
                <li class="next"><a id="succ" href="#">Successivo <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>
</div>

<?php $result->close(); ?>
<?php include_once("template/parrot/foot.php") ?>

<script>
    var records,
    rowsReturned = 0;
    page = 0,
    limit = 20;
    suggerimento("");
    function suggerimento(runsVar) {

        var call = $.ajax({
            url: "http://<?php echo $base_url ?>/json/get_preventivi.php",
            method: "GET",
            data: "check=" + runsVar +"&page="+page+"&limit="+limit,
            dataType: "json"
        });

        call.done(function (msg) {

            var records = msg.suggestions;
            console.log(records);
            $("#records").html("");
            for (var x in records) {
                var record = "" +
                    "<td>" + records[x].data.num + "</td>" +
                    "<td>" + records[x].data.codC + "</td>" +
                    "<td>" + records[x].data.cliente + "</td>" +
                    "<td>" + records[x].data.data_doc + "</td>" +
                    "<td>" + records[x].data.pagamDescr + "</td>" +
                    "<td>" + records[x].data.totale + " €</td>" +
                    "<td><a href='http://<?php echo $base_url ?>/gen_documenti/post.php?preventivo_n=" + records[x].data.num + "&documento=preventivo'>Link</a></td>";
                $("#records").append("<tr>" + record + "</tr>");
            }

            if (jQuery.isEmptyObject(records)) {
                record = "<tr><td>" + "Non è presente alcun record" + "</td></tr>";
                $("#records").html(record);
            }
            var voci = parseInt(x) + 1;
            if (!voci) {
                voci = "0";
            }
            $("#voci").text(voci);
        });

        call.error(function (msg) {
            console.log(msg);
        });
    }

    $("#succ").click(function() {
        page += +20;
        limit += +20;
        suggerimento($("#filtro").val());
        if (page == 0) {

            $("#prec").show();
        }

        if (page > 0 ) {
            $("#prec").show();
        }
    });

    $("#prec").click(function() {
        if (page !=0 ) {
            page += -20;
            limit += -20;
            suggerimento($("#filtro").val());
            $("#prec").show();
            if (page == 0 ) {
                $("#prec").hide();
            }
        }
    });


</script>

</body>
</html>
