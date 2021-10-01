<?php

class Comentario{
	private $db;
	
	public function __construct($base){
		$this->db = $base; 
	}
	
	public function __destruct() {
		$this->db = null;
	}
	
	public function insertar_comentario($nombre,$email,$comentario){
		$this->db->enviarQuery("insert into librovisitas values (null, '$nombre', '$email', '$comentario', current_date())");
	}
	
	private function get_comentarios($desde,$cantidad){
		$comentarios = $this->db->enviarQuery("select * from librovisitas order by fecha desc limit ".$desde." ,  ".$cantidad);
		
		if ($comentarios){
			echo '<table border="1">
					<tr>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Comentario</td>
						<td>Fecha</td>
					</tr>';
			for ($i=0;$i<count($comentarios);$i++){
			
				echo '<tr>
						<td>'.$comentarios[$i]['nombre'].'</td>
						<td>'.$comentarios[$i]['apellido'].'</td>
						<td>'.$comentarios[$i]['comentario'].'</td>
						<td>'.$comentarios[$i]['fecha'].'</td>
					</tr>';
			}
			echo '</table>';
		}
		else{
			echo 'Aun no hay comentarios ingresados';
		}
	}
	
	public function paginado($total_prod_x_pag){
		$datos = $this->db->enviarQuery("select count(*) from librovisitas");
		//var_dump($datos);
		$total_productos = $datos[0]['count(*)'];
		$total_pags = ceil($total_productos / $total_prod_x_pag);
		
		for ($i=0;$i<$total_pags;$i++){
			$proddesde = $i * $total_prod_x_pag;
			$nro_pag = $i + 1;
			echo '<a href="inicio.php?desde='.$proddesde.'">['.$nro_pag.']</a> - ';
		}
		
		if (!isset($_GET['desde'])){
			echo 'Página 1 de '.$total_pags;
			$this->get_comentarios (0, $total_prod_x_pag);
		}
		else{
			$pag = ($_GET['desde'] + $total_prod_x_pag)/ $total_prod_x_pag;
			echo 'Página '.$pag.' de '.$total_pags;
			$this->get_comentarios ($_GET['desde'], $total_prod_x_pag);
		}
		
	}
}

?>