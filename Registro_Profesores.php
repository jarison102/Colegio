<?php include("conexion.php");?>

<?php 
if($_POST){
    $Nombre=$_POST['Nombre'];
    $Apellido=$_POST['Apellido'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];
    $Materia=$_POST['Materia'];
    
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
    <form action="Registro_Profesores.php" method="post" enctype="multipart/form-data">
        <label for="">Escribe tu Nombre</label>
        <br>
        <input type="text" name="Nombre" id="Nombre">
        <br>
        <label for="">Escribe tu Apellido</label>
        <br>
        <input type="text" name="Apellido" id="Apellido">
        <br>
        <label for="">Escribe tu Numero</label>
        <br>
        <input type="text" name="Numero" id="Numero">
        <br>
        <label for="">Escribe tu Correo</label>
        <br>
        <input type="text" name="Correo" id="Correo">
        <br>
        <label for="">Escribe tu Materia</label>
        <br>
        <input type="text" name="Materia" id="Materia">
        <br>
        <button type="submit" class="btn btn-success">Enviar </button> <?php  if($Nombre && $Apellido && $Numero && $Correo && $Materia){
                                                $objconexion =  new conexion();
                                                $sql = "INSERT INTO `registro profesores`(`ID`, `Nombre`, `Apellido`, `Numero`, `Correo`,`Materia`) VALUES (Null,'$Nombre','$Apellido','$Numero','$Correo','$Materia');";
                                            
                                                $objconexion->ejecutar($sql);
                                                echo ("Elemento enviado");
                                        }else {
                                            echo ("Elemento No Enviado");
                                        }
                                        $objconexion =  new conexion();
                                        $resultado = $objconexion->consultar("SELECT * FROM `registro profesores`");
                                        //print_r($resultado);
                                        ?>
    </form>
</body>
</html>