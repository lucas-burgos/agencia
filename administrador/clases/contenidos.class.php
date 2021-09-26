<?php
class contenidos
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
    
    public function insertar_contenido($titulo,$descripcion_pagina,$descripcion_logo,$logo,$sobre_nosotros)
    {
        $this->db->enviarQuery("insert into contenido values (null, '$titulo','$descripcion_pagina','$descripcion_logo','$logo','$sobre_nosotros')");
    }
    
public function getContenidos() {
    $consulta = $this->db->enviarQuery("SELECT * from contenido");
if ($consulta) {
    return $consulta;
}
else {
return false;
}
}

public function eliminar($id) {
    $eliminando = $this->db->enviarQuery("delete from contenido where id_cont='$id'");
    if($eliminando) {
        return true;
    }
    else {
        return false;
    }
}

public function editar($id,$titulo,$descripcion_pagina,$descripcion_logo,$logo,$sobre_nosotros) {
    $editando = $this->db->enviarQuery("UPDATE contenido SET titulo = '$titulo', descripcion_pagina = '$descripcion_pagina', descripcion_logo = '$descripcion_logo', logo = '$logo', sobre_nosotros = '$sobre_nosotros' where id_cont='$id'");
    if($editando) {
        return true;
    }
    else {
        return false;
    }
}

public function getOneContenido($id) {
    $consulta = $this->db->enviarQuery("SELECT * from contenido where id_cont='$id'");
if ($consulta) {
    return $consulta;
}
else {
return false;
}
}


}
?>