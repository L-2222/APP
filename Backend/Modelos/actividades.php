<?php

class Actividad {

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    // 🔍 CONSULTAR
    public function consultar(){
        $sql = "SELECT * FROM actividades";
        $res = mysqli_query($this->conexion, $sql) or die("Error al consultar actividades");

        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    }

    // ➕ INSERTAR
    public function insertar($params){
        $sql = "INSERT INTO actividades (NOMBRE, DESCRIPCION, ID_FASE)
                VALUES ('$params->nombre', '$params->descripcion', '$params->id_fase')";

        mysqli_query($this->conexion, $sql) or die("Error al insertar actividad");

        return ["resultado"=>"OK","mensaje"=>"Actividad insertada"];
    }

    // ✏️ EDITAR
    public function editar($id, $params){
        $sql = "UPDATE actividades 
                SET NOMBRE='$params->nombre',
                    DESCRIPCION='$params->descripcion',
                    ID_FASE='$params->id_fase'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar actividad");

        return ["resultado"=>"OK","mensaje"=>"Actividad actualizada"];
    }

    // ❌ ELIMINAR
    public function eliminar($id){
        $sql = "DELETE FROM actividades WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar actividad");

        return ["resultado"=>"OK","mensaje"=>"Actividad eliminada"];
    }

}
?>
