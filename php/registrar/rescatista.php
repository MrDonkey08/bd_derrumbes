<?php
include '../conexion.php';

$nombre = $_POST["nombre-2"];
$apellido = $_POST["apellido-2"];
$tel = $_POST["telefono-2"];
$correo = $_POST["e-mail-2"];

function consulta($conexion, $query) {
    if (!mysqli_query($conexion, $query)) {
        echo '<script>
                alert("Error de registro");
                window.history.go(-2);
            </script>';
    }
}

// Insertar campos
// Contacto
$insertar_contacto = "INSERT INTO Rescatista (Nombre, Apellido, Telefono, Correo) VALUES ('$nombre', '$apellido', '$tel', '$correo')";
consulta($conexion, $insertar_contacto);
$id_contacto = mysqli_insert_id($conexion);


mysqli_close($conexion);

echo '<script>
		alert("Registro efectuado");
		window.history.go(-2);
	</script>';
?>
