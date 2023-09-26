<?php include ("conexion.php"); ?> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php 

if ($_POST) {

    $Materia = $_POST['Materia'];

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
                                        <h1>Registro Materia</h1>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="Registro_Materias.php" method="post" enctype="multipart/form-data">
                                        <br>
                                        Ingresa Tu Materia:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Ingles" name="Materia" id="Materia" value="">
                                        <br>
                                        <button type="submit" class="btn btn-success">Enviar </button> <?php  if($Materia){
                                                $objconexion =  new conexion();
                                                $sql = "INSERT INTO `registro materias`(`ID`, `Materia`) VALUES (Null,'$Materia');";
                                            
                                                $objconexion->ejecutar($sql);
                                                echo ("Elemento enviado");
                                        }else {
                                            echo ("Elemento No Enviado");
                                        }
                                        $objconexion =  new conexion();
                                        $resultado = $objconexion->consultar("SELECT * FROM `registro materias`");
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