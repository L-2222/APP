<?php

class GestionProyecto {

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    // 🔍 CONSULTAR
    public function consultar(){
        $sql = "SELECT * FROM gestion_proyecto";
        $res = mysqli_query($this->conexion, $sql) or die("Error al consultar gestión de proyecto");

        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    }

    // ➕ INSERTAR
    public function insertar($params){
        $sql = "INSERT INTO gestion_proyecto (ID_PROYECTO, ID_USUARIO, ESTADO)
                VALUES ('$params->id_proyecto', '$params->id_usuario', '$params->estado')";

        mysqli_query($this->conexion, $sql) or die("Error al insertar gestión");

        return ["resultado"=>"OK","mensaje"=>"Gestión insertada"];
    }

    // ✏️ EDITAR
    public function editar($id, $params){
        $sql = "UPDATE gestion_proyecto 
                SET ID_PROYECTO='$params->id_proyecto',
                    ID_USUARIO='$params->id_usuario',
                    ESTADO='$params->estado'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar gestión");

        return ["resultado"=>"OK","mensaje"=>"Gestión actualizada"];
    }

    // ❌ ELIMINAR
    public function eliminar($id){
        $sql = "DELETE FROM gestion_proyecto WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar gestión");

        return ["resultado"=>"OK","mensaje"=>"Gestión eliminada"];
    }

}
?>