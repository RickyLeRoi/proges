<?php
   include("../DB/config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
       switch ($_POST['case']) {
           case "add":
               // tipo, username e password da form
               $tipoLOG = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['tipoLOG']));
               $userLOG = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['userLOG']));
               $pswdLOG = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['pswdLOG']));

               $sql_ins = "INSERT INTO users (tipoLOG, userLOG, pswdLOG) VALUES ('$tipoLOG', '$userLOG', '$pswdLOG')";

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
               // tipo, username e password da form
               $id = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['id']));
               $tipoLOG = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['tipoLOG']));
               $userLOG = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['userLOG']));
               $pswdLOG = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['pswdLOG']));

               $sql_edit = "UPDATE users SET tipoLOG='$tipoLOG', userLOG='$userLOG', pswdLOG='$pswdLOG' WHERE id='$id';";

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
               // tipo, username e password da form
               $id = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['id']));

               $sql_del = "DELETE FROM users WHERE id='$id'";

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
	<title>Check login</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php
    include_once("../template/parrot/style.php");
    include_once("../function/session.php");
    ?>

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
            width: 20%;
        }
        td{
            text-align: center;
            width: 20%;
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
                Lista user per login
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
    $sql_rows = "SELECT * FROM users";
    echo mysqli_num_rows(mysqli_query($conndb, $sql_rows));
    ?>
    </span>
</div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../DB/config.php");
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conndb, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $tipoLOG = $row['tipoLOG'];
                    $userLOG = $row['userLOG'];
                    $pswdLOG = $row['pswdLOG'];
                    echo "<tr>
                    <td class='valore-" . $id . "'>" . $id . "</td>
                    <td class='valore-" . $id . "'>" . $tipoLOG . "</td>
                    <td class='valore-" . $id . "'>" . $userLOG . "</td>
                    <td class='valore-" . $id . "'>" . $pswdLOG . "</td>
                    <td class='form-inline'>

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
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                            <select name="tipoLOG" class="form-control widthAuto">
                                <option value="Titolare">Titolare</option>
                                <option value="Operatore" selected>Operatore</option>
                                <option value="Tecnico">Tecnico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">Username</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="userLOG" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">Password</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="pswdLOG" placeholder="Password">
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
            <div role="tabpanel" class="tab-pane" id="mod">
                <form action="#" method="POST">
                    <div class="col-sm-12">
                        <div class="row" style="margin-top: 15px">
                            <label class="col-sm-2 control-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control autoWidth modifica" name="id" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                            <select name="tipoLOG" class="form-control widthAuto">
                                <option value="Titolare">Titolare</option>
                                <option value="Operatore" selected>Operatore</option>
                                <option value="Tecnico">Tecnico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control modifica" name="userLOG" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control modifica" name="pswdLOG" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-2 col-sm-offset-10">
                        <input type="hidden" name="case" value="edit">
                        <input class="form-control " type="submit" value="Salva">
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
            $(".modifica[name=tipoLOG]").val(obj[1].textContent);
            $(".modifica[name=userLOG]").val(obj[2].textContent);
            $(".modifica[name=pswdLOG]").val(obj[3].textContent);
        }
    </script>
	</body>
</html>
