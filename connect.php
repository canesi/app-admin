<?php /* script para conectarse a la base de datos master db */
	
	/* incluir script de parametros de conexion */
	include('parameters.php');
	
	class Conexion{

		/*metodo para conectar a la base de datos master */
		public function conectar(){
			$con = mysqli_connect(HOST,USER,PASS,DB);		
			return $con;	
		}

		public function desconectar(){
			$con = mysqli_connect(HOST,USER,PASS,DB);	
			mysql_close($con);
		}
	}
	
?>