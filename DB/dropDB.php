<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['confirm'] == 'Yes') {
        // Credenziali
        include_once("config.php");
        // Cancella database
        $sql = "DROP DATABASE IF EXISTS $database";
        if (mysqli_query($conndb, $sql)) {
            $adv = "<div class=\"alert alert-danger alert-dismissable\">
                   Database eliminato con <strong>successo.</strong>
                   </div>";
            header('Refresh: 3; URL = homeDB.php');
          $fp = fopen('data.php', 'w');
            fwrite($fp,
        '<?php
        $host = "";
        $userDB = "";
        $pswdDB = "";
        $database = "";
        ?>'  ); } else {
            echo "C'e' stato un errore eliminando il database: " . mysqli_error($conndb);
        }
        mysqli_close($conndb); }

     if ($_POST['confirm'] == 'No') {
        $adv = "<div class=\"alert alert-success alert-dismissable\">
        DataBase non eliminato. Attendi 3 secondi.
        </div><br/>";
         header('Refresh: 3; URL = homeDB.php');
    }
}
?>

<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
    <meta charset="utf-8">
    <title>Cancella tabelle</title>
    <meta name="description" content="Gestionale per etichettificio Provenzano"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php
    include_once("../template/parrot/style.php");
    include_once("../function/session.php");
    include_once("config.php");
    ?>

    <style>
        label {
            color: #FFF;
        }
    </style>
</head>

<body>
<!-- #### Navbars #### -->
<?php include("../template/parrot/navbar.php") ?>

<div class="container">
    <?php echo $adv; ?>
    <form method="POST">
        <h2 style="color: #FFF">Sei sicuro/a?</h2>
        <input class="btn btn-default" type="submit" name="confirm" value="Yes">
        <input class="btn btn-default" type="submit" name="confirm" value="No">
    </form>
</div>

<?php include_once("../template/parrot/foot.php") ?>

</body>
</html>
