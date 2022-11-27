<?php
    session_start();
    require_once('pages/connessione.php');
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Stour - Un tour calcistico</title>
        <link rel="icon" href="img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="css/css/animate.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/css/owl.carousel.min.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="css/css/all.css">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="css/css/flaticon.css">
        <link rel="stylesheet" href="css/css/themify-icons.css">
        <link rel="stylesheet" href="css/css/nice-select.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="css/css/magnific-popup.css">
        <!-- swiper CSS -->
        <link rel="stylesheet" href="css/css/slick.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="css/css/style.css">

        <!-- qr librerie -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    </head>

    <body>
       <!--div qr code--> 
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light" style="list-style: none" >
                            <a class="navbar-brand" href="index.php"> <img src="img/favicon.png" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="menu_icon"><i class="fas fa-bars"></i></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <?php
                                            if(!empty($_SESSION['user'])){
                                                echo'<li class="nav-item">
                                                    <a class="nav-link" href="pages/creazioneTourUtente.php">Crea il tuo tour</a>
                                                </li>';
                                            }
                                    ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="pages/blog.html" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tour
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="pages/tour.php?user=admin">Predefiniti</a>
                                            <a class="dropdown-item" href="pages/tour.php?user=notadmin">Creati da altri utenti</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/stadiTutti.php">Stadi presenti</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/contact.php">Contatti</a>
                                    </li>
                                    
                                </ul>
                            </div>    
                            
                                        <?php
                                            if(!empty($_SESSION['user'])){
                                                if($_SESSION['user'] == "admin"){
                                                    echo '          
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                                            <img src="img/profilo.png" alt="Profilo" style="border-radius: 50%; " width="50" height="50">                                   
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                                            <p class="dropdown-item">Benvenuto '.$_SESSION['user'].'</p>
                                                            <a class="dropdown-item" style="color:red" id="pannelloDiControlloTasto" href="admin/admin.php">Pannello di controllo</a>  
                                                            <a class="dropdown-item" id="logoutTasto" href="pages/logout.php">Esci</a>  
                                                        </div>
                                                    </li>                    
                                                    ';
                                                } 
                                                else{
                                                    echo '
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img src="img/profilo.png" alt="Profilo" style="border-radius: 50%;" width="50" height="50">                                   
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                                            <p class="dropdown-item">Benvenuto '.$_SESSION['user'].'</p>
                                                            <a class="dropdown-item" id="tourEffettuati" href="pages/tourEffettuati.php">Tour effettuati</a>
                                                            <a class="dropdown-item" id="logoutTasto" href="pages/logout.php">Esci</a>  
                                                        </div>
                                                    </li>                                                                       
                                                    '; 
                                                }
                                            }
                                            else{
                                                echo' 
                            <a class="btn_1 d-none d-lg-block" href="pages/login.php">Login</a>
                                                ';
                                            }
                                        ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
          
        <!-- Header part end-->
