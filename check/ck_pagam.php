<?php
   include("../DB/config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
       switch ($_POST['case']) {
           case "add":
               $tipo = mysqli_real_escape_string($conndb,$_POST['tipo']);
               $descr = mysqli_real_escape_string($conndb,$_POST['descr']);

               $sql_ins = "INSERT INTO pagam (tipo, descr) VALUES ('$tipo', '$descr')";

               //controllo inserimento
               if ($conndb->query($sql_ins) === TRUE) {
                   $ok_ins = "
                   <div class=\"alert alert-success alert-dismissable\">
                   Inserimento effettuato con <strong>successo.</strong>
                   </div>
                   ";
               } else {
                   $no_ins = "
                   <div class=\"alert alert-danger alert-dismissable\">
                   Errore durante l'inserimento <br/> $conndb->error;
                   </div>
                   ";
               } break;

           case "edit":
               $id = mysqli_real_escape_string($conndb,$_POST['id']);
               $tipo = mysqli_real_escape_string($conndb,$_POST['tipo']);
               $descr = mysqli_real_escape_string($conndb,$_POST['descr']);

               $sql_edit = "UPDATE pagam SET tipo='$tipo', descr='$descr' WHERE id='$id';";

                //controllo inserimento
                if ($conndb->query($sql_edit) === TRUE) {
                    $ok_edit = "
                    <div class=\"alert alert-success alert-dismissable\">
                    Modifica effettuata con <strong>successo.</strong>
                    </div>
                    ";
                } else {
                    $no_edit = "
                    <div class=\"alert alert-danger alert-dismissable\">
                    Errore durante la modifica $conndb->error;
                    </div>
                    ";
                } break;

           case "del":

               $id = mysqli_real_escape_string($conndb,$_POST['id']);

               $sql_del = "DELETE FROM pagam WHERE id='$id'";

                //controllo inserimento
                if ($conndb->query($sql_del) === TRUE) {
                    $ok_del = "
                    <div class=\"alert alert-success alert-dismissable\">
                    Record eliminato con <strong>successo.</strong>
                    </div>
                    ";
                } else {
                    $no_del = "
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
	<title>Check Pagamenti</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<?php include_once("./../template/parrot/style.php"); // Carica gli stili del tema in uso ?>

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
            width: 25%;
        }
        td{
            text-align: center;
            width: 25%;
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
                Lista Pagamenti
                <small>Gestionale & Fatturazione</small>
            </div>
        </div>
    </div>

<div class="container">
    <small>
        <?php echo $ok_ins; echo $no_ins; echo $ok_edit; echo $no_edit; echo $ok_del; echo $no_del; ?>
    </small>
    <br/>
    <span style="color:#EA640C">
    Totale voci n.
    <?php
    $sql_rows = "SELECT * FROM pagam";
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
                <th>Descrizione</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../DB/config.php");
            $sql = "SELECT * FROM pagam";
            $result = mysqli_query($conndb, $sql);
            while($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $tipo = $row['tipo'];
                $descr = $row['descr'];
                echo "<tr>
                <td>".$id."</td>
                <td>".$tipo."</td>
                <td>".$descr."</td>
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
                <input type="text" class="form-control widthAuto" name="tipo" placeholder="Tipo">
                </td>
                <td>
                <input type="text" class="form-control widthAuto" name="descr" placeholder="Descrizione">
                </td>
                <td>
                <input type="image" name="case" value="add" src="../images/add.png" alt="Submit" width="20px">
                </td>
            </tr>
            </thead>
        </table>
    </form>

    <form method="POST">
        <table class="table table-inp">
            <thead>
            <tr>
                <td>
                <input type="text" class="form-control widthAuto" name="id" placeholder="ID da modificare">
                </td>
                <td>
                <input type="text" class="form-control widthAuto" name="tipo" placeholder="Tipo">
                </td>
                <td>
                <input type="text" class="form-control widthAuto" name="descr" placeholder="Descrizione">
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
