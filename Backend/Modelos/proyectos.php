<?php

class Proyecto {

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    // 🔍 CONSULTAR
    public function consultar(){
        $sql = "SELECT * FROM proyectos";
        $res = mysqli_query($this->conexion, $sql) or die("Error al consultar proyectos");

        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    }

    // ➕ INSERTAR
    public function insertar($params){
        $sql = "INSERT INTO proyectos (NOMBRE, DESCRIPCION, FECHA_INICIO, FECHA_FIN)
                VALUES ('$params->nombre', '$params->descripcion', '$params->fecha_inicio', '$params->fecha_fin')";

        mysqli_query($this->conexion, $sql) or die("Error al insertar proyecto");

        return ["resultado"=>"OK","mensaje"=>"Proyecto insertado"];
    }

    // ✏️ EDITAR
    public function editar($id, $params){
        $sql = "UPDATE proyectos 
                SET NOMBRE='$params->nombre',
                    DESCRIPCION='$params->descripcion',
                    FECHA_INICIO='$params->fecha_inicio',
                    FECHA_FIN='$params->fecha_fin'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar proyecto");

        return ["resultado"=>"OK","mensaje"=>"Proyecto actualizado"];
    }

    // ❌ ELIMINAR
    public function eliminar($id){
        $sql = "DELETE FROM proyectos WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar proyecto");

        return ["resultado"=>"OK","mensaje"=>"Proyecto eliminado"];
    }

}
?>