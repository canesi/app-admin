<?php
    /*incluir script de conexion*/
	include('connect.php');

    /* iniciar la session */
    session_start();

    /*crear instancia de la clase conexion*/
	$con = new Conexion;

	/*usar metodo de conectar*/
	$conn = $con->conectar_master();

    //parametros a recibir
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Esto se puede remplazar por un usuario real guardado en la base de datos.
    if($username == 'admin' && $password == 'admin'){
        // Guardo en la sesión el email del usuario.
        $_SESSION['username'] = $username;
     
        // Redirecciono al usuario a la página principal del sitio.
        //header("HTTP/1.1 302 Moved Temporary");
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: index.php");
    }else{
        echo 'nombre de usuario o password es incorrecto, <a href="login.html">vuelva a intenarlo</a>.<br/>';
    }
?>