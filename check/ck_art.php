<?php
   include("../DB/config.php");
$ck = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       switch ($_POST['case']) {
           case "add":
               $cod_int = mysqli_real_escape_string($conndb, $_POST['cod_int']);
               $cliente = mysqli_real_escape_string($conndb, $_POST['cliente']);
               $descr = mysqli_real_escape_string($conndb, $_POST['descr']);
               $cod_barre = mysqli_real_escape_string($conndb, $_POST['cod_barre']);
               $prezzo = mysqli_real_escape_string($conndb, $_POST['prezzo']);
               $note = mysqli_real_escape_string($conndb, $_POST['note']);
               $misura = mysqli_real_escape_string($conndb, $_POST['misura']);
               $tipologia = mysqli_real_escape_string($conndb, $_POST['tipologia']);

               $sql_ins = "INSERT INTO articoli (cod_int, cliente, descr, misura, cod_barre, prezzo, note, tipologia) VALUES ('$cod_int', '$cliente', '$descr', '$misura', '$cod_barre', '$prezzo', '$note', '$tipologia')";

               //controllo inserimento
               if ($conndb->query($sql_ins) === TRUE) {
                   $ck = "
                   <div class=\"alert alert-success alert-dismissable\">
                   Inserimento effettuato con <strong>successo.</strong>
                   </div>
                   ";
               } else {
                   $ck = "
                   <div class=\"alert alert-danger alert-dismissable\">
                   Errore durante l'inserimento <br/> $conndb->error;
                   </div>
                   ";
               } break;

           case "edit":
               $id = mysqli_real_escape_string($conndb, $_POST['id']);
               $cod_int = mysqli_real_escape_string($conndb, $_POST['cod_int']);
               $cliente = mysqli_real_escape_string($conndb, $_POST['cliente']);
               $descr = mysqli_real_escape_string($conndb, $_POST['descr']);
               $cod_barre = mysqli_real_escape_string($conndb, $_POST['cod_barre']);
               $prezzo = mysqli_real_escape_string($conndb, $_POST['prezzo']);
               $note = mysqli_real_escape_string($conndb, $_POST['note']);
               $misura = mysqli_real_escape_string($conndb, $_POST['misura']);
               $tipologia = mysqli_real_escape_string($conndb, $_POST['tipologia']);

               $sql_edit = "UPDATE articoli SET cod_int='$cod_int', cliente='$cliente', descr='$descr', misura='$misura',cod_barre='$cod_barre', prezzo='$prezzo', note='$note', tipologia='$tipologia' WHERE id='$id';";

                //controllo inserimento
                if ($conndb->query($sql_edit) === TRUE) {
                    $ck = "
                    <div class=\"alert alert-success alert-dismissable\">
                    Modifica effettuata con <strong>successo.</strong>
                    </div>
                    ";
                } else {
                    $ck = "
                    <div class=\"alert alert-danger alert-dismissable\">
                    Errore durante la modifica $conndb->error;
                    </div>
                    ";
                } break;

           case "del":

               $id = mysqli_real_escape_string($conndb, $_POST['id']);

               $sql_del = "DELETE FROM articoli WHERE id='$id'";

                //controllo inserimento
                if ($conndb->query($sql_del) === TRUE) {
                    $ck = "
                    <div class=\"alert alert-success alert-dismissable\">
                    Record eliminato con <strong>successo.</strong>
                    </div>
                    ";
                } else {
                    $ck = "
                    <div class=\"alert alert-danger alert-dismissable\">
                    Errore durante l'eliminazione $conndb->error;
                    </div>
                    ";
                } break;
       } }
?>

<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
	<meta charset="utf-8">
	<title>Check Articoli</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<?php
    include_once("./../template/parrot/style.php"); // Carica gli stili del tema in uso ?>

    <?php include_once("../function/session.php"); ?>

    <style>
        .table-inp {
            background: #EA640C;
            margin-bottom: 7px;
        }
        .table-bot {
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }
        th {
            text-align: center;
            width: 12.5%;
        }
        td{
            text-align: center;
            width: 12.5%;
        }
        input.text {
            width: 100%;
        }
    </style>
</head>
<body>
        <!-- #### Navbars #### -->
        <?php include_once("./../template/parrot/navbar.php") ?>

    <div class="masthead">
        <div class="masthead-title">
            <div class="container">
                Lista Articoli
                <small>Gestionale & Fatturazione</small>
            </div>
        </div>
    </div>

<div class="container">
    <small>
        <?php echo $ck; ?>
    </small>
    <br/>
    <span style="color:#EA640C">
Totale voci n. <span id="voci"></span>
    </span>
