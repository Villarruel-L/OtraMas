<?php
 $DB_HOST = 'localhost';
 $DB_USER = 'root';
 $dbpass = '';
 $DB_NAME = 'memorytest';
 /*
 try{
  $conexion = new PDO("mysql:host={$DB_HOST}; dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión realizada Satisfactoriamente";
      }
 
  catch(PDOException $e)
      {
      echo "La conexión ha fallado: " . $e->getMessage();
      }
*/
$conexion = new mysqli($DB_HOST,  $DB_USER ,  $dbpass,  $DB_NAME);
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
}
?>
