<?php
date_default_timezone_set('Europe/Rome');
$base_url = $_SERVER["SERVER_NAME"] . "/proges";
include_once("config2.php");
echo 'il tuo ip è: ' . $_SERVER["REMOTE_ADDR"] . '<br/>';

$data = date('d-m-Y');
$anno = date('Y');
echo 'data: ' . $data . '<br/>';
echo 'anno fiscale: ' . $anno . '<br/><br/>';

switch ($data) {
    case '02-01-'.$anno:
    case '03-01-'.$anno:
    case '04-01-'.$anno:
    case '05-01-'.$anno:
    case '07-01-'.$anno:
    case '08-01-'.$anno:
    case '09-01-'.$anno:
    case '10-01-'.$anno:
    case '11-01-'.$anno:
    case '12-01-'.$anno:
                // creo tabella db fatture
                $sql_fdb = "CREATE TABLE IF NOT EXISTS stampa_fattura_$anno (
                id INT UNSIGNED PRIMARY KEY NOT NULL,
                data_doc DATE NOT NULL,
                pagamento VARCHAR(200) NOT NULL,
                cliente VARCHAR(200) NOT NULL,
                Piva VARCHAR(200) NULL,
                cf VARCHAR(200) NULL,
                indirizzo VARCHAR(200) NOT NULL,
                citta VARCHAR(200) NOT NULL,
                prov VARCHAR(5) NOT NULL,
                cap VARCHAR(10) NOT NULL,
                arr_qta LONGTEXT NOT NULL,
                arr_beni LONGTEXT NOT NULL,
                arr_misure LONGTEXT NULL,
                arr_imp_uni LONGTEXT NOT NULL,
                arr_importo LONGTEXT NOT NULL,
                tot_parziale FLOAT(10,2) NOT NULL,
                iva INT NOT NULL,
                tot_dovuto FLOAT(10,2) NOT NULL,
                esente_num INT NULL,
                esente_dal DATE DEFAULT NULL,
                esente_al DATE DEFAULT NULL
                ) DEFAULT CHARACTER SET utf8";

                if (mysqli_query($conndb, $sql_fdb)) {
                    echo "Tabella db fatture creata con successo <br/>";
                    header('Refresh: 3; URL = anno_fiscale.php');
                } else {
                    echo "C'e' stato un errore creando la tabella db fatture: " . mysqli_error($conndb) . "<br/>";
                }

                // creo tabella db ddt
                $sql_ddb = "CREATE TABLE IF NOT EXISTS stampa_ddt_$anno (
                id INT UNSIGNED PRIMARY KEY NOT NULL,
                data_doc DATE NOT NULL,
                mezzo VARCHAR(200) NOT NULL,
                cliente VARCHAR(200) NOT NULL,
                Piva VARCHAR(200) NULL,
                cf VARCHAR(200) NULL,
                indirizzo VARCHAR(200) NOT NULL,
                citta VARCHAR(200) NOT NULL,
                prov VARCHAR(5) NOT NULL,
                cap VARCHAR(10) NOT NULL,
                causale VARCHAR(200) NOT NULL,
                imballo VARCHAR(200) NOT NULL,
                n_colli INT NULL,
                peso INT NULL,
                data_rit DATE NOT NULL,
                arr_qta LONGTEXT NOT NULL,
                arr_beni LONGTEXT NOT NULL,
                arr_misure LONGTEXT NULL,
                arr_imp_uni LONGTEXT NOT NULL,
                vettore VARCHAR(200) NULL,
                note VARCHAR(255) NULL
                ) DEFAULT CHARACTER SET utf8";

                if (mysqli_query($conndb, $sql_ddb)) {
                    echo "Tabella db DdT creata con successo <br/>";
                    header('Refresh: 3; URL = anno_fiscale.php');
                } else {
                    echo "C'e' stato un errore creando la tabella db DdT: " . mysqli_error($conndb) . "<br/>";
                }

                // creo tabella db preventivo
                $sql_pdb = "CREATE TABLE IF NOT EXISTS stampa_preventivo_$anno (
                id INT UNSIGNED PRIMARY KEY NOT NULL,
                data_doc DATE NOT NULL,
                pagamento VARCHAR(200) NOT NULL,
                cliente VARCHAR(200) NOT NULL,
                Piva VARCHAR(200) NULL,
                cf VARCHAR(200) NULL,
                indirizzo VARCHAR(200) NOT NULL,
                citta VARCHAR(200) NOT NULL,
                prov VARCHAR(5) NOT NULL,
                cap VARCHAR(10) NOT NULL,
                arr_qta LONGTEXT NOT NULL,
                arr_beni LONGTEXT NOT NULL,
                arr_misure LONGTEXT NULL,
                arr_imp_uni LONGTEXT NOT NULL,
                arr_importo LONGTEXT NOT NULL,
                tot_parziale FLOAT(10,2) NOT NULL,
                iva INT NOT NULL,
                tot_dovuto FLOAT(10,2) NOT NULL
                ) DEFAULT CHARACTER SET utf8";

                if (mysqli_query($conndb, $sql_pdb)) {
                    echo "Tabella db preventivo creata con successo <br/>";
                    header('Refresh: 3; URL = anno_fiscale.php');
                } else {
                    echo "C'e' stato un errore creando la tabella db preventivo: " . mysqli_error($conndb) . "<br/>";
                }

                // creo tabella db ndc
                $sql_ndb = "CREATE TABLE IF NOT EXISTS stampa_ndc_$anno (
                id INT UNSIGNED PRIMARY KEY NOT NULL,
                data_doc DATE NOT NULL,
                pagamento VARCHAR(200) NOT NULL,
                cliente VARCHAR(200) NOT NULL,
                Piva VARCHAR(200) NULL,
                cf VARCHAR(200) NULL,
                indirizzo VARCHAR(200) NOT NULL,
                citta VARCHAR(200) NOT NULL,
                prov VARCHAR(5) NOT NULL,
                cap VARCHAR(10) NOT NULL,
                arr_qta LONGTEXT NOT NULL,
                arr_beni LONGTEXT NOT NULL,
                arr_misure LONGTEXT NULL,
                arr_imp_uni LONGTEXT NOT NULL,
                arr_importo LONGTEXT NOT NULL,
                tot_parziale FLOAT(10,2) NOT NULL,
                iva INT NOT NULL,
                tot_dovuto FLOAT(10,2) NOT NULL,
                esente_num INT NULL,
                esente_dal DATE DEFAULT NULL,
                esente_al DATE DEFAULT NULL
                ) DEFAULT CHARACTER SET utf8";

                if (mysqli_query($conndb, $sql_ndb)) {
                    echo "Tabella db NdC creata con successo <br/>";
                    header('Refresh: 3; URL = anno_fiscale.php');
                } else {
                    echo "C'e' stato un errore creando la tabella db NdC: " . mysqli_error($conndb) . "<br/>";
                }
        break;
    default:
        echo 'Il DB è pronto per essere utilizzato durante questo anno fiscale';
} //fine switch


