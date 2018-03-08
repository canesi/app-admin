<?php
    /*incluir script de conexion*/
	include('connect.php');

    /* iniciar la session */
    session_start();

    /*crear instancia de la clase conexion*/
	$con = new Conexion;

	/*usar metodo de conectar*/
	$conn = $con->conectar();

    //parametros a recibir
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        //si hay algun error al conectar a la base de datos
        printf("Falló la conexión: %s\n", mysqli_connect_error());
        exit();
    }else if(!empty($username) AND !empty($password)){

        //encrypt password
        $password_encrypt = md5($password);
        //echo $password_encrypt;

        $sql =  "SELECT user.username, user.password FROM user WHERE user.active = 1 AND user.username = '".$username."' AND user.password = '".$password_encrypt."' ";

        if ($sentencia = mysqli_prepare($conn, $sql)) {

            /* ejecutar la consulta */
            mysqli_stmt_execute($sentencia);

            /* almacenar el resultado */
            mysqli_stmt_store_result($sentencia);

            $fila = mysqli_stmt_num_rows($sentencia);

            if($fila == 0){
                //echo 'nombre de usuario o password es incorrecto, <a href="login.html">vuelva a intenarlo</a>.<br/>';
                header("HTTP/1.1 302 Moved Temporary");
                header("Location: login.html");
            }else{
                // Guardo en la sesión el email del usuario.
                $_SESSION['username'] = $username;
     
                // Redirecciono al usuario a la página principal del sitio.
                //header("HTTP/1.1 302 Moved Temporary");
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: index.php");
            }

            /* cerrar la sentencia */
            mysqli_stmt_close($sentencia);
        }

        mysql_close($conn);
    }

?>