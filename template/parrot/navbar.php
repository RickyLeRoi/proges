<div class="componant-section" id="navbars">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="http://<?php echo $base_url ?>/images/logos.png" alt="" width="127">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2"><span class="fa fa-bars"></span></button>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li id="home"><a href="http://<?php echo $base_url ?>/home.php">Home</a></li>
                    <li class="agg_cliente lista_clienti dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clienti <span class="fa-chevron-down fa"></span></a>
                    <ul class="dropdown-menu">
                        <div class="arrow top"></div>
                        <li id="agg_cliente"><a href="http://<?php echo $base_url ?>/function/agg_cliente.php">Aggiungi nuovo...</a></li>
                        <li id="lista_clienti"><a href="http://<?php echo $base_url ?>/lista_clienti.php">Lista</a></li>
                    </ul>
                    </li>
                    <li class="agg_fornitore lista_fornitori dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fornitori <span class="fa-chevron-down fa"></span></a>
                        <ul class="dropdown-menu">
                            <div class="arrow top"></div>
                            <li id="agg_fornitore"><a href="http://<?php echo $base_url ?>/function/agg_fornitore.php">Aggiungi nuovo...</a></li>
                            <li id="lista_fornitori"><a href="http://<?php echo $base_url ?>/lista_fornitori.php">Lista</a></li>
                        </ul>
                    </li>
                    <li id="fatture"><a href="http://<?php echo $base_url ?>/fatture.php">Fatture</a></li>
                    <li id="ddt"><a href="http://<?php echo $base_url ?>/ddt.php">DDT</a></li>
                    <li id="preventivi"><a href="http://<?php echo $base_url ?>/preventivi.php">Preventivi</a></li>
                    <li id="ndc"><a href="http://<?php echo $base_url ?>/ndc.php">NDC</a></li>
                    <li id="listini"><a href="http://<?php echo $base_url ?>/listini.php">Listini</a></li>
                    <li class="ck_login ck_causale ck_mezzo ck_iva ck_imb ck_art ck_spagg ck_pagam dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Controllo <span class="fa-chevron-down fa"></span></a>
                        <ul class="dropdown-menu">
                            <div class="arrow top"></div>
<?php
include("DB/config.php");
$query = ("SELECT * FROM login WHERE userLOG='$user' AND tipoLOG='Tecnico'");
$result = mysqli_query($conndb, $query);
if(mysqli_num_rows($result)==1)
    {
    echo ("<li id=\"ck_causale\"><a href=\"http://$base_url/check/ck_login.php\">Login</a></li>");
    }else{
    echo '';
    }
?>
                            <li id="ck_causale"><a href="http://<?php echo $base_url ?>/check/ck_causale.php">Causale</a></li>
                            <li id="ck_mezzo"><a href="http://<?php echo $base_url ?>/check/ck_mezzo.php">Mezzo Trasporto</a></li>
                            <li id="ck_iva"><a href="http://<?php echo $base_url ?>/check/ck_iva.php">IVA</a></li>
                            <li id="ck_imb"><a href="http://<?php echo $base_url ?>/check/ck_imb.php">Imballo</a></li>
                            <li id="ck_art"><a href="http://<?php echo $base_url ?>/check/ck_art.php">Articoli</a></li>
                            <li id="ck_spagg"><a href="http://<?php echo $base_url ?>/check/ck_spagg.php">Spese Aggiuntive</a></li>
                            <li id="ck_pagam"><a href="http://<?php echo $base_url ?>/check/ck_pagam.php">Pagamento</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-icons">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa-user fa"></span>
                            <span class="hidden-lg"><?php echo $user; ?></span> <span class="fa-chevron-down fa"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="arrow top"></div>
                            <li id="settings"><a href="http://<?php echo $base_url ?>/settings.php"><span class="fa-cog fa"></span> Impostazioni</a></li>
<?php
include("DB/config.php");
$query = ("SELECT * FROM login WHERE userLOG='$user' AND tipoLOG='Tecnico'");
$result = mysqli_query($conndb, $query);
if(mysqli_num_rows($result)==1)
    {
    echo ("<li id=\"homeDB\"><a href=\"http://$base_url/DB/homeDB.php\"><span class=\"fa-cog fa\"></span> Avanzate DB</a></li>");
    }else{
    echo '';
    }
?>
                            <li id="logout"><li><a href="http://<?php echo $base_url ?>/function/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
