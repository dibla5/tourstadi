<?php
    session_start();
    require_once('connessione.php');
    
	$accountT = TRUE;
    $passwordT = TRUE; 

    if(isset($_POST['login'])){
        if(empty($_POST['username']) || empty($_POST['pass'])){
            header("location: ../index.php");
        }
        else{
            $query = "SELECT * FROM Utente";
            $risultato = $conn -> query($query);
 

            if($risultato -> num_rows > 0){
                while($row = $risultato -> fetch_assoc()){
                    if($row['username'] == $_POST['username']){
                        if($row['psw'] == $_POST['pass']){

                            $_SESSION['user'] = $_POST['username'];
                            header("location: ../index.php");
                        }
                        else{
                            $passwordT = FALSE;
                        }
                    }
                    else{
                        $accountT = FALSE;
                    }
                }
            }
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
                <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="login.php">
                        <span class="login100-form-logo">
                            <img src="../img/favicon.png" alt="">
                        </span>

                        <span style="font-family: Kaushan Script, cursive;" class="login100-form-title p-b-34 p-t-27">
                            Accesso
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "E' richiesto un username valida">
                            <span class="symbol-input100" style="color: white">
                                <i class="fa fa-user" aria-hidden="true"> Username</i>
                            </span>
                            <input class="input100" type="text" name="username" placeholder="Username" required>
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
                            <button class="login100-form-btn" name="login">
                                Login
                            </button>
                        </div>
                        </br>
                        <div style="text-align: center;">
                            <a style="color: #FFCC00" href="registrati.php">Non sei registrato? Clicca qui</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="myModalRegS" class="modal fade">
			<div class="modal-dialog modal-confirm">
				<div class="modal-content">
					<div class="modal-header"  class="center" style="display: block; margin-left: auto; margin-right: auto;" >
						<div class="icon-box">
							<img src="../img/check.png" width="200px" height="200px"></img>
						</div>
                    </div>
                    <div class="modal-header" style="text-align: center">		
						<h4 style="color: #82ce34;" class="modal-title w-100">Registrazione eseguita</h4>	
                    </div>
					<div class="modal-body">
						<p style="color: black" class="text-center">La registrazione è avvenuta con successo.</p>
					</div>
					<div class="modal-footer">
						<a href="../index.php"><button class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
					</div>
				</div>
			</div>
		</div>
		
		<div id="myModalRegF" class="modal fade">
			<div class="modal-dialog modal-confirm">
				<div class="modal-content" >
					<div class="modal-header"  class="center" style="display: block; margin-left: auto; margin-right: auto;" >
						<div class="icon-box">
                            <img src="../img/x.png" width="200px" height="200px"></img>
						</div>	
                    </div>
                    <div class="modal-header" style="text-align: center">			
						<h4 style="color: red" class="modal-title w-100">Registrazione fallita</h4>	
					</div>
					<div class="modal-body">
						<p style="color: black" class="text-center">È successo qualcosa di strano. Riprova.</p>
					</div>
					<div class="modal-footer">
						<a href="../index.php"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
					</div>
				</div>
			</div>
		</div>

        <div id="myModalLogFU" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header"  class="center" style="display: block; margin-left: auto; margin-right: auto;" >
						<div class="icon-box">
                            <img src="../img/x.png" width="200px" height="200px"></img>
						</div>	
                    </div>		
                    <div class="modal-header">		
                        <h4 style="color: red;" class="modal-title w-100">Accesso fallito</h4>	
                    </div>
                    <div class="modal-body">
                        <p style="color: black" class="text-center">Non esiste nessun account con questo username.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="../index.php" style="width: 100%"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" style="color: red" data-dismiss="modal">OK</button></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="myModalLogFP" style="text-align: center" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header"  class="center" style="display: block; margin-left: auto; margin-right: auto;" >
						<div class="icon-box">
                            <img src="../img/x.png" width="200px" height="200px"></img>
						</div>	
                    </div>		
                    <div style="modal-header">		
                        <h4 style="color: red;" class="modal-title w-100">Accesso fallito</h4>	
                    </div>
                    <div class="modal-body">
                        <p style="color: black" class="text-center">La password inserita è errata.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="../index.php" style="width: 100%"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
                    </div>
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

<?php
    if(!$passwordT){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalLogFP").modal("show");
                });
            </script>';             
    }  
    else if(!$accountT){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalLogFU").modal("show");
                });
            </script>';             
    }
       
    
    if($_SESSION['registrazione']==2){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalRegF").modal("show");
                });
            </script>';             
    }  
    else if($_SESSION['registrazione']==1){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalRegS").modal("show");
                });
            </script>';             
    }
?>