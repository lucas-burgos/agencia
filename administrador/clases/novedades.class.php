<?php
class novedades
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
    
    public function insertar_novedades($titulo,$novedad)
    {
        $this->db->enviarQuery("insert into novedades values (null, '$titulo','$novedad',current_date())");
    }
    
public function getNovedades() {
    $consulta = $this->db->enviarQuery("SELECT * from novedades order by fecha desc");
if ($consulta) {
    return $consulta;
}
else {
return false;
}
}

public function eliminar($id) {
    $eliminando = $this->db->enviarQuery("delete from novedades where id_novedad='$id'");
    if($eliminando) {
        return true;
    }
    else {
        return false;
    }
}

public function editar($id,$titulo,$novedad,$fecha) {
    $editando = $this->db->enviarQuery("UPDATE novedades SET titulo = '$titulo', novedad = '$novedad', fecha = '$fecha' where id_novedad='$id'");
    if($editando) {
        return true;
    }
    else {
        return false;
    }
}

public function getOneNovedades($id) {
    $consulta = $this->db->enviarQuery("SELECT * from novedades where id_novedad='$id'");
if ($consulta) {
    return $consulta;
}
else {
return false;
}
}

}
?>