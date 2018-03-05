<?php /* script para conectarse a la base de datos master db */
	
	/* incluir script de parametros de conexion */
	include('parameters.php');
	
	class Conexion{

		/*metodo para conectar a la base de datos master */
		public function conectar_master(){
			$con = mysqli_connect(HOST,USER,PASS,DBMASTER);		
			return $con;	
		}

		/*metodo para conectar a la base de datos mycis kc */
		public function conectar_kc(){
			$con = mysqli_connect(HOST,USER,PASS,DBKC);		
			return $con;	
		}
		
		/*metodo para desconectarse de la base de datos*/
		public function desconectar(){
			mysqli_close($con);
		}
	}
	
?>