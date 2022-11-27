
<!doctype html>
<?php
  session_start();
?>
<html lang="zxx">

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
							<h2>Contatti</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1or9if1zeacy1lEgjPP-BELucG_e4eEjj&ehbc=2E312F" width="1200" height="480" style="text-align: center;"></iframe>
      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Contattaci</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="messaggio" id="messaggio" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci messaggio'"
                    placeholder='Inserisci messaggio'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="nome" id="nome" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Inserisci il tuo nome'" placeholder='Inserisci il tuo nome'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Inserisci indirizzo email'" placeholder='Inserisci indirizzo email'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="oggetto" id="oggetto" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Inserisci oggetto'" placeholder='Inserisci oggetto'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_1">Invia messaggio <i class="flaticon-right-arrow"></i> </button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Genova, Italia.</h3>
              <p>Sestri ponente, 16153</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>+39 3924290840</h3>
              <p>lun-sab 8am-17pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>Stourtrip@gmail.com</h3>
              <p>Mandaci il messaggio quando vuoi!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

  <!--::footer_part start::-->
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
                        <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                        <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->

<!-- jquery plugins here-->
<!-- jquery -->
<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="js/jquery.magnific-popup.js"></script>




<!-- particles js -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>

</body>

</html>