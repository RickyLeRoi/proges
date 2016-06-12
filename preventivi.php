<?php
    include("./DB/config.php");

    $query = "SELECT prev.*, numerazione_pre.*, clienti.nomeC, clienti.cognomeC, clienti.codC
                FROM prev
                  INNER JOIN numerazione_pre
                    ON prev.id=numerazione_pre.id
                  LEFT JOIN clienti
                    ON numerazione_pre.dest=clienti.id";

    /* check connection */
    if ($result = $conndb->query($query)) {
        if ($debug === true) printf("<!-- Select returned %d rows.\n -->", $result->num_rows);
        $oggetto_prev = 1;
        if ($result->num_rows === 0) {
            $norows = "Non è presente alcun record";
        }

    }
    if ($conndb->connect_errno) {
        printf("Connect failed: %s\n", $conndb->connect_error);
        $oggetto_prev = 0;
        exit();
    }


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
    <?php include_once("function/session.php") ?>

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
                    <th>Note</th>
                    <th>Data</th>
                    <th>Pagamento</th>
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
                    url: "http://<?php echo $base_url ?>/json/get_preventivi.php",
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
                            "<td>" + records[x].data.reg_date + "</td>" +
                            "<td>" + records[x].data.pagamDescr + "</td>";
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
	</body>
</html>
