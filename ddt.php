<?php
include_once("function/session.php");
include("DB/config.php");

$query = "SELECT ddt.*, numerazione_ddt.*, clienti.nomeC, clienti.cognomeC, clienti.codC
                FROM ddt
                  INNER JOIN numerazione_ddt
                    ON ddt.id=numerazione_ddt.id
                  LEFT JOIN clienti
                    ON numerazione_ddt.dest=clienti.id";

/* check connection */
if ($result = $conndb->query($query)) {
    if ($debug === true) printf("<!-- Select returned %d rows.\n -->", $result->num_rows);
    $oggett_ddt = 1;
    if ($result->num_rows === 0) {
        $norows = "Non è presente alcun record";
    }

}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);
    $oggett_ddt = 0;
    exit();
}

$queryb = "SELECT num
                FROM numerazione_ddt";

/* check connection */
if ($resultb = $conndb->query($queryb)) {
    if ($debug === true) printf("<!-- Select returned %d rows.\n -->", $resultb->num_rows);
    $oggetto_ddt = 1;
    if ($resultb->num_rows === 0) {
        $numerazione_ddt = 1;
    }
    if ($resultb->num_rows > 0) {
        $last_row = $resultb->fetch_object();
        $numerazione_ddt = $last_row->num + 1;
    }


}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);
    $numerazione_fatt = "Errore";
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
    <meta charset="utf-8">
    <title>DocumentiDiTrasporto - Gestionale Provenzano</title>
    <meta name="description" content="Gestionale per etichettificio Provenzano"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php") // Carica gli stili del tema in uso ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <?php include_once("function/session.php") ?>

    <style>
        .autocomplete-suggestions {color: #000000}
        .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
        .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
        .autocomplete-selected { background: #F0F0F0; }
        .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
        .autocomplete-group { padding: 2px 5px; }
        .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
    </style>

</head>

<body>
<!-- #### Navbars #### -->
<?php include_once("template/parrot/navbar.php") ?>

    <div class="masthead">
        <div class="masthead-title">
            <div class="container">
                Genera DDT
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="post" action="gen_documenti/ddt.php">
                <input type="hidden" value="<?php echo $numerazione_ddt ?>">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Genera</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="masthead">
        <div class="masthead-title">
            <div class="container">
                Lista DDT
            </div>
        </div>
    </div>

<div class="container">
    <span style="color:#EA640C">
    Totale voci n.
    <?php
    $sql_rows = "SELECT * FROM numerazione_ddt";
    echo mysqli_num_rows(mysqli_query($conndb, $sql_rows));
    ?>
    </span>
</div>

<div class="container">
    <table class="table table-responsive">
        <tr>
            <th>DDT n°</th>
            <th>Codice Cliente</th>
            <th>Cliente</th>
            <th>Note</th>
            <th>Data</th>
        </tr>
        <tr>
        <?php
            if (isset($norows)) : ?>
        <tr>
            <td colspan="8"><?php echo $norows ?></td>
        </tr>
        <?php

        endif; // Se non restituisce alcuna riga
            if ($oggett_ddt === 1) :
            while ($oggett_ddt = $result->fetch_object()) :
            //print_r($oggett_ddt);
            ?>
        <tr>
            <td><?php echo $oggett_ddt->num ?></td>
            <td><?php echo $oggett_ddt->codC ?></td>
            <td><?php echo $oggett_ddt->nomeC." ".$oggett_ddt->nomeC ?></td>
            <td><?php echo $oggett_ddt->note ?></td>
            <td><?php echo $oggett_ddt->reg_date ?></td>

        </tr>


        <?php
        endwhile;
        endif;
        ?>

    </table>
</div>
<?php $result->close(); ?>
<?php include_once("template/parrot/foot.php") ?>

<script>
    $('.idCliente').devbridgeAutocomplete({
        dataType: "json",
        paramName: "check",
        serviceUrl: 'get_clienti.php',
        formatResult: function(suggestion, currentValue){
            return suggestion.value + ' - ' +suggestion.data.cognome+' '+suggestion.data.nome;
        },
        onSelect: function (suggestion) {
            $("#idCliente")
                .val(suggestion.value);
            $("#nomeCognome").val(suggestion.data.nome + " " + suggestion.data.cognome);
        }
    });
</script>

    <?php include_once("template/parrot/foot.php") ?>

</body>
</html>
