<?php
   include("../DB/config.php");
$ck = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       switch ($_POST['case']) {
           case "add":
               $cod_int = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['cod_int']));
               $nome = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['nome']));
               $descr = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['descr']));
               $cod_barre = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['cod_barre']));
               $prezzo = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['prezzo']));
               $note = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['note']));
               $misura = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['misura']));

               $sql_ins = "INSERT INTO articoli (cod_int, descr, misura, cod_barre, prezzo, note) VALUES ('$cod_int', '$descr', '$misura', '$cod_barre', '$prezzo', '$note')";

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
               $id = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['id']));
               $cod_int = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['cod_int']));
               $descr = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['descr']));
               $cod_barre = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['cod_barre']));
               $prezzo = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['prezzo']));
               $note = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['note']));
               $misura = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['misura']));

               $sql_edit = "UPDATE articoli SET cod_int='$cod_int', descr='$descr', misura='$misura',cod_barre='$cod_barre', prezzo='$prezzo', note='$note' WHERE id='$id';";

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

               $id = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['id']));

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
    Totale voci n.
    <?php
    $sql_rows = "SELECT * FROM articoli";
    echo mysqli_num_rows(mysqli_query($conndb, $sql_rows));
    ?>
    </span>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codice interno</th>
                <th>Descrizione</th>
                <th>Misura</th>
                <th>Codice a barre</th>
                <th>Prezzo</th>
                <th>Note</th>
                <th colspan="2">Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../DB/config.php");
            $sql = "SELECT * FROM articoli";
            $result = mysqli_query($conndb, $sql);
            while($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $cod_int = $row['cod_int'];
                $misura = $row['misura'];
                $descr = $row['descr'];

                $cod_barre = $row['cod_barre'];
                $prezzo = $row['prezzo'];
                $note = $row['note'];

                echo "<tr>
                <td class='valore-" . $id . "'>" . $id . "</td>
                <td class='valore-" . $id . "'>" . $cod_int . "</td>
                <td class='valore-" . $id . "'>" . $misura . "</td>
                <td class='valore-" . $id . "'>" . $descr . "</td>
                
                <td class='valore-" . $id . "'>" . $cod_barre . "</td>
                <td class='valore-" . $id . "'>" . $prezzo . "</td>
                <td class='valore-" . $id . "'>" . $note . "</td>
                <td colspan=2 class='form-inline'>
                    
                    <form  action='#' method='POST'>
                        <button class='form-control' type='submit' name='case' value='del'>Elimina</button>
                        <input class='form-control' type='button' value='Modifica' data-toggle=\"tab\" onClick='modifica(\"valore-" . $id . "\")'>
                        <input type='hidden' name='id' value='" . $id . "'>
                    </form>
                </td>
                </tr>";
            }
            mysqli_close($conndb);
            ?>
        </tbody>
    </table>
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
                            <label class="col-sm-2 control-label">Misura</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="misura" placeholder="Misura">
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
                            <label class="col-sm-2 control-label">Misura</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="misura" placeholder="Misura">
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
            function modifica(val) {
                var obj = ($("." + val));
                $("#openModTab").click();
                console.log(obj[0].textContent);
                $(".modifica[name=id]").val(obj[0].textContent);
                $(".modifica[name=cod_int]").val(obj[1].textContent);
                $(".modifica[name=misura]").val(obj[2].textContent);
                $(".modifica[name=descr]").val(obj[3].textContent);
                $(".modifica[name=cod_barre]").val(obj[4].textContent);
                $(".modifica[name=prezzo]").val(obj[5].textContent);
                $(".modifica[name=note]").val(obj[6].textContent);
            }
        </script>
	</body>
</html>
