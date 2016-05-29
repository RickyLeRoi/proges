<?php
   include("../DB/config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
       switch ($_POST['case']) {
           case "add":
               $cod_int = mysqli_real_escape_string($conndb,$_POST['cod_int']);
               $nome = mysqli_real_escape_string($conndb,$_POST['nome']);
               $descr = mysqli_real_escape_string($conndb,$_POST['descr']);
               $cod_barre = mysqli_real_escape_string($conndb,$_POST['cod_barre']);
               $prezzo = mysqli_real_escape_string($conndb,$_POST['prezzo']);
               $note = mysqli_real_escape_string($conndb,$_POST['note']);

               $sql_ins = "INSERT INTO articoli (cod_int, nome, descr, cod_barre, prezzo, note) VALUES ('$cod_int', '$nome', '$descr', '$cod_barre', '$prezzo', '$note')";

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
                $id = mysqli_real_escape_string($conndb,$_POST['id']);
                $cod_int = mysqli_real_escape_string($conndb,$_POST['cod_int']);
                $nome = mysqli_real_escape_string($conndb,$_POST['nome']);
                $descr = mysqli_real_escape_string($conndb,$_POST['descr']);
                $cod_barre = mysqli_real_escape_string($conndb,$_POST['cod_barre']);
                $prezzo = mysqli_real_escape_string($conndb,$_POST['prezzo']);
                $note = mysqli_real_escape_string($conndb,$_POST['note']);

               $sql_edit = "UPDATE articoli SET cod_int='$cod_int', nome='$nome', descr='$descr', cod_barre='$cod_barre', prezzo='$prezzo', note='$note' WHERE id='$id';";

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

               $id = mysqli_real_escape_string($conndb,$_POST['id']);

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
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Codice a barre</th>
                <th>Prezzo</th>
                <th>Note</th>
                <th>Azioni</th>
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
                $nome = $row['nome'];
                $descr = $row['descr'];
                $cod_barre = $row['cod_barre'];
                $prezzo = $row['prezzo'];
                $note = $row['note'];
                echo "<tr>
                <td>".$id."</td>
                <td>".$cod_int."</td>
                <td>".$nome."</td>
                <td>".$descr."</td>
                <td>".$cod_barre."</td>
                <td>".$prezzo."</td>
                <td>".$note."</td>
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
                <input type="text" class="form-control" name="cod_int" placeholder="Codice interno">
                </td>
                <td>
                <input type="text" class="form-control" name="nome" placeholder="Nome">
                </td>
                <td>
                <input type="text" class="form-control" name="descr" placeholder="Descrizione">
                </td>
                <td>
                <input type="text" class="form-control" name="cod_barre" placeholder="Codice a barre">
                </td>
                <td>
                <input type="text" class="form-control" name="prezzo" placeholder="Prezzo">
                </td>
                <td>
                <input type="text" class="form-control" name="note" placeholder="Note">
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
                <input type="text" class="form-control" name="id" placeholder="ID da modificare">
                </td>
                <td>
                <input type="text" class="form-control" name="cod_int" placeholder="Codice interno">
                </td>
                <td>
                <input type="text" class="form-control" name="nome" placeholder="Nome">
                </td>
                <td>
                <input type="text" class="form-control" name="descr" placeholder="Descrizione">
                </td>
                <td>
                <input type="text" class="form-control" name="cod_barre" placeholder="Codice a barre">
                </td>
                <td>
                <input type="text" class="form-control" name="prezzo" placeholder="Prezzo">
                </td>
                <td>
                <input type="text" class="form-control" name="note" placeholder="Note">
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
                <input class="form-control" type="text" name="id" placeholder="ID da eliminare"></td>
                <td></td>
                <td></td>
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