<!-- banner part start-->
<section class="banner_part">
            <div id="overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h5>Il miglior modo per organizzare tour calcistici</h5>
                                    <h1>Visita gli stadi più celebri e caratteristici del mondo</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->

        <!-- banner part start-->
        <section class="search_your_country" style="background-color: #FECC00;">
            <div class="container-fluid">
                <div class="row" style="text-align: center;" >
                    <div class="col-lg-4 col-sm-6">
                        <div style="padding-right: 50px;" class="single_donation_item">
                            <img src="img/euro.png" alt="#">
                            <h4>Costi chiari</h4>
                            <p>I prezzi indicati sono esattamente i prezzi che si trovano sui vari siti internet. </br>Non ci prendiamo alcuna percentuale per il servizio che offriamo.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div style="padding-left: 50px;padding-right: 50px;" class="single_donation_item">
                            <img src="img/stadio.png" alt="#">
                            <h4>Stadi di tutto il mondo</h4>
                            <p>Con il nostro servizio si possono realizzare tour di molteplici stadi.</br>Si potrà decidere quali impianti visitare sulla vasta scelta di stadi disponibili.</p>
                            <a href="pages/stadiTutti.php" class="read_btn">Scoprili tutti</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div  style="padding-left: 50px;"  class="single_donation_item">
                            <img src="img/info.png" alt="#">
                            <h4>Informazioni chiare</h4>
                            <p>Per ogni tour e stadio ci saranno informazioni dettagliate e esaustive.</br></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->

        <!-- upcoming_event part start-->

        <!-- use sasu part end-->
        <section class="popular_place padding_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="section_tittle text-center">
                            <img src="img/section_tittle_img.png" alt="">
                            <h2><span>I nostri <span>tour</span></h2>
                            <p><span>Questi sono i tour offerti dal nostro sito.</span></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_popular_place">
                            <img src="img/italia.png" alt="">
                            <h4>Tour "Mandolino"</h4>
                            <p>Questo tour racchiude tutti gli stadi italiani disponibili alla visita.</p>
                            <a href="pages/tour.php?id=1" class="btn1">prenota ora</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_popular_place">
                            <img src="img/star.png" alt="">
                            <h4>Tour "Star"</h4>
                            <p>Questo tour racchiude tutti gli stadi dei club europei e non più forti.</p>
                            <a href="pages/tour.php?id=2" class="btn1">prenota ora</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_popular_place">
                            <img src="img/hero.png" alt="">
                            <h4>Tour "Hero"</h4>
                            <p>Questo tour racchiude tutti gli stadi dei club esteri disponibili alla visita.</p>
                            <a href="pages/tour.php?id=3" class="btn1">prenota ora</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- use sasu part end-->

        <section class="popular_place padding_top"> <!-- fare section tour non creati dall'admin-->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="section_tittle text-center">
                            <img src="img/section_tittle_img.png" alt="">
                            <h2><span>I tour creati dagli utenti</h2>
                            <p><span>Questi sono i tour che altri utenti hanno creato e reso disponibile.</span></p>
                        </div>
                    </div>
                </div>
                    <div class="row justify-content-center">
                        <?php
                            $query = "SELECT * FROM Tour WHERE utente != 'admin' ";
                            $risultato = $conn -> query($query);
                            if($risultato -> num_rows > 0){
                                while($row = $risultato -> fetch_assoc()){
                                    $idTour = $row['id'];
                                    echo' 
                                        <div style="padding:20px" class="col-lg-4 col-sm-6">
                                            <div class="single_popular_place">
                                                <img style="border-radius: 50%;" src="img/profilo.png" alt="">
                                                <h4 style="text-transform: capitalize;">Tour "'.$row['nome'].'"</h4>
                                                <p>Stadi presenti nel tour:';

                                    $query2 = "SELECT stadio FROM TourHaStadio WHERE tour = $idTour";
                                    $risultato2 = $conn -> query($query2);
                                    if($risultato2 -> num_rows > 0){
                                        while($row = $risultato2 -> fetch_assoc()){
                                            $idStadio = $row['stadio'];
                                            $query3 = "SELECT * FROM Stadio WHERE id = $idStadio";
                                            $risultato3 = $conn -> query($query3);
                                            if($risultato3 -> num_rows > 0){
                                                while($row = $risultato3 -> fetch_assoc()){
                                                    $nomeStadio = $row['nome'];
                                                }
                                            }
                                                    echo' '.$nomeStadio.',';
                                                
                                        }
                                    }
                                    echo'</p>';
                                    $query4 = "SELECT * FROM Tour WHERE id = $idTour ";
                                    $risultato4 = $conn -> query($query4);
                                    if($risultato4 -> num_rows > 0){
                                        while($row = $risultato4 -> fetch_assoc()){
                                        echo'
                                                        <p>Creatore: <bold>'.$row['utente'].'</bold></p>
                                                        <a href="pages/tour.php?id='.$row['id'].'&action=prenota" class="btn1">prenota ora</a>
                                                    </div>
                                                </div>';
                                        }
                                    }
                                }
                            }                     
                            
                                
                        ?>
                    </div>
            </div>
        </section>

        <!--::header part start::-->
        <?php  
            if(!empty($_SESSION['user'])){  
                echo'
                <a onclick="onQRScanner()" style="position:fixed;right:35px;bottom:30px;">
                    <button class="rounded-circle" style="background-color: #FFCC00;width: 75px;height: 75px" id="carrelloBottone">
                        <img src="img/qrbottone.png"></img>
                    </button>
                </a>';
            }
        ?>
        <!-- blog part end-->
        <div id="app">
            <div class="container" style="margin: auto;width: 50%;text-align: center;padding-top: 150px;">
                <div class="row" style="border-radius: 25px;width:1000px; height:600px; background-color: #FECC00">
                    <div class="col">
                        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                        <h4 style="padding-top: 70px">Scannerizza il codice QR che hai trovato.</h4>
                        <div class="col-sm-12" style="border-radius: 50px;">
                            <video id="preview" style="width: 500px;height: 500px;"></video>
                        </div>
                        <script type="text/javascript">
                            var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
                            scanner.addListener('scan',function(content){
                                window.location=("pages/stadio.php?id="+content+"&visitato=1");
                            });
                            Instascan.Camera.getCameras().then(function (cameras){
                                if(cameras.length>0){
                                    scanner.start(cameras[0]);
                                    $('[name="options"]').on('change',function(){
                                        if($(this).val()==1){
                                            if(cameras[0]!=""){
                                                scanner.start(cameras[0]);
                                            }else{
                                                alert('No Front camera found!');
                                            }
                                        }else if($(this).val()==2){
                                            if(cameras[1]!=""){
                                                scanner.start(cameras[1]);
                                            }else{
                                                alert('No Back camera found!');
                                            }
                                        }
                                    });
                                }else{
                                    console.error('No cameras found.');
                                    alert('No cameras found.');
                                }
                            }).catch(function(e){
                                console.error(e);
                                alert(e);
                            });
                        </script>
                        <a href="#" class="close-button-form"onclick="off()">
                            <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
                        </a>
                    </div>
                    
                
                </div>
            </div>
            
        </div>
        
        
        
        <!--::footer_part start::-->
        <footer class="footer_part">
            <div class="container">
                
                <hr>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tutti i diritti riservati | Realizzato da Tascio, Corne e Kingsupremobellissimissimo</a>
    <!-- Link back to Colorlib can't be removed. Templaò-te is licensed under CC BY 3.0. --></P>
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


        

        <script type="text/javascript" src="app.js"></script>
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


        <script src="other/app.js"></script>
        <script src="other/export.js"></script>
        <script src="other/gulpfile.js"></script>
        
        <script src="other/index.js"></script>





        <script src="src/camera.js"></script>
        <script src="src/scanner.js"></script>
        <script src="src/zxing.js"></script>
    </body>

</html>