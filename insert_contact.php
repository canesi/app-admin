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
    $nombre = $_POST['name'];
    $empresa = $_POST['empresa'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$mensaje = $_POST['message'];
	

	/* comprobar la conexión */
	if (mysqli_connect_errno()) {
		echo "Fallo la conexion a la Base de datos";
		exit();
	}else{
		
		$time = time();
		
		$fecha = date("Y-m-d H:i:s", $time);

		$query ="insert into contact (nombre,empresa,direccion,telefono,correo,mensaje,fecha,status) values ('$nombre','$empresa','$direccion','$telefono','$email','".$mensaje."','$fecha','0')";

		mysqli_query($conn,$query);

        echo "<script>
		alert('Gracias, los datos ingresados han sido enviados con exito, pronto nos comunicaremos contigo!');
		window.location.href='http://localhost:81/canesi/';
		</script>";   
	}

	mysqli_close($conn);
?>
