<?php
    $bottoni = TRUE;
    $aggiungiStadio = FALSE;
    $modificaStadio = FALSE;
    $eliminaStadio = FALSE;
    $stadio = FALSE;
    $errore = FALSE;
    session_start();
    //$utente = $_SESSION['admin'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "progettostadi";
    $conn = mysqli_connect($servername , $username , $password , $dbName);
    if(!$conn)
    {
        die("Connessione fallita: " . mysqli_connect_error());
    }
    function searchPhoto($nomeStadio)
    {
        $fileexist = glob("../img/stadio/".strtolower(str_replace(' ','', $nomeStadio)).".*");
        if(!empty($fileexist))
        {
            foreach($fileexist as $fileToDelete)
            {
                unlink($fileToDelete);
            }
        }
    }
    if(isset($_POST['aggiungiStadio']))
    {
        $aggiungiStadio = TRUE;
        $bottoni = FALSE;
    } 
    if(isset($_POST['modifica']))
    {
        $modificaStadio = TRUE;
        $bottoni = FALSE;
    }
    if(isset($_POST['elimina']))
    {
        $eliminaStadio = TRUE;
        $bottoni = FALSE;
    } 
    
    if(isset($_POST['inserisciStadio'])){
        $nomeStadio = $_POST["nomeStadio"];
        $sql = "SELECT * FROM Stadio WHERE nome = '$nomeStadio'";
        $result = $conn -> query($sql);
		if($result -> num_rows > 0)
		{
			while($row = $result -> fetch_assoc())
			{
				if($row['nome'] == $nomeStadio)
				{
					$stadio = TRUE;
					break;
				}
			}
		}
        if(!$stadio){
            $estensione = (pathinfo($_FILES['img']['name']))['extension'];
            $cartella = 'img/stadio/'.strtolower(str_replace(' ' , '' , $nomeStadio)).".".$estensione;
            move_uploaded_file($_FILES['img']['tmp_name'] , "../".$cartella);
            $descrizione = $_POST["descrizione"]; 
            $preview = $_POST["preview"];
            $mappa = $_POST["mappa"];
            $prezzo = $_POST["prezzo"];
            $citta = $_POST["citta"];
            $capienza = $_POST["capienza"];
            $orario = $_POST["orario"];
            $sql = "INSERT INTO Stadio(nome,citta,mappa,preview,descrizione,prezzo,orario,capienza,img) VALUES('$nomeStadio','$citta','$mappa','$preview','$descrizione',$prezzo,'$orario',$capienza,'$cartella')";    
            if($conn -> query($sql) === FALSE)
            {
                $errore = TRUE;
            }
        }
    }
    if(isset($_POST['modificaStadio'])){
        $nomeStadio = $_POST['nomeStadio'];
        $descrizione = $_POST["descrizione"]; 
        $preview = $_POST["preview"];
        $mappa = $_POST["mappa"];
        $prezzo = $_POST["prezzo"];
        $citta = $_POST["citta"];            
        $capienza = $_POST["capienza"];
        $orario = $_POST["orario"];
        if(empty(pathinfo($_FILES['foto']['name'] , PATHINFO_EXTENSION)))
        {
            $sql = "UPDATE Stadio SET nome = '$nomeStadio' , citta = '$citta' , mappa = '$mappa' , preview = '$preview' , descrizione = '$descrizione' , prezzo = '$prezzo' , orario = '$orario' , capienza = '$capienza'  WHERE nome= '$nomeStadio'"; 
        }
        else
        {
            searchPhoto($nomeStadio);
            $estensione = (pathinfo($_FILES['foto']['name']))['extension'];
            $cartella = 'img/stadio/'.strtolower(str_replace(' ' , '' , $nomeStadio)).".".$estensione;
            move_uploaded_file($_FILES['foto']['tmp_name'] , "../".$cartella);  
            $sql = "UPDATE Stadio SET nome = '$nomeStadio' , citta = '$citta' , mappa = '$mappa' , preview = '$preview' ,  descrizione = '$descrizione' , prezzo = '$prezzo' , orario = '$orario' , capienza = '$capienza' , img = '$cartella' WHERE nome= '$nomeStadio'";  
        }   
        if($conn -> query($sql) === FALSE)
        {
            $ERRORE = TRUE;
        }
    }
    if(isset($_POST['eliminaStadio']))
    {
        $nomeStadio = $_POST['nomeStadio'];
        $sql = "DELETE FROM Stadio WHERE nome = '$nomeStadio'";
        if($conn -> query($sql) === FALSE)
        {
            $ERRORE = TRUE;
        }
    }
    
    if(isset($_POST['indietro']))
    {
        $aggiungiStadio = FALSE;
        $modificaStadio = FALSE;
        $eliminaStadio = FALSE;
        $bottoni = TRUE;
    }  
    if(isset($_POST['cerca']) || isset($_POST['cercaElimina']))
    {
        $bottoni = FALSE;
    }
