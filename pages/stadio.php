 
<!-- Experience-->
<?php
    session_start();
    require_once('connessione.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if(isset($_GET['id']) && isset($_GET['visitato'])) {
        $id = $_GET['id'];
        $utente = $_SESSION['user'];

        $query="INSERT INTO UtenteVisitaStadio VALUES ('$utente',$id)";
        $result = $conn -> query($query);
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
            <div class="container" >
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
							<h2>Stadio</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
   <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area padding_top" style="text-align: center;">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list" style="width: 100%;margin: auto">
                <div class="single-post">
                    <?php
                        $query = "SELECT * FROM stadio WHERE id=($id)";
                        $risultato = $conn -> query($query);
                        if($risultato -> num_rows > 0){
                            while($row = $risultato -> fetch_assoc()){

                            echo' 
                  


                            <div class="feature-img">
                                <img class="img-fluid" src="../'.$row['img'].'" alt="foto stadio">
                            </div>
                            <div class="blog_details">
                                <h2>'.$row['nome'].'</h2>
                                 <p class="excert">'.$row['descrizione'].'</p>
                                 <div style="color: black" class="subheading mb-3">€'.$row['prezzo'].'</div>
                                 <div class="d-none d-sm-block mb-5 pb-4">
                                 '.$row['mappa'].'
                               </div>

                             </div>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="far fa-user"></i> Daniel Hymli Dawood Pesenti</a></li>
                                    <li><a href="#"><i class="far fa-comments"></i>';/*bisogna inserire il numero di voti [bisogna prima collegare le recensioni]*/' Voti</a></li>
                                </ul>
                               
                            </div>';
                            }
                        }
                    ?>
                  
                  
                </div>
                

                <div class="comments-area" style="width: 50%">
                    <h4>Commenti</h4>
                    <?php 
                        $query = "SELECT * FROM recensione WHERE stadio = '$id'";
                        $result = $conn->query($query);
                        if($result -> num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '                        
                                <div class="comment-list" >
                                    <div class="single-comment justify-content-between d-flex" style="text-align: center">
                                        <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/comment/comment_1.png" alt="">
                                        </div>
                                        <div class="desc" style=" overflow-wrap: break-word;text-align: center">
                                            <p class="comment">
                                            '.$row['commento'].'
                                            </p>
                                            <div class="">
                                                <div>
                                                    <h5>
                                                        <a href="#">'.$row['utente'].'</a>
                                                        <ul style="color: #fecc00">
                                                            <li>';
                                                                $nVoto=$row['voto'];
                                                                for(;$nVoto > 0;$nVoto--){
                                                                    echo'
                                                                    <i class="fas fa-star"></i>';
                                                                }
                                                                echo'
                                                            </li>
                                                        </ul>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }
                        else{
                            echo '                        
                                <div class="comment-list" >
                                    <div class="single-comment justify-content-between d-flex" style="text-align: center">
                                        <div class="user justify-content-between d-flex">
                                            <div class="desc" style=" overflow-wrap: break-word;text-align: center">
                                                <div class="">
                                                    <div>
                                                        <h5>Non ci sono recensioni per questo stadio.
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>
                </div>
                <?php
                    if(!empty($_SESSION["user"])){
                        echo'
                        <div class="comment-form" >
                            <h4>Lascia un messaggio</h4>
                            <form class="form-contact comment_form" action="stadioDB.php" method="POST" id="commentForm" >
                                <input class="form-control" name="stadio" value="'.$_GET['id'].'" type="hidden" placeholder="Name">
                                <div class="row">
                                    <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                            placeholder="Scrivi un commento" required></textarea>
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Inserisci un voto da 1 a 5" name="voto" id="voto" type="number">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm btn_1">Invia recensione <i
                                        class="flaticon-right-arrow"></i> </button>
                                </div>
                            </form>
                        </div>';
                    }
                    ?>
            </div>
            
         </div>
      
   </section>
   <!--================Blog Area end =================-->

    <!--::footer_part start::-->
    <footer class="footer_part">
            <div class="container">
                
                <hr>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tutti i diritti riservati | Realizzato da Tascio, Corne e kingsupremobellissimissimo</a>
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


    
