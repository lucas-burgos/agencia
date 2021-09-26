<?php
class usuarios
{
    private $db;
    
    public function __construct($base)
    {
        $this->db = $base;
    }
    
    public function __destruct()
    {
        $this->db = null;
    }
    
    public function insertar_usuario($usuario, $clave)
    {
        $this->db->enviarQuery("insert into usuarios values (null, 		'$usuario','$clave')");
    }

    public function verificar_usuario($usuario, $clave)
    {
        $consulta = $this->db->enviarQuery("SELECT * from usuarios where usuario='$usuario'");
        if ($consulta) {
            $iguales = password_verify($clave, $consulta[0]['clave']);
            if ($iguales) {
                $_SESSION['usuario'] = $consulta[0]['usuario'];
            } else {
                echo 'Usuario o contraseña no válidos';
            }
        }
    }

public function getUsuarios() {
    $consulta = $this->db->enviarQuery("SELECT * from usuarios");
    if ($consulta) {
        ?>
<table class="table table-bordered table-inverse table-responsive">
	<thead class="thead-inverse">
		<tr>
			<th>Usuario</th>
			<th>Acciones</th>
		</tr>
		</thead>
		<tbody>
			<?php
                    for ($i=0;$i<count($consulta);$i++) {
                        ?>
		<tr>
				<td scope="row"><?php echo $consulta[$i]['usuario']; ?></td>
				<td><?php         echo '<a href="usuarios.php?editar&id='.$consulta[$i]['id_us'].'">Editar Usuario</a>';
        echo '<a href="usuarios.php?eliminar&id='.$consulta[$i]['id_us'].'">Eliminar Usuario</a>';
 ?></td>
			</tr>
<?php
                    } ?>
		</tbody>
</table>
<?php
    }
}

public function eliminar($id) {
    $eliminando = $this->db->enviarQuery("delete from usuarios where id_us='$id'");
    if($eliminando) {
        return true;
    }
    else {
        return false;
    }
}

public function editar($id,$usuario,$clave) {
    $editando = $this->db->enviarQuery("UPDATE usuarios SET usuario = '$usuario', clave = '$clave' where id_us='$id'");
    if($editando) {
        return true;
    }
    else {
        return false;
    }
}

public function getOneUsuario($id) {
    $consulta = $this->db->enviarQuery("SELECT * from usuarios where id_us='$id'");
if ($consulta) {
    return $consulta;
}
else {
return false;
}
}

}
?>