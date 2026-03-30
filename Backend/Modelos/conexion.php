<?php
$conn = new mysqli("localhost", "root", "", "gestor_adm");

if($conn->connect_error){
    die("Error de conexión");
}else{  
    echo "conexion exitosa";
}
?>
