<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php include ("conexion.php"); ?> 

<?php 

if($_POST){
 $Nombre_Estudiante=$_POST['Estudiante'];
 $Nombre_Profesor = $_POST['Profesor'];
 $Materia = $_POST['Materia'];
}


?>

<?php 

//consultar datos de la base de datos
$objconexion =  new conexion();
$resultado = $objconexion->consultar("SELECT Materia FROM `registro materias`");
$resultado = $objconexion->consultar("SELECT * FROM `registro profesores`");

//print_r($resultado);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" action="Asignacion_de_clase.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Estudiante</label>
    <input type="Estudiante" class="form-control" id="Estudiante" name="Estudiante" aria-describedby="emailHelp" placeholder="Nombre" >
    <small id="emailHelp" class="form-text text-muted">Tienes que estar Registrado</small>
  </div>
  <div class="form-group">
    <label for="Profesor">Nombre Profesor</label>
    <select name="Profesor" id="Profesor" class="form-control">
      <?php 
      foreach($resultado as $nombres):?>
      <option value="<?php echo $nombres['Nombre']; ?>"><?php echo $nombres['Nombre']; ?></option>
                <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="Materia">Materia</label>
    <select class="form-control" name="Materia" id="Materia">
    <?php foreach($resultado as $materias):?>
        <option value="<?php echo $materias['Materia']; ?>"><?php echo $materias['Materia']; ?></option>
                <?php endforeach; ?>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
  <?php  if($Nombre_Estudiante && $Nombre_Profesor && $Materia){
                                                $objconexion =  new conexion();
                                                $sql = "INSERT INTO `asignación de clases`(`ID`, `Nombre Estudiante`, `Materia`, `Nombre Profesor`) VALUES (Null,'$Nombre_Estudiante','$Nombre_Profesor','$Materia');";
                                            
                                                $objconexion->ejecutar($sql);
                                                echo ("Elemento enviado");
                                        }else {
                                            echo ("Elemento No Enviado");
                                        }
                                        $objconexion =  new conexion();
                                        $resultado = $objconexion->consultar("SELECT * FROM `asignación de clases`");
                                        //print_r($resultado);
                                        ?>

</form>
</body>
</html>