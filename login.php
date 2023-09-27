<?php
include("conexion.php");

// Inicializamos las variables para almacenar los valores del formulario.
$correo = "";
$nombre = "";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos los valores del formulario.
    $correo = $_POST["Correo"];
    $nombre = $_POST["Nombre"];

    // Crear una instancia de la clase Conexion
    $conexionBD = new Conexion();

    // Validar el formulario
    $validado = $conexionBD->validarRegistroDirectora($correo, $nombre);

    if ($validado) {
        // Si se encontraron coincidencias, permitir el acceso.
        $mensaje = "Acceso permitido.";
    } else {
        // Si no se encontraron coincidencias, mostrar un mensaje de error.
        $mensaje = "Acceso denegado. Los datos no existen en la base de datos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Acceso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Formulario de Acceso</h2>
    <?php if (!empty($mensaje)) : ?>
        <div class="alert <?php echo ($validado) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="Correo" name="Correo" aria-describedby="emailHelp" value="<?php echo $correo; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" name="Nombre" class="form-control" id="Nombre" value="<?php echo $nombre; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
</body>
</html>
