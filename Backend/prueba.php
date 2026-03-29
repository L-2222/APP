<?php
include("Modelos/conexion.php");
include("Modelos/usuarios.php");

$usuario = new usuarios($conn);

$data = $usuario->consultar();

echo json_encode($data);

?>