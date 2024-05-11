<?php
include 'conexion.php';

$nombre = $_POST["nombre"];
$tel = $_POST["telefono"];
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

if (empty($nombre) || empty($tel) || empty($calle) || empty($num_ext) || empty($col) || empty($descripcion)) {
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
	('$descripcion', '$')";

consulta($insertar);

// Cerrar conexión

mysqli_close($conexion);
exit;

?>
