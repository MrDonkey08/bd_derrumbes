<?php
include 'conexion.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tel = $_POST["telefono"];
$correo = $_POST["e-mail"];

$calle = $_POST["calle"];
$num_ext = $_POST["num_ext"];
$col = $_POST["colonia"];

$descripcion = $_POST["descripcion"];
$tipo_dano = $_POST["tipo-de-dano"];

function completar_campos() {
    echo '<script>
            alert("Por favor, completa todos los campos obligatorios");
            window.history.go(-1);
        </script>';
    mysqli_close($conexion);
    exit;
}

// Ejecutar consulta
function consulta($conexion, $insertar) {
	$resultado = mysqli_query($conexion, $insertar);

	if (!$resultado) {
		echo '<script>
				alert("Error de registro");
				window.history.go(-1);
			</script>';
	} else {
		echo '<script>
				alert("Registro efectuado");
				window.history.go(-1);
			</script>';
	}
}

// Validar datos

if (empty($nombre) || empty($apellido) || empty($tel) || empty($correo) || empty($calle) || empty($num_ext) || empty($col) || empty($descripcion) || empty($tipo_dano)) {
	completar_campos();
}

// Insertar campos

$insertar = "INSERT INTO Contacto (Nombre, Telefono) VALUES
	('$nombre', '$telefono')";

consulta($insertar);

$insertar = "INSERT INTO Direccion (Calle, Numero_exterior, Colonia, Tipo_de_Residencia)
	VALUES
	('$calle', '$num_ext')";

consulta($insertar);

$insertar = "INSERT INTO Derrumbe (Descripcion, Tipo_de_Dano) VALUES
	('$descripcion', '$tipo_dano')";

consulta($insertar);

// Cerrar conexión

mysqli_close($conexion);
exit;

?>
