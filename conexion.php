<?php
class Conexion {
    // Definimos las variables privadas que almacenan la información de conexión.
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $conexion;

    public function __construct() {
        try {
            // Aquí creamos una conexión PDO (PHP Data Objects) a la base de datos MySQL.
            // PDO es una extensión de PHP que permite interactuar con bases de datos de manera consistente.
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=colegio", $this->usuario, $this->contrasena);
            
            // Establecemos un atributo para manejar errores de manera más informativa.
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexión exitosa";
        } catch (PDOException $e) {
            // Si ocurre una excepción de PDO (un error relacionado con la base de datos) durante el intento de conexión,
            // arrojamos una excepción personalizada con el mensaje de error.
            echo "Falla de conexión: " . $e->getMessage();
        }
    }
    
    public function ejecutar($sql) {
        // El método ejecutar() se utiliza para ejecutar consultas SQL que modifican la base de datos (INSERT, UPDATE, DELETE).
        // Toma una consulta SQL como parámetro y la ejecuta utilizando la conexión PDO.
        $this->conexion->exec($sql);
        
        // Esta línea devuelve el último ID insertado después de realizar una consulta INSERT.
        return $this->conexion->lastInsertId();
    }
    
    public function ejecutarConsulta($sql) {
        // El método ejecutarConsulta() se utiliza para ejecutar consultas SQL que modifican la base de datos (INSERT, UPDATE, DELETE).
        // Toma una consulta SQL como parámetro y la ejecuta utilizando la conexión PDO.
        $stmt = $this->conexion->prepare($sql);
        
        // Ejecuta la consulta preparada.
        $stmt->execute();
        
        // Esta línea devuelve el último ID insertado después de realizar una consulta INSERT.
        return $this->conexion->lastInsertId();
    }
    
    public function consultar($sql) {
        // El método consultar() se utiliza para ejecutar consultas SQL que recuperan datos de la base de datos.
        // Toma una consulta SQL como parámetro y la prepara utilizando la conexión PDO.
        $sentencia = $this->conexion->prepare($sql);
        
        // Ejecuta la sentencia preparada.
        $sentencia->execute();
        
        // fetchAll() obtiene todas las filas del conjunto de resultados en un array.
        // Devuelve un array que contiene todas las filas devueltas por la consulta.S
        return $sentencia->fetchAll();
    }
    public function validarRegistroDirectora($correo, $nombre) {
        $sql = "SELECT * FROM `registro directoras` WHERE Correo = :Correo AND Nombre = :Nombre";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':Correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':Nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
    
        return ($count > 0); // Devolver true si se encontraron coincidencias, false de lo contrario
    }
    
    

}


try {
    $conexion = new Conexion();
    // Aquí puedes realizar otras operaciones con la conexión.
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
