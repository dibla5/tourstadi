<?php
	session_start();
    require_once('connessione.php');
 
	if(isset($_POST['registrati'])){
        
	    $_SESSION['registrazione'] = 0;
		$username = $_POST['username'];
		$nome = $_POST['nome'];
		$cognome = $_POST['cognome'];
		$nTelefono = $_POST['numTelefono'];
		$psw = $_POST['pass'];

		$sql = "INSERT into utente(username, nome, cognome, numTelefono, psw) VALUES('$username','$nome','$cognome',$nTelefono,'$psw')";
		
		if(mysqli_query($conn, $sql)){
			$_SESSION['registrazione'] = 1;
			header("location: login.php");
		}
		else{
			$_SESSION['registrazione'] = 2;
            header("location: login.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Stour - Un tour calcistico</title>
        <link rel="icon" href="../img/favicon.png">

        <!--===============================================================================================-->	
            <link rel="icon" type="image/png" href="../img/favicon.png"/>
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/login/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/login/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/login/vendor/animate/animate.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="../css/login/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/login/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/login/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="../css/login/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/login/css/util.css">
            <link rel="stylesheet" type="text/css" href="../css/login/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('../img/sansiro.gif');">
                <div class="wrap-login100" style="height: 886px;">
					<form class="login100-form validate-form" method="POST" action="registrati.php">
						<span class="login100-form-logo">
							<img src="../img/favicon.png" alt="">
						</span>

						<span style="font-family: Kaushan Script, cursive;" class="login100-form-title p-b-34 p-t-27">
							Registrazione
						</span>

						<div class="wrap-input100 validate-input" data-validate = "E' richiesto un username valida">
							<span class="symbol-input100" style="color: white">
								<i class="fa fa-user" aria-hidden="true"> Username</i>
							</span>
							<input class="input100" type="text" name="username" placeholder="Username" required>
							<span class="focus-input100"></span>
							
						</div>

						<div class="wrap-input100 validate-input" data-validate = "E' richiesto un nome valida">
							<span class="symbol-input100" style="color: white">
								<i class="fa fa-address-book" aria-hidden="true"> Nome</i>
							</span>
							<input class="input100" type="text" name="nome" placeholder="Nome" required>
							<span class="focus-input100"></span>
							
						</div>

						<div class="wrap-input100 validate-input" data-validate = "E' richiesto un cognome valida">
							<span class="symbol-input100" style="color: white"> 
								<i class="fa fa-address-book" aria-hidden="true"> Cognome</i>
							</span>
							<input class="input100" type="text" name="cognome" placeholder="Cognome" required>
							<span class="focus-input100"></span>
							
						</div>

						<div class="wrap-input100 validate-input" data-validate = "E' richiesto un numero di telefono valido">
							<span class="symbol-input100" style="color: white">
								<i class="fa fa-phone" aria-hidden="true"> Numero di telefono</i>
							</span>
							<input class="input100" type="number" name="numTelefono" placeholder="Numero di telefono" required>
							<span class="focus-input100"></span>
							
						</div>
						
						<div class="wrap-input100 validate-input" data-validate = "E' richiesta una password">
							<span class="symbol-input100" style="color: white">
								<i class="fa fa-lock" aria-hidden="true"> Password</i>
							</span>
							<input class="input100" type="password" name="pass" placeholder="Password" required>
							<span class="focus-input100"></span>
							
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" name="registrati">
								Registrati
							</button>
						</div>
						</br>
						<div style="text-align: center;">
							<a style="color: #FFCC00" href="login.php">Sei già registrato? Clicca qui</a>
						</div>
					</form>
				</div>
			</div>
		</div>
        
		

        <div id="dropDownSelect1"></div>
        
    <!--===============================================================================================-->
        <script src="../css/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="../css/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="../css/login/vendor/bootstrap/js/popper.js"></script>
        <script src="../css/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="../css/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="../css/login/vendor/daterangepicker/moment.min.js"></script>
        <script src="../css/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="../css/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="../css/login/js/main.js"></script>

        <script src="../js/custom.js"></script>
    </body>
</html>