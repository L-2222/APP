<?php

class Area {

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    // 🔍 CONSULTAR
    public function consultar(){
        $sql = "SELECT * FROM areas";
        $res = mysqli_query($this->conexion, $sql) or die("Error al consultar áreas");

        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    }

    // ➕ INSERTAR
    public function insertar($params){
        $sql = "INSERT INTO areas (NOMBRE) 
                VALUES ('$params->nombre')";

        mysqli_query($this->conexion, $sql) or die("Error al insertar área");

        return ["resultado"=>"OK","mensaje"=>"Área insertada"];
    }

    // ✏️ EDITAR
    public function editar($id, $params){
        $sql = "UPDATE areas 
                SET NOMBRE='$params->nombre'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar área");

        return ["resultado"=>"OK","mensaje"=>"Área actualizada"];
    }

    // ❌ ELIMINAR
    public function eliminar($id){
        $sql = "DELETE FROM areas WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar área");

        return ["resultado"=>"OK","mensaje"=>"Área eliminada"];
    }

}
?>