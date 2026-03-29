<?php

class Fase {

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    // 🔍 CONSULTAR
    public function consultar(){
        $sql = "SELECT * FROM fases";
        $res = mysqli_query($this->conexion, $sql) or die("Error al consultar fases");

        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    }

    // ➕ INSERTAR
    public function insertar($params){
        $sql = "INSERT INTO fases (NOMBRE, ID_PROYECTO)
                VALUES ('$params->nombre', '$params->id_proyecto')";

        mysqli_query($this->conexion, $sql) or die("Error al insertar fase");

        return ["resultado"=>"OK","mensaje"=>"Fase insertada"];
    }

    // ✏️ EDITAR
    public function editar($id, $params){
        $sql = "UPDATE fases 
                SET NOMBRE='$params->nombre',
                    ID_PROYECTO='$params->id_proyecto'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar fase");

        return ["resultado"=>"OK","mensaje"=>"Fase actualizada"];
    }

    // ❌ ELIMINAR
    public function eliminar($id){
        $sql = "DELETE FROM fases WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar fase");

        return ["resultado"=>"OK","mensaje"=>"Fase eliminada"];
    }

}
?>