<?php
$conexion = mysqli_connect("localhost", "root", "", "derrumbes");

if (!$conexion) {
	echo 'No se pudo conectar a la Base de Datos';
} else{
	echo 'Conexión exitosa';
}
?>
