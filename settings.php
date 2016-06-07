<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
    <meta charset="utf-8">
    <title>Settaggi liste</title>
    <meta name="description" content="Gestionale per etichettificio Provenzano"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php") // Carica gli stili del tema in uso ?>

    <?php include("function/session.php"); ?>
    <style>
        label {
            color: #FFF;
        }
    </style>
</head>
<body>
<!-- #### Navbars #### -->
<?php include_once("template/parrot/navbar.php") ?>

<?php

include("./DB/config.php");

if(isset($_POST["fatt"])) {
    $fatt = mysqli_real_escape_string($conndb,$_POST['fatt']);
    $ndc = mysqli_real_escape_string($conndb,$_POST['ndc']);
    $ddt = mysqli_real_escape_string($conndb,$_POST['ddt']);
    $prev = mysqli_real_escape_string($conndb,$_POST['prev']);
    $listini = mysqli_real_escape_string($conndb,$_POST['listini']);
    $clienti = mysqli_real_escape_string($conndb,$_POST['clienti']);
    $fornitori = mysqli_real_escape_string($conndb,$_POST['fornitori']);
    $config = mysqli_real_escape_string($conndb,$_POST['config']);

    if ($config === "false") {
        $query = "  INSERT INTO settings (max_fatt,max_ndc,max_ddt,max_prev, max_listini, max_clienti, max_fornitori, id_user)
                    VALUES ($fatt, $ndc, $ddt, $prev, $listini, $clienti, $fornitori, $userID)";
        $msg = "inseriti";
    }

    if ($config === "true") {
        $query = "  UPDATE settings
                    SET max_fatt=".$fatt.", max_ndc=".$ndc.",max_ddt=".$ddt.", max_prev=".$prev.",max_listini=".$listini.", max_clienti=".$clienti.", max_fornitori=".$fornitori."
                    WHERE id_user = ".$userID;
        $msg = "aggiornati";
    }
    /* check connection */
    if ($result = $conndb->query($query)) {
        $success = "Record ".$msg." con successo";
    }
    if ($conndb->connect_errno) {
        printf("Connect failed: %s\n", $conndb->connect_error);
    }
}


$query = "SELECT * FROM settings WHERE id_user LIKE ".$userID;


/* check connection */
if ($result = $conndb->query($query)) {
    $row = $result->fetch_object();
    if ($result->num_rows === 0) {
        $norows = "Non è presente alcuna configurazione";
        $config = "false";
    }

    else {
        $config = "true";
    }

}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);
}

?>

<div class="container">
    <?php if(isset($norows)) : ?>

    <div class="alert alert-warning" role="alert">
        <?php echo $norows ?>
    </div>

    <?php endif; ?>

    <?php if(isset($success)) : ?>

    <div class="alert alert-success" role="alert">
        <?php echo $success ?>
    </div>

    <?php endif; ?>
    <h2 style="color: #FFF" >Record visualizzabili</h2>
    <form class="form-horizontal" method="post" action="#">
        <div class="form-group">
            <label class="col-sm-2 control-label">Lista fatture</label>
            <div class="col-sm-10">
                <select name="fatt" class="form-control" value="<?php echo @$row->max_fatt ?>">
                    <option value="10">10</option>
                    <option value="20" selected="selected">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Lista NDC</label>
            <div class="col-sm-10">
                <select name="ndc" class="form-control" value="<?php echo @$row->max_ndc ?>">
                    <option value="10">10</option>
                    <option value="20" selected="selected">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Lista DDT</label>
            <div class="col-sm-10">
                <select name="ddt" class="form-control" value="<?php echo @$row->max_ddt ?>">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30" selected="selected">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Lista preventivi</label>
            <div class="col-sm-10">
                <select name="prev" class="form-control" value="<?php echo @$row->max_prev ?>">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30" selected="selected">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Lista listini</label>
            <div class="col-sm-10">
                <select name="listini" class="form-control" value="<?php echo @$row->max_listini ?>">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50" selected="selected">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Lista clienti</label>
            <div class="col-sm-10">
                <select name="clienti" class="form-control" value="<?php echo @$row->max_clienti ?>">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30" selected="selected">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Lista fornitori</label>
            <div class="col-sm-10">
                <select name="fornitori" class="form-control" value="<?php echo @$row->max_fornitori ?>">
                    <option value="10">10</option>
                    <option value="20" selected="selected">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <input type="hidden" name="config" value="<?php echo $config ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Conferma</button>
            </div>
        </div>
    </form>
    <div class="alert alert-info" role="alert">
        <span><b>Nota bene:</b><br>
        Impostare un numero alto potrebbe incidere negativamente sulle prestazioni del server</span>
    </div>
</div>

<?php include_once("template/parrot/foot.php") ?>

</body>
</html>
