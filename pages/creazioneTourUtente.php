<?php
    session_start();
    require_once('connessione.php');
    $stadioGiaAggiunto = false;
    $esiste = false;


    $utente = $_SESSION['user'];
    
    if(isset($_POST['conferma'])){
        $nomeTour = $_POST['confermaNomeTour'];
        $sql = "SELECT nome FROM Tour WHERE nome = '$nomeTour'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            $esiste = true;
        }
        else{
            $query="INSERT INTO Tour(nome,costo,utente) VALUES ('$nomeTour',0,'$utente')";
            $result = $conn -> query($query);
            $_SESSION['nomeTour'] = $nomeTour; 
            $sql = "SELECT nome FROM Stadio";
            $result = $conn -> query($sql);
            if($result -> num_rows > 0){
                $row = $result -> fetch_assoc();
                $nomeStadio = $row["nome"];
            }    
        }
        
    }
                
    if(isset($_GET['action']) && $_GET['action']=="aggiungi"){ 
        $idStadio=intval($_GET['id']);
        $tour = $_SESSION['nomeTour'];
        $nomeStadio = $_GET['nome'];
        $sql = "SELECT id FROM Tour WHERE nome = '$tour'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            $row = $result -> fetch_assoc();
            $tourNuovo = $row['id'];
        }    
        $sql = "SELECT stadio FROM tourHaStadio WHERE tour = '$tourNuovo' AND stadio = '$idStadio'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            $stadioGiaAggiunto = true;
        }
        else{
            $sql = "INSERT INTO TourHaStadio VALUES ($tourNuovo,$idStadio)";
            $conn -> query($sql);
        }
        echo'
                        <div class="wrapper" style="background: transparent;">
                            <div class="form_wrap">
                                <div id="form2" class="form_2 data_info">
                                    <script type="text/javascript">off1();</script> 
                                    <h2>Aggiunta stadi</h2>
                                    <form method="post">
                                        <div class="form_container" style="width: 100%">
                                            <div class="input_wrap">
                                                <label style="color: white" for="email">Elenco stadi</label>
                                                <p style="color: white">Qui sotto si può aggiungere gli stadi al tour che si sta creando.</p>
                                                <div class="btns_wrap">
                                                    <div class="common_btns form_1_btns">
                                                        <input type="submit" name="conferma1" value="Avanti" class="btn_next">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';
                                echo'
                                <section class="tour_package padding_top single_pack">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-sm-6 ">
                                            <div class="tour_package_cotent owl-carousel">';
                                                $query = "SELECT * FROM stadio ";
                                                $risultato = $conn -> query($query);
                                                if($risultato -> num_rows > 0){
                                                    while($row = $risultato -> fetch_assoc()){
                        
                                                    echo' 
                                                        <div class="single_tour_package" style="width: 100%">
                                                            <img src="../'.$row['img'].'" alt="">
                                                            <div class="tour_pack_content">
                                                                <h4>'.$row['nome'].'</h4>
                                                                <p> '.$row['preview'].'</p>
                                                                <div class="tour_content_rating">
                                                                    <a href="stadio.php?id='.$row['id'].'" class="btn1">Scopri di più</a>

                                                                    <a href="creazioneTourUtente.php?action=rimuovi&id='.$row['id'].'&nome='.$row['nome'].'"><button name="rimuovi" style="font-weight:bold;" class="btn btn-outline-danger"><i class="fa fa-minus" aria-hidden="true"></i></button></a>
                                                                    <a href="creazioneTourUtente.php?action=aggiungi&id='.$row['id'].'&nome='.$row['nome'].'"><button name="aggiungi" style="font-weight:bold;" class="btn btn-outline-success"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
                    
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                }
                                                echo '
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-xl-3 offset-lg-1 col-sm-6">
                                            <div class="tour_pack_content">
                                                <img src="img/section_tittle_img.png" alt="">
                                                <h2 style="color: white">Elenco di tutti gli stadi</h2>
                                                <p style="color: white">Questi sono tutti gli stadi presenti nei nostri tour: per avere informazioni aggiuntive schiacciare "Scopri di più" sulla scheda dello stadio</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </section>';
    }

    if(isset($_GET['action']) && $_GET['action']=="rimuovi"){ 
        $idStadio=intval($_GET['id']);
        $tour = $_SESSION['nomeTour'];
        $nomeStadio = $_GET['nome'];

        $sql = "SELECT id FROM Tour WHERE nome = '$tour'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            $row = $result -> fetch_assoc();
            $tourNuovo = $row["id"];
        }
        $sql = "DELETE FROM TourHaStadio WHERE tour = '$tourNuovo' AND stadio = '$idStadio'";
        $conn -> query($sql);  
        
        echo'
                        <div class="wrapper" style="background: transparent;">
                            <div class="form_wrap">
                                <div id="form2" class="form_2 data_info">
                                    <script type="text/javascript">off1();</script> 
                                    <h2>Aggiunta stadi</h2>
                                    <form method="post">
                                        <div class="form_container" style="width: 100%">
                                            <div class="input_wrap">
                                                <label style="color: white" for="email">Elenco stadi</label>
                                                <p style="color: white">Qui sotto si può aggiungere gli stadi al tour che si sta creando.</p>
                                                <div class="btns_wrap">
                                                    <div class="common_btns form_1_btns">
                                                        <input type="submit" name="conferma1" value="Avanti" class="btn_next">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';
                                echo'
                                <section class="tour_package padding_top single_pack">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-sm-6 ">
                                            <div class="tour_package_cotent owl-carousel">';
                                                $query = "SELECT * FROM stadio ";
                                                $risultato = $conn -> query($query);
                                                if($risultato -> num_rows > 0){
                                                    while($row = $risultato -> fetch_assoc()){
                        
                                                    echo' 
                                                        <div class="single_tour_package" style="width: 100%">
                                                            <img src="../'.$row['img'].'" alt="">
                                                            <div class="tour_pack_content">
                                                                <h4>'.$row['nome'].'</h4>
                                                                <p> '.$row['preview'].'</p>
                                                                <div class="tour_content_rating">
                                                                    <a href="stadio.php?id='.$row['id'].'" class="btn1">Scopri di più</a>

                                                                    <a href="creazioneTourUtente.php?action=rimuovi&id='.$row['id'].'&nome='.$row['nome'].'"><button name="rimuovi" style="font-weight:bold;" class="btn btn-outline-danger"><i class="fa fa-minus" aria-hidden="true"></i></button></a>
                                                                    <a href="creazioneTourUtente.php?action=aggiungi&id='.$row['id'].'&nome='.$row['nome'].'"><button name="aggiungi" style="font-weight:bold;" class="btn btn-outline-success"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
                    
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                }
                                                echo '
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-xl-3 offset-lg-1 col-sm-6">
                                            <div class="tour_pack_content">
                                                <img src="img/section_tittle_img.png" alt="">
                                                <h2 style="color: white">Elenco di tutti gli stadi</h2>
                                                <p style="color: white">Questi sono tutti gli stadi presenti nei nostri tour: per avere informazioni aggiuntive schiacciare "Scopri di più" sulla scheda dello stadio</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </section>';
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
            
	        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

        </head>
        <body style="background-image: linear-gradient(to bottom right, black, #FECC00);background-repeat: no-repeat;background-position: center;">
            <div id="tutto" style="background-image: linear-gradient(to bottom right, black, #FECC00);background-repeat: no-repeat;background-position: center;">
                <header class="main_menu home_menu" style="background: transparent;">
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

                <div id="myModalAggF" style="display: none" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content" >
                            <div class="modal-header"  class="center" style="display: block; margin-left: auto; margin-right: auto;" >
                                <div class="icon-box">
                                    <img src="../img/x.png" width="200px" height="200px"></img>
                                </div>	
                            </div>
                            <div class="modal-header" style="text-align: center">			
                                <h4 style="color: red" class="modal-title w-100">Aggiunta fallita</h4>	
                            </div>
                            <div class="modal-body">
                                <p style="color: black" class="text-center">Lo stadio è stato già aggiunto.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="../index.php"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="myModalAggF2" style="display: none" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content" >
                            <div class="modal-header"  class="center" style="display: block; margin-left: auto; margin-right: auto;" >
                                <div class="icon-box">
                                    <img src="../img/x.png" width="200px" height="200px"></img>
                                </div>	
                            </div>
                            <div class="modal-header" style="text-align: center">			
                                <h4 style="color: red" class="modal-title w-100">Aggiunta fallita</h4>	
                            </div>
                            <div class="modal-body">
                                <p style="color: black" class="text-center">Esiste già un tour con questo nome.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="../index.php"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                        <?php
                        if(!isset($_POST['conferma'])){
                            echo'

                            <div class="wrapper" style="background: transparent;">
                                <div class="form_wrap">
                                    <div id="form1" class="form_1 data_info">
                                        <script type="text/javascript">off();</script>
                                        <h2>Creazione tour</h2>
                                        <form method="post">
                                            <div class="form_container">
                                                <div class="input_wrap">
                                                    <label style="color: white" for="email">Nome tour</label>
                                                    <input type="text" class="input" name="confermaNomeTour" required>
                                                    </br>
                                                    <div style="width: 100%; text-align: center">
                                                        <form method="post" action="">
                                                            <input type="submit"  onclick="conferma1()" id="conferma" name="conferma" value="Avanti" class="btn_next" style="width:100px;height:35px;border-radius:5px;margin-bottom:10px;background-image: linear-gradient(to bottom right, #000, #FFCB00);color: white">
                                                        </form>   
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        }
                        else{
                            echo'
                        <div class="wrapper" style="background: transparent;">
                            <div class="form_wrap">
                                <div id="form2" class="form_2 data_info">
                                    <script type="text/javascript">off1();</script> 
                                    <h2>Aggiunta stadi</h2>
                                    <form method="post">
                                        <div class="form_container" style="width: 100%">
                                            <div class="input_wrap">
                                                <label style="color: white" for="email">Elenco stadi</label>
                                                <p style="color: white">Qui sotto si può aggiungere gli stadi al tour che si sta creando.</p>
                                                <div class="btns_wrap">
                                                    <div class="common_btns form_1_btns">
                                                        <input type="submit" name="conferma1" value="Avanti" class="btn_next">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';
                                echo'
                                <section class="tour_package padding_top single_pack">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-sm-6 ">
                                            <div class="tour_package_cotent owl-carousel">';
                                                $query = "SELECT * FROM stadio ";
                                                $risultato = $conn -> query($query);
                                                if($risultato -> num_rows > 0){
                                                    while($row = $risultato -> fetch_assoc()){
                        
                                                    echo' 
                                                        <div class="single_tour_package" style="width: 100%">
                                                            <img src="../'.$row['img'].'" alt="">
                                                            <div class="tour_pack_content">
                                                                <h4>'.$row['nome'].'</h4>
                                                                <p> '.$row['preview'].'</p>
                                                                <div class="tour_content_rating">
                                                                    <a href="stadio.php?id='.$row['id'].'" class="btn1">Scopri di più</a>

                                                                    <a href="creazioneTourUtente.php?action=rimuovi&id='.$row['id'].'&nome='.$row['nome'].'"><button name="rimuovi" style="font-weight:bold;" class="btn btn-outline-danger"><i class="fa fa-minus" aria-hidden="true"></i></button></a>
                                                                    <a href="creazioneTourUtente.php?action=aggiungi&id='.$row['id'].'&nome='.$row['nome'].'"><button name="aggiungi" style="font-weight:bold;" class="btn btn-outline-success"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
                    
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                }
                                                echo '
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-xl-3 offset-lg-1 col-sm-6">
                                            <div class="tour_pack_content">
                                                <img src="img/section_tittle_img.png" alt="">
                                                <h2 style="color: white">Elenco di tutti gli stadi</h2>
                                                <p style="color: white">Questi sono tutti gli stadi presenti nei nostri tour: per avere informazioni aggiuntive schiacciare "Scopri di più" sulla scheda dello stadio</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </section>';
                            }
                            if(isset($_POST['conferma1'])){
                                echo'
                                
                                <div id="form3" class="form_3 data_info" style="display: none;">
                                    <script type="text/javascript">off2();off1();</script> 
                                    <h2>Riepilogo</h2>
                                    <form method="post">
                                        <div class="form_container">';
                                        $nomeTour = $_POST['confermaNomeTour'];
                                        $query = "SELECT * FROM Tour WHERE nome = $nomeTour";
                                        $risultato = $conn -> query($query);
                                        if($risultato -> num_rows > 0){ 
                                            while($row = $risultato -> fetch_assoc()){
                                                
                                                echo'
                                                        <div>
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
                                        <input type="submit"  onclick="conferma2()" id="conferma" name="conferma" value="Avanti" class="btn_next" style="width:100px;height:35px;border-radius:5px;margin-bottom:10px;background-image: linear-gradient(to bottom right, #000, #FFCB00);color: white">
                                    </form>
                                </div>';
                            }
                            ?>
                    
                <div class="modal_wrapper">
                    <div class="shadow"></div>
                    <div class="success_wrap">
                        <span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
                        <p>Hai creato correttamente il tuo tour.</p>
                    </div>
                </div>



            <footer class="footer_part" >
                <div class="container">
                    
                    <hr>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="copyright_text">
                                <P style="color: white">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tutti i diritti riservati | Realizzato da Tascio, Corne e Kingsupremobellissimissimo</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer_icon social_icon">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="single_social_icon" style="color: white"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="single_social_icon" style="color: white"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="single_social_icon" style="color: white"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
                
        </div>
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
            <!-- custom js -->
            <script src="../js/styleConferma.js"></script>
            
        </body>
    </html>
    
<?php
    function stampa($conn,$nomeStadio){
        echo'
        <section class="tour_package padding_top single_pack">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 ">
                        <div class="tour_package_cotent owl-carousel">';
                            $query = "SELECT * FROM stadio ";
                            $risultato = $conn -> query($query);
                            if($risultato -> num_rows > 0){
                                while($row = $risultato -> fetch_assoc()){

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
                                                <a href="stadio.php?id='.$row['id'].'" class="btn1">Scopri di più</a>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }
                            echo'
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-3 offset-lg-1 col-sm-6">
                        <div class="tour_pack_content">
                            <img src="../img/section_tittle_img.png" alt="">
                            <h2>Elenco di tutti gli stadi</h2>
                            <p>Questi sono tutti gli stadi presenti nei nostri tour: per avere informazioni aggiuntive schiacciare "Scopri di più" sulla scheda dello stadio</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
              
    }


    if($stadioGiaAggiunto){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalAggF").modal("show");
                });
            </script>';             
    }  

    if($esiste){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalAggF2").modal("show");
                });
            </script>';             
    }  
?>