</div>
<div class="container">
    <form method="post" action="#">
        <input onkeyup="suggerimento($(this).val())" id="filtro" class="form-control" type="text"
               placeholder="Filtra per utente">
    </form>
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codice interno</th>
                <th>Cliente</th>
                <th>Descrizione</th>
                <th>Codice a barre</th>
                <th>Misura</th>
                <th>Prezzo</th>
                <th>Note</th>
                <th hidden="hidden">Tipologia</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody id="records">

        </tbody>
    </table>
    <div class="row">
        <nav class="col-sm-12">
            <ul class="pager">
                <li class="previous"><a style="display: none" id="prec" href="#"><span aria-hidden="true">&larr;</span> Precedente</a></li>
                <li class="next"><a id="succ" href="#">Successivo <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#new" aria-controls="home" role="tab" data-toggle="tab">Aggiungi
                    nuovo</a></li>
            <li role="presentation"><a id="openModTab" href="#mod" aria-controls="profile" role="tab" data-toggle="tab">Modifica</a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div id="tabs" class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="new">
                <form action="#" method="POST">
                    <div class="col-sm-12">
                        <div class="row" style="margin-top: 15px">
                            <label class="col-sm-2 control-label">Codice interno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cod_int" placeholder="Codice interno">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Cliente</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cliente" placeholder="Cliente">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Descrizione</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="descr" placeholder="Descrizione">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Codice a barre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cod_barre" placeholder="Codice a barre">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Misura</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="misura" placeholder="Misura">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">Prezzo</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="prezzo" placeholder="Prezzo">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">Note</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="note" placeholder="Note">
                            </div>
                        </div>
                    </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label">Tipologia</label>
                        </div>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipologia">
                                <option>Normale</option>
                                <option>Scaglione</option>
                                <option>Stock</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-2 col-sm-offset-10">
                        <input type="hidden" name="case" value="add">
                        <input class="form-control" type="submit" value="Aggiungi">
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <!-- EDIT  ///////////////////////////////////////// -->
            <div role="tabpanel" class="tab-pane" id="mod">
                <form action="#" method="POST">
                    <div class="col-sm-12">
                        <div class="row" style="margin-top: 15px">
                            <label class="col-sm-2 control-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="id" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Codice interno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="cod_int"
                                       placeholder="Codice interno">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Cliente</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="cliente" placeholder="Cliente">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Descrizione</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="descr" placeholder="Descrizione">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Codice a barre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="cod_barre"
                                       placeholder="Codice a barre">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Misura</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="misura" placeholder="Misura">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">Prezzo</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="prezzo" placeholder="Prezzo">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">Note</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="note" placeholder="Note">
                            </div>
                        </div>
                    </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label">Tipologia</label>
                        </div>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipologia">
                                <option>Normale</option>
                                <option>Scaglione</option>
                                <option>Stock</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-2 col-sm-offset-10">
                        <input type="hidden" name="case" value="edit">
                        <input class="form-control" type="submit" value="Aggiungi">
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>

        </div>

    </div>
</div>
	<?php include_once("./../template/parrot/foot.php") ?>
    <script>

/*

                echo "<tr>
                <td class='valore-" . $id . "'>" . $id . "</td>
                <td class='valore-" . $id . "'>" . $cod_int . "</td>
                <td class='valore-" . $id . "'>" . $cliente . "</td>
                <td class='valore-" . $id . "'>" . $descr . "</td>
                <td class='valore-" . $id . "'>" . $cod_barre . "</td>
                <td class='valore-" . $id . "'>" . $misura . "</td>
                <td class='valore-" . $id . "'>" . $prezzo . "</td>
                <td class='valore-" . $id . "'>" . $note . "</td>
                <td class='valore-" . $id . "'>" . $tipologia . "</td>
                <td colspan=2 class='form-inline'>

                    <form  action='#' method='POST'>
                        <button class='form-control' type='submit' name='case' value='del'>Elimina</button>
                        <input class='form-control' type='button' value='Modifica' data-toggle=\"tab\" onClick='modifica(\"valore-" . $id . "\")'>
                        <input type='hidden' name='id' value='" . $id . "'>
                    </form>
                </td>
                </tr>";

                */
    function suggerimento(runsVar) {

        var call = $.ajax({
            url: "http://<?php echo $base_url ?>/json/get_articoli.php",
            method: "GET",
            data: "check=" + runsVar +"&page="+page+"&limit="+limit,
            dataType: "json"

        });

        call.done(function (msg) {

            var records = msg.suggestions;
            console.log(records);
            $("#records").html("");
            rowsReturned = 0;
            for (var x in records) {
                console.log(msg.suggestions[x].value);
                var record = "" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + msg.suggestions[x].value + "</td>" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.cod_int + "</td>" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.cliente + "</td>" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.descr + "</td>" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.cod_barre + "</td>" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.misura + "</td>" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.prezzo + " €</td>" +
                    "<td class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.note + "</td>" +
                    "<td hidden='hidden' class='valore-" + msg.suggestions[x].value + "'>" + records[x].data.tipologia + "</td>" +
                    `<td colspan=2 class='form-inline'>

                    <form  action='#' method='POST'>
                        <button class='form-control' type='submit' name='case' value='del'>Elimina</button>
                        <input class='form-control' type='button' value='Modifica' data-toggle=\"tab\" onClick='modifica(\"valore-`+ msg.suggestions[x].value +`\")'>
                        <input type='hidden' name='id' value='`+ msg.suggestions[x].value +`'>
                    </form>
                </td>`;
                $("#records").append("<tr>" + record + "</tr>");
            }

            if (jQuery.isEmptyObject(records)) {
                record = "<tr><td colspan='10'>" + "Non è presente alcun record" + "</td></tr>";
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
        var records,
            rowsReturned = 0;
            page = 0,
            limit = 20;
            suggerimento("");

                $("#filtro").keydown(function() {
                    page = 0;
                    limit = 20;
                });
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

            suggerimento($("#filtro").val());


        function modifica(val) {
            var obj = ($("." + val));
            $("#openModTab").click();

            console.log(obj[0].textContent);
            $(".modifica[name=id]").val(obj[0].textContent);
            $(".modifica[name=cod_int]").val(obj[1].textContent);
            $(".modifica[name=cliente]").val(obj[2].textContent);
            $(".modifica[name=descr]").val(obj[3].textContent);
            $(".modifica[name=cod_barre]").val(obj[4].textContent);
            $(".modifica[name=misura]").val(obj[5].textContent);
            $(".modifica[name=prezzo]").val(obj[6].textContent);
            $(".modifica[name=note]").val(obj[7].textContent);
            $(".modifica[name=tipologia]").val(obj[8].textContent);

        }
    </script>
	</body>
</html>
