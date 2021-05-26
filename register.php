<?php 
if(isset($_SESSION["autentificado"])){
     header("Location: cuenta.php");
}?>
<?php

/*CONEXION */
require 'dbconfig.php';
if(isset($_POST['correo'])){

/* REGISTRO */
//guardar variables sin sanitizar
    $nombre = $_POST['nombre'];
    $institucion = $_POST['institucion'];
    $password = $_POST['password']; 
    $correo = $_POST['correo'];

    /*Alguito*/
    function correoDisponible($comprobarCorreo,$con){
        $stmt = $con->prepare("SELECT `correo` FROM investigador_login WHERE `correo` LIKE ? ");
        $stmt->bind_param("s",$correo);
        $result = $stmt->execute();
        if ($result) {
            // determinar el número de filas del resultado 
            $row_cnt = $stmt->num_rows;
            if($row_cnt == 1){
                echo '<p class="error">Ya existe ese correo en la base de datos</p>'; //cambiar texto
                $stmt->close();
                return false;
            } else {
                $stmt->close();
                return true;
            }
        }else{
            echo "error al buscar el correo en la base de datos";
            return false;
        }       
    }
        //comprobar que correo y el usuario no estén en uso      
    if (correoDisponible($correo,$conexion)){

        $password_hash = password_hash($password, PASSWORD_BCRYPT); //encriptado con Bcrypt 
        $fecha=NOW();
        $stmt = $conexion->prepare("INSERT INTO investigador_login (`nombre`, `institucion`, `correo`, `pasword`,`ultimaConexion`) VALUES (?, ?,?, AES_ENCRYPT(?,'".$dbpass."'),?)"); 
        $stmt->bind_param("sssss", $nombre, $institucion, $correo, $password_hash,$fecha);
    
        $sePudo = $stmt->execute();
        
        if ($sePudo) {
            echo '<p class="success">Registro exitoso!</p>';
        } else {
            echo '<p class="error">Algo ha salido mal durante la insercion de los datos en la base de datos, intentelo de nuevo!</p>';
        }
    }else{
        echo '<p class="error">Eliga uno diferente</p>';
    }
    $conexion->close();
    
    
}else{
    print "No se detectaron parametros";
}
?>