?>
<!doctype html>
    <html>
        <head>  
            <title>Pannello di controllo</title>
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <script type="text/javascript" src="js/style.js"></script>
        </head>
        <body>
        <?php
            if($bottoni){
                echo'<div class="menu text-center" style="height:5%;padding-top: 20px">
                        <ul>
                            <form method="post">
                                <li><a href="../index.php">Home</li></br></br>
                                <li><input type="submit" name="aggiungiStadio" class="btn-primary" value="Aggiungi"></li>
                                <li><input type="submit" name="modifica" class="btn-secondary" value="Modifica"></li>
                                <li><input type="submit" name="elimina" class="btn-danger" value="Elimina"><br></li></br>
                                <li><a href="../pages/logout.php">Logout</a></li>
                            </form>
                        </ul>
                        </br>
                </div>';
            }

        ?>
            <div class="main-content" id="divGrande" style="display: block">
                <div class="wrapper">
                    <h1>Pannello di controllo amministratore</h1>

                    <div class="col-4 text-center">

                        <?php 
                            $sql2 = "SELECT * FROM Stadio";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);
                        ?>

                        <h1><?php echo $count2; ?></h1>
                        <br />
                        Stadi presenti
                    </div>

                    <div class="col-4 text-center">
                        
                        <?php 
                            $sql3 = "SELECT * FROM Tour";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);
                        ?>

                        <h1><?php echo $count3; ?></h1>
                        <br />
                        Tour totali
                    </div>

                    <div class="col-4 text-center">
                        
                        <?php 
                            $sql4 = "SELECT * FROM Utente";

                            $res4 = mysqli_query($conn, $sql4);

                            $count4 = mysqli_num_rows($res4);

                        ?>

                        <h1><?php echo $count4; ?></h1>
                        <br />

                        Utenti registrati 
                    </div>
                
                    <div class="col-4 text-center">
                        
                        <?php 
                            $sql10 = "SELECT * FROM ordine WHERE stato = 1";
                            $res10 = mysqli_query($conn, $sql10);
                            $count10 = mysqli_num_rows($res10);
                        ?>

                        <h1><?php echo $count10; ?></h1>
                        <br />
                        Tour iniziati
                    </div>
                    
                    <div class="col-4 text-center">
                        
                        <?php 
                            $sql6 = "SELECT * FROM ordine WHERE stato = 2";
                            $res6 = mysqli_query($conn, $sql6);
                            $count6 = mysqli_num_rows($res6);
                        ?>

                        <h1><?php echo $count6; ?></h1>
                        <br />
                        Tour completati
                    </div>

                </div>
            </div>
            <?php
            if($aggiungiStadio){
                echo'                          
                    <script type="text/javascript">off();</script> 
                    <div class="menu text-center" style="height:5%;padding-top: 20px">
                        <ul>
                            <form method="post"">
                                <li><input type="submit" class="btn-indietro" name="back" value="Indietro" ></br></li></br>
                                <li><a href="../pages/logout.php">Logout</a></li>
                            </form>
                        </ul>
                        </br>
                    </div>
                            <section class="vh-100" style="text-align: center;margin: auto;width: 30%;">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="card" style="border-radius: 1rem; max-width:700px;background-color:#F1F4F7">
                                            <div class="card-body p-4 p-lg-5 text-black formRegister center">
                                                <form class="menu output" method="post" action="" enctype="multipart/form-data">
                                                    <h3 class="fw-normal mb-2 pb-2" style="letter-spacing: 1px;">Aggiungi stadio</h3>
                                                    </br>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 pb-2">
                                                            <input type="text" class="form-control" name="nomeStadio" id="nomeStadio" placeholder="Nome dello stadio" required>
                                                        </div>
                                                        <div class="form-group col-md-6 pb-2">
                                                            <textarea class="form-control opzioni" id="preview" name="preview" rows="3" cols="50" class="mt-1" placeholder=" (descrizione breve)..."></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6 pb-2">
                                                            <textarea class="form-control opzioni" id="descrizione" name="descrizione" rows="3" cols="50" class="mt-1" placeholder="Descrizione..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 pb-2">
                                                        <input type="text" class="form-control" name="citta" id="citta" placeholder="città" required>
                                                        </div>
                                                        <div class="form-group col-md-6 pb-2">
                                                            <input type="number" class="form-control" name="prezzo" id="prezzo" placeholder="Prezzo" required>
                                                        </div>
                                                        <div class="form-group col-md-6 pb-2">
                                                            <input type="number" class="form-control" name="capienza" id="capienza" placeholder="Capienza" min="0" required>
                                                        </div>
                                                        <div class="form-group col-md-6 pb-2">
                                                            <input type="text" class="form-control" name="orario" id="orario" placeholder="Orario" required>
                                                        </div>
                                                        <div class="form-group col-md-6 pb-2">
                                                            <input type="text" class="form-control" name="mappa" id="mappa" placeholder="Mappa" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">    
                                                        <div class="form-group col-md-12 pb-2">
                                                            <input type="file" class="form-control" name="img" id="img" placeholder="Inserisci immagine" accept="image/*" onchange="loadFile(event)" class="mt-1" required>
                                                            <img id="output" class="mt-1"/>
                                                        </div>
                                                           
                                                    </div>
                                                    <div class="form-group pb-2">
                                                        <input type="submit" name="inserisciStadio" value="Aggiungi" class="btn-primary">
                                                    </div>
                                                    </br>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        ';
            }
            if($eliminaStadio){
                echo'
                <script type="text/javascript">off();</script> 
                    <div class="menu text-center" style="height:5%;padding-top: 20px">
                        <ul>
                            <form method="post"">
                                <li><input type="submit" class="btn-indietro" name="back" value="Indietro" ></br></li></br>
                                <li><a href="../pages/logout.php">Logout</a></li>
                            </form>
                        </ul>
                        </br>
                    </div>
                    <section class="vh-100" style="text-align: center;margin: auto;width: 30%;">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="card" style="border-radius: 1rem; max-width:700px;background-color:#F1F4F7">
                                        <div class="card-body p-4 p-lg-5 text-black formRegister center">
                                            <form class="menu output" method="post" action="" enctype="multipart/form-data">
                                                </br>
                                                <h3 class="fw-normal mb-2 pb-2" style="letter-spacing: 1px;">Elimina uno stadio</h3>
                                                <div class="row">
                                                    <div class="form-group col pb-2">
                                                        <label>Scrivi il nome dello stadio che vuoi eliminare</label>
                                                        <input type="text" class="form-control" name="nomeStadio" placeholder="Inserisci..." required>
                                                    </div>
                                                </div>
                                                </br>
                                                <div class="row">
                                                    <div class="form-group col-md-6 pb-2 ">
                                                        <input type="submit" name="cercaElimina" value="Cerca" class="btn-primary">
                                                    </div>
                                                </div>
                                                </br>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>   
                    ';
            }
            if(isset($_POST['cercaElimina'])){
                        $nomeStadio = $_POST['nomeStadio'];
                        $sql = "SELECT * FROM Stadio WHERE nome = '$nomeStadio'";
                        $result = $conn -> query($sql);
                        if($result -> num_rows > 0)
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo'
                                <script type="text/javascript">off();</script> 
                                <div class="menu text-center" style="height:5%;padding-top: 20px">
                                    <ul>
                                        <form method="post"">
                                            <li><input type="submit" class="btn-indietro" name="back" value="Indietro" ></br></li></br>
                                            <li><a href="../pages/logout.php">Logout</a></li>
                                        </form>
                                    </ul>
                                    </br>
                                </div>
                                <section class="vh-100" style="text-align: center;margin: auto;width: 30%;">
                                    <div class="container py-5 h-100">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="card" style="border-radius: 1rem; max-width:700px;background-color:#F1F4F7">
                                                <div class="card-body p-4 p-lg-5 text-black formRegister center">
                                                    <form class="output" method="post" action="" enctype="multipart/form-data">
                                                        </br>
                                                        <h3 class="fw-normal mb-2 pb-2" style="letter-spacing: 1px;">Elimina lo stadio</h3>
                                                        <div class="row">
                                                            <div class="form-group col-md-12 pb-2">
                                                                <img src="../'.$row['img'].'" alt="'.$row['nome'].' id="output">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12 pb-2">
                                                                <h1>Nome: </h1><p>'.$row['nome'].'</p>
                                                                <h2>Citta: </h2><p>'.$row['citta'].'</p>
                                                                <h3>Descrizione: </h3><p>'.$row['descrizione'].'</p>
                                                                <h4>Prezzo : </h4><p>€ '.$row['prezzo'].'</p>
                                                                <h4>Mappa: </h4><p>'.$row['mappa'].'</p>
                                                                <h4>Anteprima: </h4><p>'.$row['preview'].'</p>
                                                                <h4>Orario: </h4><p>'.$row['orario'].'</p>
                                                                <h4>Capienza: </h4><p>'.$row['capienza'].'</p>
                                                                <h4>Img: </h4><p>'.$row['img'].'</p>
                                                            </div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="hidden" class="form-control" name="nomeStadio" value="'.$row['nome'].'">
                                                            </div>  
                                                        </div>
                                                        <div class="form-group pb-2">
                                                        </br>
                                                            <input type="submit" name="eliminaStadio" value="Elimina" class="btn-danger">
                                                        </div>  
                                                        </br>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section> 
                                ';
                            }
                        } 
                        else{
                            echo '
                            <div class="form-group col pb-2">
                                <form method="post" class="formLogin" action="">
                                    <label>Nessun risultato</label>
                                    <input type="submit" name="back" value="Indietro" style="width:100px;height:40px; border-radius:5px;margin-bottom:10px;">
                                </form>
                            </div>' ;

                        }                      
                    }
            if($modificaStadio){
                echo'
                <script type="text/javascript">off();</script> 
                    <div class="menu text-center" style="height:5%;padding-top: 20px">
                        <ul>
                            <form method="post"">
                                <li><input type="submit" class="btn-indietro" name="back" value="Indietro" ></br></li></br>
                                <li><a href="../pages/logout.php">Logout</a></li>
                            </form>
                        </ul>
                        </br>
                    </div>
                            <section class="vh-100" style="text-align: center;margin: auto;width: 30%;">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="card" style="border-radius: 1rem; max-width:700px;background-color:#F1F4F7">
                                        <div class="card-body p-4 p-lg-5 text-black formRegister center">
                                            <form class="menu output" method="post" action="" enctype="multipart/form-data">
                                                </br>
                                                <h3 class="fw-normal mb-2 pb-2" style="letter-spacing: 1px;">Modifica uno stadio</h3>
                                                <div class="row">
                                                    <div class="form-group col pb-2">
                                                        <label>Scrivi il nome dello stadio che vuoi modificare</label>
                                                        <input type="text" class="form-control" name="nomeStadio" placeholder="Inserisci..." required>
                                                    </div>    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 pb-2 ">
                                                    </br>
                                                        <input type="submit" name="cerca" value="Cerca" class="btn-primary">
                                                    </div>    
                                                    </br>
                                                </div>
                                                
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>   
                    ';
            }
            if(isset($_POST['cerca'])){
                        $nomeStadio = $_POST['nomeStadio'];
                        $sql = "SELECT * FROM Stadio WHERE nome = '$nomeStadio'";
                        $result = $conn -> query($sql);
                        if($result -> num_rows > 0){
                            while($row = $result -> fetch_assoc()){
                                echo'
                                <script type="text/javascript">off();</script> 
                                <div class="menu text-center" style="height:5%;padding-top: 20px">
                                    <ul>
                                        <form method="post"">
                                            <li><input type="submit" class="btn-indietro" name="back" value="Indietro" ></br></li></br>
                                            <li><a href="../pages/logout.php">Logout</a></li>
                                        </form>
                                    </ul>
                                    </br>
                                </div>
                                <section class="vh-100" style="text-align: center;margin: auto;width: 30%;">
                                    <div class="container py-5 h-100">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="card" style="border-radius: 1rem; max-width:700px;background-color:#F1F4F7">
                                                <div class="card-body p-4 p-lg-5 text-black formRegister center">
                                                    <form class="output" method="post" action="" enctype="multipart/form-data">
                                                        </br>
                                                        <h3 class="fw-normal mb-2 pb-2" style="letter-spacing: 1px;">Modifica lo stadio</h3>
                                                        </br>
                                                        <div class="row">
                                                            <div class="form-group col-md-12 pb-2">
                                                                <input type="file" name="foto" id="foto" accept="image/*" onchange="loadFile(event)" class="form-control mt-1">
                                                                <img src="../'.$row["img"].'" id="output" class="mt-1"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="text" name="nomeStadio" value="'.$row['nome'].'" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-6 pb-2">
                                                                <textarea id="descrizione" name="descrizione" rows="4" cols="50" class="form-control opzioni mt-1">'.$row["descrizione"].'</textarea>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="number" class="form-control" name="prezzo" id="prezzo" value="'.$row["prezzo"].'" required>
                                                            </div>   
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="text" class="form-control" name="citta" id="citta" value="'.$row["citta"].'" required>
                                                            </div>  
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="text" class="form-control" name="mappa" id="mappa" value="" required>
                                                            </div> 
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="text" class="form-control" name="preview" id="preview" value="'.$row["preview"].'" required>
                                                            </div>  
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="number" class="form-control" name="capienza" id="capienza" value="'.$row["capienza"].'" min="0" required>
                                                            </div>
                                                            <div class="form-group col-md-6 pb-2">
                                                                <input type="text" class="form-control" name="orario" id="orario" value="'.$row["orario"].'" required>
                                                            </div>
                                                        </div>';
                                                        echo '
                                                        </br>
                                                            <div class="form-group pb-2">
                                                                <input type="submit" name="modificaStadio" value="Modifica" class="btn-secondary">
                                                            </div>  
                                                    </form>                        
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section> 
                                ';
                            }
                        } 
                        else{
                            echo '
                            <div class="form-group col pb-2">
                                <form method="post" class="formLogin" action="">
                                    <label>Nessun risultato</label>
                                    <input type="submit" name="indietro" value="Indietro" style="width:100px;height:40px; border-radius:5px;margin-bottom:10px;">
                                </form>
                            </div>' ;

                        }                      
                    }
        ?>
        </body>
    </html>


    


