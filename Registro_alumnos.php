<?php include ("conexion.php"); ?> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php 

if ($_POST) {

    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Pais = $_POST['Pais'];
    $Departamento = $_POST['Departamento'];
    $Teléfono = $_POST['Teléfono'];
    $Correo = $_POST['Correo'];
    $Edad = $_POST['Edad'];
    $Genero = $_POST['Genero'];

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro alumno</title>
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
                                        <h1>Registro De Alumnos</h1>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="Registro_alumnos.php" method="post" enctype="multipart/form-data">
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
                                                $sql = "INSERT INTO `registro alumno`(`ID`, `Nombre`, `Apellido`, `Pais`, `Departamento`,`Correo`, `Teléfono`,`Edad`,`Genero`) VALUES (Null,'$Nombre','$Apellido','$Pais','$Departamento','$Correo','$Teléfono','$Edad','$Genero');";
                                            
                                                $objconexion->ejecutar($sql);
                                                echo ("Elemento enviado");
                                        }else {
                                            echo ("Elemento No Enviado");
                                        }
                                        $objconexion =  new conexion();
                                        $resultado = $objconexion->consultar("SELECT * FROM `registro alumno`");
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
</html>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="Filtrar.js"></script>