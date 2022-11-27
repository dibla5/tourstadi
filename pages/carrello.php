<?php
    session_start();
    require_once('connessione.php');
?> 
<!doctype html>
<html>
    <body>
        <h1>Carrello</h1>
        <?php
            echo $_SESSION['idTour'];
        ?>
    </body>
</html>