?>

<br/><br/>
<form action="anno_fiscale.php" method="get">
    <select name="data">
        <option>2015</option>
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
        <option>2019</option>
        <option>2020</option>
    </select>
    <input type="submit" value="Seleziona">
</form>

<!--    <br/><br/>
    <form action="query2.php" method="POST">
        <div>
            <label>Query rapida</label>
            <div>
                <textarea cols="100" name="query" placeholder="Esempio: CREATE, DROP, INSERT INTO, TRUNCATE. Usa /**/ per separare più query."></textarea>
                <br/><input type="submit" value="Invia">
            </div>
        </div>
    </form>-->

<?php
$scelta = $_GET['data'];
echo '<br/><br/>anno scelto: '.$scelta;

$query = "SELECT stampa_fattura_$scelta.*, codC, nomeC, cognomeC
              FROM stampa_fattura_$scelta
              LEFT JOIN clienti ON stampa_fattura_$scelta.Piva=clienti.PIVAC OR stampa_fattura_$scelta.Piva=CFC
              ORDER BY stampa_fattura_$scelta.id DESC";

$result = $conndb->query($query);

$newKey = array();
$lun_array = mysqli_num_rows($result);
echo '<br/><br/>Totale voci: ' . $lun_array;
?>

<table>
        <thead>
        <tr>
            <th>Fattura n°</th>
            <th>Codice Cliente</th>
            <th>Cliente</th>
            <th>Data</th>
            <th>Pagamento</th>
            <th>Totale</th>
        </tr>
        </thead>
        <tbody>
            <?php
            while ($fattura = $result->fetch_object()) {
                echo "
                <tr>
                <td>".$fattura->id."</td>
                <td>".$fattura->codC."</td>
                <td>".$fattura->nomeC." ".$fattura->cognomeC."</td>
                <td>".$fattura->data_doc."</td>
                <td>".$fattura->pagamento."</td>
                <td>".$fattura->tot_dovuto."€</td>";
            }
            ?>
        </tbody>

</table>

