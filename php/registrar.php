<?php
include 'conexion.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tel = $_POST["telefono"];
$correo = $_POST["e-mail"];

$calle = $_POST["calle"];
$num_ext = (int)$_POST["num-ext"];
$col = $_POST["colonia"];

$descripcion = $_POST["descripcion"];
$tipo_dano = $_POST["tipo-de-dano"];


function consulta($conexion, $query) {
	echo("Fuck");
    if (!mysqli_query($conexion, $query)) {
        echo '<script>
                alert("Error de registro");
                window.history.go(-1);
            </script>';
    }
	echo(" you");
}

// Insertar campos
$insertar_contacto = "INSERT INTO Contacto (Nombre, Apellido, Telefono, Correo) VALUES ('$nombre', '$apellido', '$tel', '$correo')";
consulta($conexion, $insertar_contacto);
$id_contacto = mysqli_insert_id($conexion);

$insertar_direccion = "INSERT INTO Direccion (Calle, Numero_exterior, Colonia) VALUES ('$calle', '$num_ext', '$col')";
consulta($conexion, $insertar_direccion);
$id_direccion = mysqli_insert_id($conexion);

$insertar_derrumbe = "INSERT INTO Derrumbe (Descripcion, Tipo_de_Dano, ID_Contacto, ID_Direccion) VALUES ('$descripcion', '$tipo_dano', '$id_contacto', '$id_direccion')";
consulta($conexion, $insertar_derrumbe);

mysqli_close($conexion);

echo '<script>
		alert("Registro efectuado");
		window.history.go(-1);
	</script>';
?>
