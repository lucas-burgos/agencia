<?php
class telefono
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
    
    public function insertar_telefono($telefono)
    {
        $this->db->enviarQuery("insert into telefono values (null, '$telefono')");
    }
    
public function getTelefonos() {
    $consulta = $this->db->enviarQuery("SELECT * from telefono");
if ($consulta) {
    return $consulta;
}
else {
return false;
}
}

public function eliminar($id) {
    $eliminando = $this->db->enviarQuery("delete from telefono where id_tel='$id'");
    if($eliminando) {
        return true;
    }
    else {
        return false;
    }
}

public function editar($id,$telefono) {
    $editando = $this->db->enviarQuery("UPDATE telefono SET telefono = '$telefono' where id_tel='$id'");
    if($editando) {
        return true;
    }
    else {
        return false;
    }
}

public function getOneTelefono($id) {
    $consulta = $this->db->enviarQuery("SELECT * from telefono where id_tel='$id'");
if ($consulta) {
    return $consulta;
}
else {
return false;
}
}

}
?>