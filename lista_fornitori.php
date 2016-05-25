<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
	<meta charset="utf-8">
	<title>Lista Fornitori - Gestionale Provenzano</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php") // Carica gli stili del tema in uso ?>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

    <?php include_once("function/session.php"); ?>

</head>
<body>
        <!-- #### Navbars #### -->
        <?php include_once("template/parrot/navbar.php") ?>

        <div class="masthead">
            <div class="masthead-title">
                <div class="container">
                    Lista Fornitori sintetica
                </div>
            </div>
        </div>

  <div class="container">
    <div>
        <form action="lista_fornitori_big.php">
            <input class="form-control widthAuto" type="submit" value="Lista completa">
        </form>
    </div>
      <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Codice</th>
                <th>Descrizione</th>
                <th>Note</th>
                <th>Telefono</th>
                <th>P.IVA</th>
                <th>Cod Fisc</th>
                <th>+ info</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("DB/config.php");
            $sql = "SELECT * FROM fornitori";
            $result = mysqli_query($conndb, $sql);
            while($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $nomeF = $row['nomeF'];
                $cognomeF = $row['cognomeF'];
                $codF = $row['codF'];
                $descrF = $row['descrF'];
                $noteF = $row['noteF'];
                $indirizzoLF = $row['indirizzoLF'];
                $cittaLF = $row['cittaLF'];
                $capLF = $row['capLF'];
                $provLF = $row['provLF'];
                $telLF = $row['telLF'];
                $faxLF = $row['faxLF'];
                $statoLF = $row['statoLF'];
                $emailLF = $row['emailLF'];
                $urlLF = $row['urlLF'];
                $PIVAF = $row['PIVAF'];
                $CFF = $row['CFF'];
                $IBANF = $row['IBANF'];
                $bancaF = $row['bancaF'];
                echo "<tr>
                <td>".$id."</td>
                <td>".$nomeF."</td>
                <td>".$cognomeF."</td>
                <td>".$codF."</td>
                <td>".$descrF."</td>
                <td>".$noteF."</td>
                <td>".$telLF."</td>
                <td>".$PIVAF."</td>
                <td>".$CFF."</td>
                <td>
                    <input type=\"button\" value=\"Dettagli\" onClick=\"window.alert('ID:                            $id\\nNome:                      $nomeF\\nCognome:                $cognomeF\\nCodice:                     $codF\\nDescrizione:             $descrF\\nNote:                       $noteF\\nIndirizzo:                  $indirizzoLF\\nCitta:                        $cittaLF\\nCAP:                         $capLF\\nProvincia:                 $provLF\\nTelefono:                  $telLF\\nCellulare:                 $faxLF\\nStato:                       $statoLF\\nemail:                       $emailLF\\nURL:                         $urlLF\\nP.IVA:                       $PIVAF\\nCod.Fisc.:                 $CFF\\nIBAN:                       $IBANF\\nBanca:                     $bancaF')\">
                </td>
                </tr>";
            }
            mysqli_close($conndb);
            ?>
        </tbody>
    </table>
    </div>

    <?php include_once("template/parrot/foot.php") ?>

	</body>
</html>
