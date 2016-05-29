<?php
   include("../DB/config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
       switch ($_POST['case']) {
           case "add":
               // tipo, username e password da form
               $tipoLOG = mysqli_real_escape_string($conndb,$_POST['tipoLOG']);
               $userLOG = mysqli_real_escape_string($conndb,$_POST['userLOG']);
               $pswdLOG = mysqli_real_escape_string($conndb,$_POST['pswdLOG']);

               $sql_ins = "INSERT INTO login (tipoLOG, userLOG, pswdLOG) VALUES ('$tipoLOG', '$userLOG', '$pswdLOG')";

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
               $id = mysqli_real_escape_string($conndb,$_POST['id']);
               $tipoLOG = mysqli_real_escape_string($conndb,$_POST['tipoLOG']);
               $userLOG = mysqli_real_escape_string($conndb,$_POST['userLOG']);
               $pswdLOG = mysqli_real_escape_string($conndb,$_POST['pswdLOG']);

               $sql_edit = "UPDATE login SET tipoLOG='$tipoLOG', userLOG='$userLOG', pswdLOG='$pswdLOG' WHERE id='$id';";

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
               $id = mysqli_real_escape_string($conndb,$_POST['id']);

               $sql_del = "DELETE FROM login WHERE id='$id'";

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
        <?php echo $ck;  ?>
    </small>
    <br/>
    <span style="color:#EA640C">
    Totale voci n.
    <?php
    $sql_rows = "SELECT * FROM login";
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
                $sql = "SELECT * FROM login";
                $result = mysqli_query($conndb, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $tipoLOG = $row['tipoLOG'];
                    $userLOG = $row['userLOG'];
                    $pswdLOG = $row['pswdLOG'];
                    echo "<tr>
                    <td>".$id."</td>
                    <td>".$tipoLOG."</td>
                    <td>".$userLOG."</td>
                    <td>".$pswdLOG."</td>
                    <td></td>
                    </tr>";
                }
                mysqli_close($conndb);
                ?>
            </tbody>
        </table>

    <form method="POST">
        <table class="table table-inp">
            <thead>
            <tr>
                <td></td>
                <td>
                    <select name="tipoLOG" class="form-control widthAuto">
                        <option value="Titolare">Titolare</option>
                        <option value="Operatore" selected>Operatore</option>
                        <option value="Tecnico">Tecnico</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control widthAuto" name="userLOG" placeholder="Username">
                </td>
                <td>
                    <input type="text" class="form-control widthAuto" name="pswdLOG" placeholder="Password">
                </td>
                <td>
                <input type="image" name="case" value="add" src="../images/add.png" alt="Submit" width="20px">
                </td>
            </tr>
            </thead>
        </table>
    </form>

    <form method="POST"  style="background: #EA640C;">
        <table class="table table-inp">
            <thead>
            <tr>
                <td>
                <input type="text" class="form-control widthAuto" name="id" placeholder="ID da modificare">
                </td>
                <td>
                    <select name="tipoLOG" class="form-control widthAuto">
                        <option value="Titolare">Titolare</option>
                        <option value="Operatore" selected>Operatore</option>
                        <option value="Tecnico">Tecnico</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control widthAuto" name="userLOG" placeholder="Username">
                </td>
                <td>
                    <input type="text" class="form-control widthAuto" name="pswdLOG" placeholder="Password">
                </td>
                <td>
                <input type="image" name="case" value="edit" src="../images/edit.png" alt="Submit" width="20px">
                </td>
            </tr>
            </thead>
        </table>
    </form>

    <form method="POST">
        <table class="table table-bot table-inp">
            <thead>
            <tr>
                <td>
                <input class="form-control widthAuto" type="text" name="id" placeholder="ID da eliminare"></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                <input type="image" name="case" value="del" src="../images/del.png" alt="Submit" width="20px">
                </td>
            </tr>
            </thead>
        </table>
    </form>
    </div>
	<?php include_once("./../template/parrot/foot.php") ?>

	</body>
</html>
