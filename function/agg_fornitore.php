<?php
   include("../DB/config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

        // tipo, username e password da form
       $nomeF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['nomeF']));
       $cognomeF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['cognomeF']));
       $codF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['codF']));
       $descrF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['descrF']));
       $noteF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['noteF']));
       $indirizzoLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['indirizzoLF']));
       $cittaLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['cittaLF']));
       $capLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['capLF']));
       $provLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['provLF']));
       $telLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['telLF']));
        $faxLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['faxLF']));
        $statoLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['statoLF']));
        $emailLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['emailLF']));
        $urlLF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['urlLF']));
        $PIVAF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['PIVAF']));
        $CFF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['CFF']));
        $IBANF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['IBANF']));
        $bancaF = htmlspecialchars(mysqli_real_escape_string($conndb, $_POST['bancaF']));

      //inserisci dati in tabella clienti generale
$sql_gen = "INSERT INTO fornitori (nomeF, cognomeF, codF, descrF, noteF, indirizzoLF, cittaLF, capLF, provLF, telLF, faxLF, statoLF, emailLF, urlLF, PIVAF, CFF, IBANF, bancaF) VALUES ('$nomeF', '$cognomeF', '$codF', '$descrF', '$noteF', '$indirizzoLF', '$cittaLF', '$capLF', '$provLF', '$telLF', '$faxLF', '$statoLF', '$emailLF', '$urlLF', '$PIVAF', '$CFF', '$IBANF', '$bancaF')";

//controllo inserimento
if ($conndb->query($sql_gen) === TRUE) {
    $ck = "
          <div class=\"alert alert-success alert-dismissable\">
          Inserimento dati generali effettuato con <strong>successo.</strong>
          </div>
          ";
} else {
    $ck = "
         <div class=\"alert alert-danger alert-dismissable\">
         Errore durante l'inserimento dati generali: $conndb->error;
         </div>
         ";
} }

?>

<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
	<meta charset="utf-8">
	<title>Gestionale Provenzano</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("./../template/parrot/style.php"); // Carica gli stili del tema in uso ?>

    <?php include_once("session.php"); ?>

    <style>

        .login_ {
            margin: auto;
            text-align: center;
        }
        .login_form {
            display: inline-block;
            width: 400px;
            max-width: 100%;
        }
        select[name="tipoFORM"] {
            margin-bottom: 5px;
        }
        .theLogo {
            padding-top: 30px;
        }
        .theLogo img{
            width: 500px;
            max-width: 100%;
        }

        h3, h4 {
            color: #EA640C;
        }

    </style>

</head>
<body>
        <!-- #### Navbars #### -->
        <?php include_once("./../template/parrot/navbar.php") ?>

    <div class="container">
        <small><?php echo $ck; ?></small>
    </div>

        <div class="componant-section">
            <div class="container login_">
                <form method="POST">
                    <h1>Nuovo fornitore</h1>
                    <h4>Scheda generale</h4>
                    <input class="form-control widthAuto" type="text" name="nomeF" placeholder="Nome o Ragione Sociale">
                    <input class="form-control widthAuto" type="text" name="cognomeF" placeholder="Cognome">
                    <input class="form-control widthAuto" type="text" name="codF" placeholder="codice"><br/>
                    <input class="form-control widthAuto" type="text" name="descrF" placeholder="Descrizione">
                    <input class="form-control widthAuto" type="text" name="noteF" placeholder="Note">
                    <h4>Scheda sede legale</h4>
                    <input class="form-control widthAuto" type="text" name="indirizzoLF" placeholder="Indirizzo">
                    <input class="form-control widthAuto" type="text" name="cittaLF" placeholder="Citta'">
                    <input class="form-control widthAuto" type="text" name="capLF" placeholder="CAP"><br/>
                    <input class="form-control widthAuto" type="text" name="provLF" placeholder="Provincia (XX)">
                    <input class="form-control widthAuto" type="text" name="telLF" placeholder="Telefono">
                    <input class="form-control widthAuto" type="text" name="faxLF" placeholder="Fax"><br/>
                    <input class="form-control widthAuto" type="text" name="statoLF" placeholder="Stato">
                    <input class="form-control widthAuto" type="text" name="emailLF" placeholder="e-Mail">
                    <input class="form-control widthAuto" type="text" name="urlLF" placeholder="URL sito web">
                    <h4>Scheda contabilita'</h4>
                    <input class="form-control widthAuto" type="text" name="PIVAF" placeholder="Partita IVA">
                    <input class="form-control widthAuto" type="text" name="CFF" placeholder="Codice Fiscale (no spazi)"><br/>
                    <input class="form-control widthAuto" type="text" name="IBANF" placeholder="Codice IBAN (no spazi)">
                    <input class="form-control widthAuto" type="text" name="bancaF" placeholder="Nome banca"><br/>
                    <input class="form-control widthAuto" type="submit" value="Crea Fornitore">
                </form>
            </div>
        </div>

        <?php include_once("./../template/parrot/foot.php") ?>


	</body>
</html>
