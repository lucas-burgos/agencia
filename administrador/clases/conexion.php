<?php
class BaseDeDatosmysqli{
	private $conexion;
	public $error;
	
	public function __construct($servidor,$usuario,$password,$base){
		if (!$this->_connect($servidor,$usuario,$password,$base)){
		}
	}
	
	public function __destruct(){
		$this->conexion= null;
	}
	
	private function _connect($servidor,$usuario,$password,$base){
try {
    $dsn = "mysql:host=$servidor;dbname=$base";
		$this->conexion = new PDO($dsn, $usuario, $password);
    $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
}

	}
	
	public function enviarQuery($query){
		$tipo = strtoupper(substr($query,0,6));
		
		switch ($tipo){
			case 'SELECT':
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
					
				if (!$resultado){
					$this->error = $this->conexion->error;
					return false;
				}
				else{
					while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
						$array_resultado[] = $fila;
					}
					return $array_resultado;
				

				}
				break;
			case 'INSERT':
				$resultado = $this->conexion->prepare($query);
				if (!$resultado){
					$this->error = $this->conexion->error;
					return false;
				}
				else{
$resultado->execute();
				}
				break;
			case 'UPDATE':				
			case 'DELETE':
				$resultado = $this->conexion->prepare($query);
$resultado->execute();

				if (!$resultado){
					$this->error = $this->conexion->error;
					return false;
				}
				else{
$resultado->execute();
				}		
				break;
			default:
				$this->error = "Tipo de consulta no permitida";
		}
	}
	
}
?>