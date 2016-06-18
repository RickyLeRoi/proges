<?php
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['confirm'] == 'Yes') {

        // Elimino tabella Articoli
        $sql_art = "DROP TABLE articoli";

        if (mysqli_query($conndb, $sql_art)) {
            echo "Tabella articoli eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella articoli: " . mysqli_error($conndb) . "<br/>";
        }

        // Elimino tabella Causale
        $sql_cau = "DROP TABLE ck_causale";

        if (mysqli_query($conndb, $sql_cau)) {
            echo "Tabella Causale eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella Causale: " . mysqli_error($conndb) . "<br/>";
        }

        // Elimino tabella Imballo
        $sql_imb = "DROP TABLE ck_imballo";

        if (mysqli_query($conndb, $sql_imb)) {
            echo "Tabella imballo eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella imballo: " . mysqli_error($conndb) . "<br/>";
        }

        // Elimino tabella IVA
        $sql_iva = "DROP TABLE ck_iva";

        if (mysqli_query($conndb, $sql_iva)) {
            echo "Tabella IVA eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella IVA: " . mysqli_error($conndb) . "<br/>";
        }

        // Elimino tabella Mezzo
        $sql_mezzo = "DROP TABLE ck_mezzo";

        if (mysqli_query($conndb, $sql_mezzo)) {
            echo "Tabella mezzo eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella mezzo: " . mysqli_error($conndb) . "<br/>";
        }

        // Elimino tabella Pagamento
        $sql_pag = "DROP TABLE ck_pagam";

        if (mysqli_query($conndb, $sql_pag)) {
            echo "Tabella Pagamento eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella Pagamento: " . mysqli_error($conndb) . "<br/>";
        }

        // Elimino tabella Spese Aggiuntive
        $sql_sp = "DROP TABLE ck_spese";

        if (mysqli_query($conndb, $sql_sp)) {
            echo "Tabella Spese Aggiunte eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella Spese Aggiunte: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella clienti
        $sql_c = "DROP TABLE clienti";

        if (mysqli_query($conndb, $sql_c)) {
            echo "Tabella clienti eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella clienti: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella fornitori
        $sql_f = "DROP TABLE fornitori";

        if (mysqli_query($conndb, $sql_f)) {
            echo "Tabella fornitori eliminata con successo <br/>";
        } else {
            echo "C'e' stato un errore eliminando la tabella fornitori: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella fattura
        $sql_fatt = "DROP TABLE stampa_fattura";

        if (mysqli_query($conndb, $sql_fatt)) {
            echo "Tabella fattura eliminata con successo <br/>";
            header('Refresh: 3; URL = homeDB.php');
        } else {
            echo "C'e' stato un errore eliminando la tabella fattura: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella ddt
        $sql_ddt = "DROP TABLE stampa_ddt";

        if (mysqli_query($conndb, $sql_ddt)) {
            echo "Tabella ddt eliminata con successo <br/>";
            header('Refresh: 3; URL = homeDB.php');
        } else {
            echo "C'e' stato un errore eliminando la tabella ddt: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella ndc
        $sql_ndc = "DROP TABLE stampa_ndc";

        if (mysqli_query($conndb, $sql_ndc)) {
            echo "Tabella ndc eliminata con successo <br/>";
            header('Refresh: 3; URL = homeDB.php');
        } else {
            echo "C'e' stato un errore eliminando la tabella ndc: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella preventivo
        $sql_prev = "DROP TABLE stampa_preventivo";

        if (mysqli_query($conndb, $sql_prev)) {
            echo "Tabella preventivo eliminata con successo <br/>";
            header('Refresh: 3; URL = homeDB.php');
        } else {
            echo "C'e' stato un errore eliminando la tabella preventivo: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella settaggi
        $sql_settings = "DROP TABLE settings";

        if (mysqli_query($conndb, $sql_settings)) {
            echo "Tabella settaggi eliminata con successo <br/>";
            header('Refresh: 3; URL = homeDB.php');
        } else {
            echo "C'e' stato un errore eliminando la tabella settaggi: " . mysqli_error($conndb) . "<br/>";
        }

        //Elimino tabella users per login
        $sql_us = "DROP TABLE users";

        if (mysqli_query($conndb, $sql_us)) {
            echo "Tabella users eliminata con successo <br/>";
            header('Refresh: 3; URL = homeDB.php');
        } else {
            echo "C'e' stato un errore eliminando la tabella users: " . mysqli_error($conndb) . "<br/>";
        }

        mysqli_close($conndb); }

     if ($_POST['confirm'] == 'No') {
        $adv = "<div class=\"alert alert-success alert-dismissable\">
        Tabelle non eliminate. Attendi 3 secondi.
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
