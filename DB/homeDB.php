<?php include("./config.php"); ?>
<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
    <meta charset="utf-8">
    <title>Settaggi DB</title>
    <meta name="description" content="Gestionale per etichettificio Provenzano"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("../template/parrot/style.php"); ?>

    <style>
        label {
            color: #FFF;
        }
    </style>
</head>

<body>
<!-- #### Navbars #### -->
<?php
include_once("../template/parrot/navbar.php") ?>

<div class="container">
    <h2 style="color: #FFF" >Gestione DB</h2>
    <form class="form-horizontal" action="creadb.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Crea DB</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="host" placeholder="Server del database">
                <input class="form-control" type="text" name="userDB" placeholder="Username">
                <input class="form-control" type="password" name="pswdDB" placeholder="Password">
                <input class="form-control" type="text" name="database" placeholder="Nome del database locale">
                <input class="btn btn-default" type="submit" value="Crea DB">
            </div>
        </div>
    </form>

    <form class="form-horizontal" action="creatabelle.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Crea Tabelle</label>
            <div class="col-sm-10">
                <input class="btn btn-default" type="submit" value="Crea tabelle">
            </div>
        </div>
    </form>

    <form class="form-horizontal" action="droptabelle.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Drop Tabelle</label>
            <div class="col-sm-10">
                <input class="btn btn-default" type="submit" value="Cancella tabelle">
            </div>
        </div>
    </form>

    <form class="form-horizontal" action="dropDB.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Drop DB</label>
            <div class="col-sm-10">
                <input class="btn btn-default" type="submit" value="Cancella DB">
            </div>
        </div>
    </form>

    <!-- Tipo di codifica dei dati -->
    <form class="form-horizontal" enctype="multipart/form-data" action="file.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Invia backup</label>
            <div class="col-sm-10">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
                <input class="btn btn-default" id="bckp" name="bckp" type="file"/>
                <input class="btn btn-default" type="submit" value="Invia">
            </div>
        </div>
    </form>

    <!--
<form class="form-horizontal" enctype="multipart/form-data" action="file.php" method="POST">
    <div class="form-group">
        <label class="col-sm-2 control-label">Invia backup</label>
        <div class="col-sm-10">o scegli un file già esistente
            <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
            <select id="bckp2" name="bckp2">
                <?php
    /*          $dir = "backup/";
                $files = scandir($dir);
                for ($c=0; $c<count($files)-2; $c++) {
                    $d = $c+2;
                    echo "<option value=".$files[$d].">".$files[$d]."</option>";
                }
            */ ?>
            </select>
            <input class="btn btn-default" type="submit" value="Invia">
        </div>
    </div>
</form>-->


    <form class="form-horizontal" action="dumpDB.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Backup DB</label>
            <div class="col-sm-10">
                <input class="btn btn-default" type="submit" value="Backup">
            </div>
        </div>
    </form>

    <form class="form-horizontal" action="query.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Query rapida</label>
            <div class="col-sm-10">
                <textarea class="form-control" cols="100" name="query"
                          placeholder="Esempio: CREATE, DROP, INSERT INTO, TRUNCATE. Usa /**/ per separare più query."></textarea>
                <input class="btn btn-default" type="submit" value="Invia">
            </div>
        </div>
    </form>

    <form class="form-horizontal" action="creareclogin.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nuovo utente</label>
            <div class="col-sm-10">
                <select name="tipoFORM" class="form-control">
                    <option value="Titolare">Titolare</option>
                    <option value="Operatore">Operatore</option>
                    <option value="Tecnico" selected="selected">Tecnico</option>
                </select>
                <input class="form-control" type="text" name="userFORM" placeholder="Username">
                <input class="form-control" type="password" name="pswdFORM" placeholder="Password">
                <input class="btn btn-default" type="submit" value="Crea utente">
            </div>
        </div>
    </form>

</div>

<?php include_once("../template/parrot/foot.php") ?>

</body>
</html>
