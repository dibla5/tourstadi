<?php
    session_start();
    require_once('connessione.php');

    $viaggio = false;

    if(isset($_GET['id'])) {
        $idTour = $_GET['id'];
    }
    if(isset($_GET['user'])) {
        $user = $_GET['user'];
    }

    if(isset($_GET['id']) && isset($_GET['viaggiInCorso'])){
        $viaggio = true;
    }

    if(isset($_POST['confermaPrenotazione'])){
        $user = $_SESSION['user'];
        $sql = "INSERT INTO ordine(dataInizio,cittaPartenza,utente,tour) VALUES ('".date("Y/m/d")."','Genova','$user','$idTour')";
        $risultato = $conn -> query($sql);
        header("Location: ../index.php");
    }
?>  

<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    
    <meta charset="utf-8">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Stour - Un tour calcistico</title>
    <link rel="icon" href="../img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../css/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../css/css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../css/css/flaticon.css">
    <link rel="stylesheet" href="../css/css/themify-icons.css">
    <link rel="stylesheet" href="../css/css/nice-select.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../css/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu" style="background-color: black">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light" style="list-style: none" >
                            <a class="navbar-brand" href="../index.php"> <img src="../img/favicon.png" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="menu_icon"><i class="fas fa-bars"></i></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../index.php">Home</a>
                                    </li>
                                    <?php
                                            if(!empty($_SESSION['user'])){
                                                echo'<li class="nav-item">
                                                    <a class="nav-link" href=" creazioneTourUtente.php">Crea il tuo tour</a>
                                                </li>';
                                            }
                                    ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href=" blog.html" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tour
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href=" tour.php?user=admin">Predefiniti</a>
                                            <a class="dropdown-item" href=" tour.php?user=notadmin">Creati da altri utenti</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=" stadiTutti.php">Stadi presenti</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=" contact.php">Contatti</a>
                                    </li>
                                    
                                </ul>
                            </div>    
                            
                                        <?php
                                            if(!empty($_SESSION['user'])){
                                                if($_SESSION['user'] == "admin"){
                                                    echo '          
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                                            <img src="../img/profilo.png" alt="Profilo" style="border-radius: 50%; " width="50" height="50">                                   
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                                            <p class="dropdown-item">Benvenuto '.$_SESSION['user'].'</p>
                                                            <a class="dropdown-item" style="color:red" id="pannelloDiControlloTasto" href="../admin/admin.php">Pannello di controllo</a>  
                                                            <a class="dropdown-item" id="logoutTasto" href=" logout.php">Esci</a>  
                                                        </div>
                                                    </li>                    
                                                    ';
                                                } 
                                                else{
                                                    echo '
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img src="../img/profilo.png" alt="Profilo" style="border-radius: 50%;" width="50" height="50">                                   
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                                            <p class="dropdown-item">Benvenuto '.$_SESSION['user'].'</p>
                                                            <a class="dropdown-item" id="tourEffettuati" href=" tourEffettuati.php">Tour effettuati</a>
                                                            <a class="dropdown-item" id="logoutTasto" href=" logout.php">Esci</a>  
                                                        </div>
                                                    </li>                                                                       
                                                    '; 
                                                }
                                            }
                                            else{
                                                echo' 
                            <a class="btn_1 d-none d-lg-block" href=" login.php">Login</a>
                                                ';
                                            }
                                        ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    <!-- Header part end-->

	<!-- breadcrumb start-->
	<section class="breadcrumb breadcrumb_bg" style="text-align: left;background: url(../img/sfondo.png) no-repeat center center/cover;" >
		<div class="container" style="text-align: left">
			<div class="row" style="text-align: left">
				<div class="col-lg-12">
					<div class="breadcrumb_iner text-center" style="text-align: left">
						<div class="breadcrumb_iner_item" style="text-align: left">
							<h2>Tour</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- breadcrumb start-->

    <!-- pricing part start-->
    <?php
        if(isset($_GET['id'])){
            echo'
                <section class="tour_package padding_top single_pack">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6 ">
                                <div class="tour_package_cotent owl-carousel">';
                                    $query = "SELECT stadio FROM TourHaStadio WHERE tour= $idTour";
                                    $risultato = $conn -> query($query);
                                    if($risultato -> num_rows > 0){
                                        while($row = $risultato -> fetch_assoc()){
                                            $idStadio = $row['stadio'];

                                            $query2 = "SELECT * FROM stadio WHERE id = $idStadio";
                                            $risultato2 = $conn -> query($query2);
                                            if($risultato2 -> num_rows > 0){
                                                while($row = $risultato2 -> fetch_assoc()){
                                                    
                                                echo' 
                                                    <div class="single_tour_package">
                                                        <img src="../'.$row['img'].'" alt="">
                                                        <div class="tour_pack_content">
                                                            <h4>'.$row['nome'].'</h4>
                                                            <p> '.$row['preview'].'</p>
                                                            <div class="tour_content_rating">
                                                                <ul>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                </ul>
                                                                <a href="stadio.php?id='.$row['id'].'" class="btn1">Scopri di più</a>';
                                                                if($viaggio){
                                                                    $utente = $_SESSION['user'];
                                                                    $query3 = "SELECT * FROM utenteVisitaStadio WHERE utente = '$utente' AND stadio = $idStadio";
                                                                    $risultato3 = $conn -> query($query3);
                                                                    if($risultato3 -> num_rows > 0){
                                                                        echo'<i class="fa fa-check" aria-hidden="true" style="color: green"></i>';
                                                                    }
                                                                    else{
                                                                        echo'<i class="fa fa-times" aria-hidden="true" style="color:red"></i>';
                                                                    }
                                                                }
                                                                echo'

                                                            </div>
                                                        </div>
                                                    </div>';
                                                }
                                            }
                                            
                                        }
                                    }
                                    echo'
                                </div>
                            </div>';
                                $query2 = "SELECT * FROM Tour WHERE id = $idTour ";
                                $risultato2 = $conn -> query($query2);
                                if($risultato2 -> num_rows > 0){
                                    while($row = $risultato2 -> fetch_assoc()){
                                    echo '
                                        <div class="col-lg-5 col-xl-3 offset-lg-1 col-sm-6">
                                            <div class="tour_pack_content">
                                                <img src="img/section_tittle_img.png" alt="">
                                                <h2>Elenco di tutti gli stadi presenti nel tour  "'.$row['nome'].'"</h2>
                                                <p>Questi sono tutti gli stadi presenti nei nostri tour: per avere informazioni aggiuntive schiacciare "Scopri di più" sulla scheda dello stadio</p>
                                            </div>
                                        </div>';
                                        if(!empty($_SESSION['user']) && !$viaggio){
                                            echo'
                                            </br>
                                            </br>
                                            </br>
                                            <div style="width: 100%; text-align: center">
                                                <form method="post" action="">
                                                    <input type="submit" name="confermaPrenotazione" value="Prenota" style="width:100px;height:35px;border-radius:5px;margin-bottom:10px;background-image: linear-gradient(to bottom right, #000, #FFCB00);color: white">
                                                </form>   
                                            </div>';
                                        }
                                    }
                                }
                                echo'
                        </div>
                    </div>
                </section>';
        }
        else if(isset($_GET['user'])){
            if($user == 'notadmin'){
                echo'
                <section class="tour_package padding_top single_pack">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6 ">
                                <div class="tour_package_cotent owl-carousel">';
                    $query = "SELECT * FROM Tour WHERE utente != 'admin'";
                    $risultato = $conn -> query($query);
                    if($risultato -> num_rows > 0){ 
                        while($row = $risultato -> fetch_assoc()){
                            $idTour = $row['id'];
                            echo'
                                            <div class="single_tour_package">
                                                    <img src="../img/stadio.png" alt="">
                                                    <div class="tour_pack_content">
                                                        <h4>'.$row['nome'].'</h4>
                                                        <p>Stadi presenti: ';

                            $query2 = "SELECT stadio FROM TourHaStadio WHERE tour= $idTour";
                            $risultato2 = $conn -> query($query2);
                            if($risultato2 -> num_rows > 0){
                                while($row = $risultato2 -> fetch_assoc()){
                                    $idStadio = $row['stadio'];

                                    $query3 = "SELECT * FROM stadio WHERE id = $idStadio";
                                    $risultato3 = $conn -> query($query3);
                                    if($risultato3 -> num_rows > 0){
                                        while($row = $risultato3 -> fetch_assoc()){
                                            echo''.$row['nome'].',';
                                        }
                                    }
                                }
                            }
                                                        echo '</p>
                                                        <div class="tour_content_rating">';
                                                            $query6 = "SELECT * FROM Tour WHERE id = $idTour ";
                                                            $risultato6= $conn -> query($query6);
                                                            if($risultato6 -> num_rows > 0){
                                                                while($row = $risultato6 -> fetch_assoc()){
                                                                        echo'    
                                                                        <a href="tour.php?id='.$row['id'].'" class="btn1">Scopri di più</a>
                                                        </div>
                                                    </div>
                                                </div>';
                                                                }
                                                            }
                                        
                        }
                    }
                    echo'
                    </div>
                    </div>';
                    
                    $query5 = "SELECT * FROM Tour WHERE id = $idTour ";
                    $risultato5= $conn -> query($query5);
                    if($risultato5 -> num_rows > 0){
                        while($row = $risultato5 -> fetch_assoc()){
                        echo '
                                        <div class="col-lg-5 col-xl-3 offset-lg-1 col-sm-6">
                                            <div class="tour_pack_content">
                                                <h2>Elenco di tutti i tuoi creati dagli utenti</h2>
                                                <p>Questi sono tutti i tour creati dagli utenti: per avere informazioni aggiuntive schiacciare "Scopri di più" sulla scheda del tour</p>
                                            </div>
                                        </div>';
                            }
                        }
                                            echo'
                                    </div>
                                </div>
                            </section>';
            }
            
            else{
                echo'
                <section class="tour_package padding_top single_pack">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6 ">
                                <div class="tour_package_cotent owl-carousel">';
                    $query11 = "SELECT * FROM Tour WHERE utente = 'admin'";
                    $risultato11 = $conn -> query($query11);
                    if($risultato11 -> num_rows > 0){ 
                        while($row = $risultato11 -> fetch_assoc()){
                            $idTour = $row['id'];
                            echo'
                                            <div class="single_tour_package">
                                                    <img src="../img/stadio.png" alt="">
                                                    <div class="tour_pack_content">
                                                        <h4>'.$row['nome'].'</h4>
                                                        <p>Stadi presenti: ';

                            $query12 = "SELECT stadio FROM TourHaStadio WHERE tour= $idTour";
                            $risultato12 = $conn -> query($query12);
                            if($risultato12 -> num_rows > 0){
                                while($row = $risultato12 -> fetch_assoc()){
                                    $idStadio = $row['stadio'];

                                    $query13 = "SELECT * FROM stadio WHERE id = $idStadio";
                                    $risultato13 = $conn -> query($query13);
                                    if($risultato13 -> num_rows > 0){
                                        while($row = $risultato13 -> fetch_assoc()){
                                            echo''.$row['nome'].',';
                                        }
                                    }
                                }
                            }
                                                        echo '</p>
                                                        <div class="tour_content_rating">';
                                                            $query16 = "SELECT * FROM Tour WHERE id = $idTour ";
                                                            $risultato16= $conn -> query($query16);
                                                            if($risultato16 -> num_rows > 0){
                                                                while($row = $risultato16 -> fetch_assoc()){
                                                                        echo'    
                                                                        <a href="tour.php?id='.$row['id'].'" class="btn1">Scopri di più</a>
                                                        </div>
                                                    </div>
                                                </div>';
                                                                }
                                                            }
                                        
                        }
                    }
                    echo'
                    </div>
                    </div>';
                    
                    $query15 = "SELECT * FROM Tour WHERE id = $idTour ";
                    $risultato15= $conn -> query($query15);
                    if($risultato15 -> num_rows > 0){
                        while($row = $risultato15 -> fetch_assoc()){
                        echo '
                            <div class="col-lg-5 col-xl-3 offset-lg-1 col-sm-6">
                                <div class="tour_pack_content">
                                    <h2>Elenco di tutti i tour creati da noi</h2>
                                    <p>Questi sono tutti i tour creati da noi del team di Stour: per avere informazioni aggiuntive schiacciare "Scopri di più" sulla scheda del tour</p>
                                </div>
                            </div>';
                        }
                                            echo'
                                    </div>
                                </div>
                            </section>';
                    }
            }
        }
        ?>
        
    <footer class="footer_part">
            <div class="container">
                
                <hr>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tutti i diritti riservati | Realizzato da Tascio, Corne e Kingsupremobellissimissimo</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- jquery -->
    <script src="../js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="../js/jquery.magnific-popup.js"></script>
    <!-- particles js -->
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="../js/slick.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/contact.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <!-- custom js -->
    <script src="../js/custom.js"></script>
</body>

</html>


