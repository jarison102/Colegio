<?php include('conexion.php');?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php 

if($_POST){
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Pais = $_POST['Pais'];
    $Departamento = $_POST['Departamento'];
    $Correo = $_POST['Correo'];
    $Teléfono = $_POST['Teléfono'];
    $Edad = $_POST['Edad'];
    $Genero = $_POST['Genero'];

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-8">
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    <center>
                                        <h1>Registro de Directores</h1>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="Registro_Directores.php" method="post" enctype="multipart/form-data">
                                        <br>
                                        Ingresa Tu Nombre:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarison" name="Nombre" id="Nombre" value="">
                                        <br>
                                        Ingresa Tu Apellido:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Cespedes" name="Apellido" id="Apellido" value="">
                                        <br>
                                        Ingresa Tu Pais:
                                        <br>
                                        <label for="Pais">País:</label>
                                        <input type="text" class="form-control" placeholder="Colombia" name="Pais" id="Pais" value="" oninput="actualizarDepartamentos()" required>
                                        <br>
                                        Ingresa Tu Departamento:
                                        <br>
                                        <label for="Departamento">Departamento:</label>
                                        <select id="Departamento" name="Departamento" class="form-control">
                                            <!-- Aquí se llenarán los departamentos automáticamente -->
                                        </select>
                                        Ingresa Tu Correo:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarimices@gmail.com" name="Correo" id="Correo" value="">
                                        <br>
                                        Ingresa Tu Teléfono:
                                        <br>
                                        <input type="text" class="form-control" placeholder="3216692365" name="Teléfono" id="Teléfono" value="">
                                        <br>
                                        Ingresa Tu Edad:
                                        <br>
                                        <input type="text" class="form-control" placeholder="15" name="Edad" id="Edad" value="">
                                        <br>
                                        Ingresa Tu Genero:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Masculino" name="Genero" id="Genero" value="">
                                        <br>
                                        <button type="submit" class="btn btn-success">Enviar </button> <?php  if($Nombre && $Apellido && $Pais && $Departamento && $Correo && $Teléfono && $Edad && $Genero){
                                                $objconexion =  new conexion();
                                                $sql = "INSERT INTO `registro directoras`(`ID`, `Nombre`, `Apellido`, `Pais`, `Departamento`,`Correo`, `Teléfono`,`Edad`,`Genero`) VALUES (Null,'$Nombre','$Apellido','$Pais','$Departamento','$Correo','$Teléfono','$Edad','$Genero');";
                                            
                                                $objconexion->ejecutar($sql);
                                                echo ("Elemento enviado");
                                        }else {
                                            echo ("Elemento No Enviado");
                                        }
                                        $objconexion =  new conexion();
                                        $resultado = $objconexion->consultar("SELECT * FROM `registro directoras`");
                                        //print_r($resultado);
                                        ?>
                                    </form>
                                    <br>
                                    <form action="./index.php" method="post">
                                        <button type="submit" class="btn btn-Warning">Volver</button>
                                    </form>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
</body>
<script src="Filtrar.js"></script>
</html>