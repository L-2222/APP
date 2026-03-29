<?php

class Documento {

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    // 🔍 CONSULTAR
    public function consultar(){
        $sql = "SELECT * FROM documentos";
        $res = mysqli_query($this->conexion, $sql) or die("Error al consultar documentos");

        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    }

    // ➕ INSERTAR
    public function insertar($params){
        $sql = "INSERT INTO documentos (NOMBRE, RUTA, ID_PROYECTO)
                VALUES ('$params->nombre', '$params->ruta', '$params->id_proyecto')";

        mysqli_query($this->conexion, $sql) or die("Error al insertar documento");

        return ["resultado"=>"OK","mensaje"=>"Documento insertado"];
    }

    // ✏️ EDITAR
    public function editar($id, $params){
        $sql = "UPDATE documentos 
                SET NOMBRE='$params->nombre',
                    RUTA='$params->ruta',
                    ID_PROYECTO='$params->id_proyecto'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar documento");

        return ["resultado"=>"OK","mensaje"=>"Documento actualizado"];
    }

    // ❌ ELIMINAR
    public function eliminar($id){
        $sql = "DELETE FROM documentos WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar documento");

        return ["resultado"=>"OK","mensaje"=>"Documento eliminado"];
    }

}
?>