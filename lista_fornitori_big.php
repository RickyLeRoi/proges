<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
	<meta charset="utf-8">
	<title>Lista Clienti - Gestionale Provenzano</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php");
            include_once("function/session.php");
            include_once("DB/config.php");?>

</head>
<body>
        <!-- #### Navbars #### -->
        <?php include_once("template/parrot/navbar.php") ?>

        <div class="masthead">
            <div class="masthead-title">
                <div class="container">
                    Lista Fornitori
                    <small>Gestionale & Fatturazione</small>
                </div>
            </div>
        </div>
    <div style="max-width: 100%; overflow-x: scroll;" class="container">
     <div>
        <form action="lista_fornitori.php">
            <input class="form-control widthAuto" type="submit" value="Torna alla sintesi">
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
                <th>Indirizzo legale</th>
                <th>Citta' legale</th>
                <th>CAP legale</th>
                <th>Prov legale</th>
                <th>Telefono legale</th>
                <th>Fax legale</th>
                <th>Stato legale</th>
                <th>email legale</th>
                <th>URL legale</th>
                <th>P.IVA</th>
                <th>Cod Fisc</th>
                <th>IBAN</th>
                <th>Banca</th>
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
                <td>".$indirizzoLF."</td>
                <td>".$cittaLF."</td>
                <td>".$capLF."</td>
                <td>".$provLF."</td>
                <td>".$telLF."</td>
                <td>".$faxLF."</td>
                <td>".$statoLF."</td>
                <td>".$emailLF."</td>
                <td>".$urlLF."</td>
                <td>".$PIVAF."</td>
                <td>".$CFF."</td>
                <td>".$IBANF."</td>
                <td>".$bancaF."</td>
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
