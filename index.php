<?php
    //manejar la session
    session_start();

    //recibir la session actual 
    $username = $_SESSION['username'];
    
    //echo "Bienvenido".$_SESSION;
    echo "<pre>";
    print_r("Bienvenido: ".$username);
    echo "</pre>";
?>