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
                Lista clienti
                <small>Gestionale & Fatturazione</small>
            </div>
        </div>
    </div>
    <div style="max-width: 100%; overflow-x: scroll;" class="container">
     <div>
        <form action="lista_clienti.php">
            <input class="form-control widthAuto" type="submit" value="Torna alla sintesi">
        </form>
    </div>

    <table  class="table">
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
                <th>Indirizzo</th>
                <th>Citta'</th>
                <th>CAP</th>
                <th>Prov</th>
                <th>Telefono</th>
                <th>Cellulare</th>
                <th>Stato</th>
                <th>email</th>
                <th>URL</th>
                <th>P.IVA</th>
                <th>Cod Fisc</th>
                <th>IBAN</th>
                <th>Banca</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("DB/config.php");
            $sql = "SELECT * FROM clienti";
            $result = mysqli_query($conndb, $sql);
            while($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $nomeC = $row['nomeC'];
                $cognomeC = $row['cognomeC'];
                $codC = $row['codC'];
                $descrC = $row['descrC'];
                $noteC = $row['noteC'];
                $indirizzoLC = $row['indirizzoLC'];
                $cittaLC = $row['cittaLC'];
                $capLC = $row['capLC'];
                $provLC = $row['provLC'];
                $telLC = $row['telLC'];
                $faxLC = $row['faxLC'];
                $statoLC = $row['statoLC'];
                $emailLC = $row['emailLC'];
                $urlLC = $row['urlLC'];
                $indirizzoAC = $row['indirizzoAC'];
                $cittaAC = $row['cittaAC'];
                $capAC = $row['capAC'];
                $provAC = $row['provAC'];
                $telAC = $row['telAC'];
                $cellAC = $row['cellAC'];
                $statoAC = $row['statoAC'];
                $emailAC = $row['emailAC'];
                $urlAC = $row['urlAC'];
                $PIVAC = $row['PIVAC'];
                $CFC = $row['CFC'];
                $IBANC = $row['IBANC'];
                $bancaC = $row['bancaC'];
                echo "<tr>
                <td>".$id."</td>
                <td>".$nomeC."</td>
                <td>".$cognomeC."</td>
                <td>".$codC."</td>
                <td>".$descrC."</td>
                <td>".$noteC."</td>
                <td>".$indirizzoLC."</td>
                <td>".$cittaLC."</td>
                <td>".$capLC."</td>
                <td>".$provLC."</td>
                <td>".$telLC."</td>
                <td>".$faxLC."</td>
                <td>".$statoLC."</td>
                <td>".$emailLC."</td>
                <td>".$urlLC."</td>
                <td>".$indirizzoAC."</td>
                <td>".$cittaAC."</td>
                <td>".$capAC."</td>
                <td>".$provAC."</td>
                <td>".$telAC."</td>
                <td>".$cellAC."</td>
                <td>".$statoAC."</td>
                <td>".$emailAC."</td>
                <td>".$urlAC."</td>
                <td>".$PIVAC."</td>
                <td>".$CFC."</td>
                <td>".$IBANC."</td>
                <td>".$bancaC."</td>
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
