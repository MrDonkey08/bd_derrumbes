<?php
include 'conexion.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tel = $_POST["telefono"];
$correo = $_POST["e-mail"];

$municipio =$_POST["municipio"];
$estado = $_POST["estado"];

$calle = $_POST["calle"];
$num_ext = (int)$_POST["num-ext"];
$col = $_POST["colonia"];

$descripcion = $_POST["descripcion"];
$tipo_dano = $_POST["tipo-de-dano"];


function consulta($conexion, $query) {
    if (!mysqli_query($conexion, $query)) {
        echo '<script>
                alert("Error de registro");
                window.history.go(-1);
            </script>';
    }
}

// Insertar campos
// Contacto
$insertar_contacto = "INSERT INTO Contacto (Nombre, Apellido, Telefono, Correo) VALUES ('$nombre', '$apellido', '$tel', '$correo')";
consulta($conexion, $insertar_contacto);
$id_contacto = mysqli_insert_id($conexion);

// Ubicación
$insertar_ubicacion = "INSERT INTO Ubicacion (Enlace) VALUES (NULL)";
consulta($conexion, $insertar_ubicacion);
$id_ubicacion = mysqli_insert_id($conexion);

// Municipio
$insertar_municipio = "INSERT INTO Municipio (Nombre) VALUES ('$municipio')";
consulta($conexion, $insertar_municipio);
$id_municipio = mysqli_insert_id($conexion);

// Estado
$insertar_estado = "INSERT INTO Estado (Nombre) VALUES ('$estado')";
consulta($conexion, $insertar_estado);
$id_estado = mysqli_insert_id($conexion);

// Dirección
$insertar_direccion = "INSERT INTO Direccion (Calle, Numero_exterior, Colonia, ID_Ubicacion, ID_Municipio, ID_Estado) VALUES ('$calle', '$num_ext', '$col', '$id_ubicacion', '$id_municipio', '$id_estado')";

consulta($conexion, $insertar_direccion);
$id_direccion = mysqli_insert_id($conexion);

// Derrumbe
$insertar_derrumbe = "INSERT INTO Derrumbe (Descripcion, Tipo_de_Dano, ID_Contacto, ID_Direccion) VALUES ('$descripcion', '$tipo_dano', '$id_contacto', '$id_direccion')";
consulta($conexion, $insertar_derrumbe);

mysqli_close($conexion);

echo '<script>
		alert("Registro efectuado");
		window.history.go(-1);
	</script>';
?>
