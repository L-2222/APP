<?php

class Rol {

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    public function consultar(){
        $sql = "SELECT * FROM roles";
        $res = mysqli_query($this->conexion, $sql) or die("Error al consultar");

        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    }

    public function insertar($params){
        $sql = "INSERT INTO roles (NOMBRE) 
                VALUES ('$params->nombre')";

        mysqli_query($this->conexion, $sql) or die("Error al insertar");

        return ["resultado"=>"OK","mensaje"=>"Rol insertado"];
    }

    public function editar($id, $params){
        $sql = "UPDATE roles 
                SET NOMBRE='$params->nombre'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar");

        return ["resultado"=>"OK","mensaje"=>"Rol actualizado"];
    }

    public function eliminar($id){
        $sql = "DELETE FROM roles WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar");

        return ["resultado"=>"OK","mensaje"=>"Rol eliminado"];
    }

}
?>