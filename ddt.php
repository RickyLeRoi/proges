<?php
include_once("function/session.php");
include("DB/config.php");

$query = "SELECT doc_ddt.*, doc_ddt_num.*, clienti.nomeC, clienti.cognomeC, clienti.codC
                FROM doc_ddt
                  INNER JOIN doc_ddt_num
                    ON doc_ddt.id=doc_ddt_num.id
                  LEFT JOIN clienti
                    ON doc_ddt_num.dest=clienti.id";

/* check connection */
if ($result = $conndb->query($query)) {
    if ($debug === true) printf("<!-- Select returned %d rows.\n -->", $result->num_rows);
    $oggett_ddt = 1;
    if ($result->num_rows === 0) {
        $norows = "Non è presente alcun record";
    }

}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);
    $oggett_ddt = 0;
    exit();
}

$queryb = "SELECT num
                FROM doc_ddt_num";

/* check connection */
if ($resultb = $conndb->query($queryb)) {
    if ($debug === true) printf("<!-- Select returned %d rows.\n -->", $resultb->num_rows);
    $oggetto_ddt = 1;
    if ($resultb->num_rows === 0) {
        $doc_ddt_num = 1;
    }
    if ($resultb->num_rows > 0) {
        $last_row = $resultb->fetch_object();
        $doc_ddt_num = $last_row->num + 1;
    }


}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);
    $numerazione_fatt = "Errore";
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
    <meta charset="utf-8">
    <title>DocumentiDiTrasporto - Gestionale Provenzano</title>
    <meta name="description" content="Gestionale per etichettificio Provenzano"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php") // Carica gli stili del tema in uso ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <?php include_once("function/session.php") ?>

    <style>
        .autocomplete-suggestions {color: #000000}
        .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
        .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
        .autocomplete-selected { background: #F0F0F0; }
        .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
        .autocomplete-group { padding: 2px 5px; }
        .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
    </style>

</head>

<body>
<!-- #### Navbars #### -->
<?php include_once("template/parrot/navbar.php") ?>

    <div class="masthead">
        <div class="masthead-title">
            <div class="container">
                Genera DDT
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="post" action="gen_documenti/ddt.php">
                <input type="hidden" value="<?php echo $numerazione_ddt ?>">
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
                Lista DDT
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
            <th>DDT n°</th>
            <th>Codice Cliente</th>
            <th>Cliente</th>
            <th>Note</th>
            <th>Data</th>
        </tr>
        </thead>
        <tbody id="records">

        </tbody>

    </table>
</div>
<?php $result->close(); ?>
<?php include_once("template/parrot/foot.php") ?>

<script>
    suggerimento("");
    function suggerimento(runsVar) {

        var call = $.ajax({
            url: "http://<?php echo $base_url ?>/json/get_ddt.php",
            method: "GET",
            data: "check=" + runsVar,
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
                    "<td>" + records[x].data.nomeC + " " + records[x].data.cognomeC + "</td>" +
                    "<td>" + records[x].data.note + "</td>" +
                    "<td>" + records[x].data.reg_date + "</td>";
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
</script>

    <?php include_once("template/parrot/foot.php") ?>

</body>
</html>
