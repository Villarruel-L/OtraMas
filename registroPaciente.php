<?php
session_start();
/*CONEXION */
require 'dbconfig.php';
//comprobar que no tenga mas de 10 pacientes
$limitePaciente=true;
$stmt = $conexion->prepare("SELECT * FROM paciente WHERE `investigador_idInvestigador` LIKE ? ");
$stmt->bind_param("i",$_SESSION['logged_in_user_id']);
$result = $stmt->execute();
$stmt->store_result();  
if ($result) {
    $row_cnt = $stmt->num_rows;
    if($row_cnt >= 10){
        echo '<p>Se han detectado mas de 10 pacientes registrados con su cuenta. No se puede tener mas.</p>'; //cambiar texto
        $stmt->close();
        $limitePaciente=false;
    }
}else{echo "problema con consulta de Cantidad_Pacientes";$stmt->close();}


if((session_status() === PHP_SESSION_ACTIVE) AND $limitePaciente){
    

/* REGISTRO */
//guardar variables sin sanitizar
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $ciudad = $_POST['ciudad'];
    $correo = $_POST['correo'];
    $password = $_POST['psw']; 
    $sexo = $_POST['gender'];
    /*Alguito*/
    function correoDisponible($comprobarCorreo,$con){
        $stmt = $con->prepare("SELECT `correo` FROM paciente_login WHERE `correo` LIKE ? ");
        $stmt->bind_param("s",$comprobarCorreo);
        $result = $stmt->execute();
        $stmt->store_result();  
        if ($result) {
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
        //password en la base de datos tiene solo una S.
 
        $stmt = $conexion->prepare("INSERT INTO paciente_login (`nombre`, `correo`, `pasword`,`ultimaConexion`) VALUES (?,?, AES_ENCRYPT(?,'thegame'),NOW())"); 
        $stmt->bind_param("sss",$nombre, $correo, $password_hash);
        $stmt->execute();
        $stmt->close();

        $recover =  $conexion->prepare("SELECT idPaciente_login FROM paciente_login WHERE correo LIKE ? LIMIT 1");
        $recover->bind_param("s",$correo);
        $recover->execute();
        $recover->store_result();
        $recover->bind_result($id);
        $idP=0;
        while($recover->fetch()){
            $idP = $id;
        }
        //Unas ganas de cambiarme a administracion de empresas.
        if($stmt2 = $conexion->prepare("INSERT INTO paciente (`paciente_login_idPaciente_login`, `investigador_ifk_idInvestigador_login`, `nombre`, `apellidoPaterno`, `correoE`, `ciudad`, `investigador_idInvestigador`,`sexo`, `fechaNacimiento`) 
            VALUES (?,?,?,?,?,?,?,?,?)")){
               

            $stmt2->bind_param("iissssiss",$idP,$_SESSION['logged_in_user_id'],$nombre, $apellidoP, $correo, $ciudad,$_SESSION['logged_in_user_id'],$sexo, $fechaNacimiento);
             $stmt2->execute();
            echo '<p class="success">Registro exitoso!</p>';
            $stmt2->close();
        } else{
                print "Error al preparar insersion";
        }
        
    }else{
        echo '<p class="error">Eliga un correo diferente</p>';
    }
    $conexion->close();
    
    
}else{
    print "No Se ha iniciado sesión (no vay 'logged_in_user_id')";
}
?>