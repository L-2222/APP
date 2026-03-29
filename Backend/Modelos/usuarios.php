<?php

class usuarios{

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    // 🔍 CONSULTAR
    public function consultar(){
    $sql = "SELECT u.ID, u.NOMBRE, u.EMAIL,
                   r.NOMBRE AS ROL,
                   a.NOMBRE_AREA AS AREA
            FROM usuarios u
            INNER JOIN roles r ON u.ID_ROL = r.ID
            INNER JOIN areas a ON u.ID_AREA = a.ID_AREA";

    $res = mysqli_query($this->conexion, $sql) or die("Error en consulta");

    $vec = [];

    while($row = mysqli_fetch_assoc($res)){
        $vec[] = $row;
    }

    return $vec;
}

    // ✏️ EDITAR
    public function editar($id, $params){
        $sql = "UPDATE usuarios 
                SET NOMBRE='$params->nombre', EMAIL='$params->email'
                WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al editar");

        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "Usuario actualizado";

        return $vec;
    }

    // ❌ ELIMINAR
    public function eliminar($id){
        $sql = "DELETE FROM usuarios WHERE ID=$id";

        mysqli_query($this->conexion, $sql) or die("Error al eliminar");

        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "Usuario eliminado";

        return $vec;
    }

}
?>