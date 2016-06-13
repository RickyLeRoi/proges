<?php
   include("../DB/config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

       // tipo, username e password da form
      $tipoFORM = mysqli_real_escape_string($conndb,$_POST['tipoFORM']);
      $userFORM = mysqli_real_escape_string($conndb,$_POST['userFORM']);
      $pswdFORM = mysqli_real_escape_string($conndb,$_POST['pswdFORM']);

      $sql = "SELECT id FROM users WHERE tipoLOG = '$tipoFORM' AND userLOG = '$userFORM' AND pswdLOG = '$pswdFORM'";
      $ris = mysqli_query($conndb,$sql);
       $row = mysqli_fetch_assoc($ris);

      $rec = mysqli_fetch_array($ris,MYSQLI_ASSOC);
      $active = @$rec['active'];

      $count = mysqli_num_rows($ris);

      // se l'utente esiste, $count deve essere uguale a 1
      if($count == 1) {
        $_SESSION['login_user'] = $userFORM;
        $_SESSION['id_user'] = $row["id"];
         header('Refresh: 3; URL= ../home.php');
          $ck = "
          <div class=\"alert alert-success alert-dismissable\">
          Login eseguito con <strong>successo.</strong>
          </div>
          ";
      } else {
          $ck = "
         <div class=\"alert alert-danger alert-dismissable\">
         Login <strong>errato.</strong> Riprova!
         </div>
         ";
      }
   }

?>
<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
	<meta charset="utf-8">
	<title>Gestionale Provenzano</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<?php include_once("./../template/parrot/style.php"); // Carica gli stili del tema in uso ?>

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
    </style>

</head>
<body data-spy="scroll" data-target="#sidenav" data-offset="100">



                <div class="container">
                    <figure class="theLogo" style="padding-bottom: 1em;">
                        <img src="../images/logob.png" width="80%" alt="">
                    </figure>
                    <span style="font-size: 1.5em;">
                        GESTIONALE & FATTURAZIONE
                    </span>
                    <br/>
                    <br/>
                </div>

        <!-- #### Tiles #### -->
				<div class="componant-section">
                    <div class="container login_">
					 <form method="POST">
                            <div class="login_form">
                                 <div class="tile tile-login">
                                     <img class="logo" src="../images/logos.png" alt="" width="127">
                                        <select name="tipoFORM" class="form-control">
                                            <option value="Titolare">Titolare</option>
                                            <option value="Operatore" selected>Operatore</option>
                                            <option value="Tecnico">Tecnico</option>
                                        </select>
                                     <div class="input-icon">
                                        <span class="fa-user fa"></span>
                                        <input type="text" name="userFORM" class="form-control" placeholder="Username">
                                     </div>
                                     <div class="input-icon">
                                         <span class="fa-lock fa"></span>
                                         <input type="password" name="pswdFORM" class="form-control" placeholder="Password">
                                     </div>
                                     <input class="btn btn-block btn-primary btn-embossed" type="submit" value="Login"><br>
                                     <?php echo @$ck; ?>
                                 </div>

                             <div class="clearfix"></div>
                    </form>
                    </div>
                </div>
                </div>
	</body>
</html>
