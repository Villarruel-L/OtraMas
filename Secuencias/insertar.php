
<?php
//Faltan las imagenes
error_reporting( ~E_NOTICE ); 
require_once "C:/xampp/htdocs/TestLiveSegundoAvance/dbconfig.php";
if(isset($_POST['nombreS']))
{
  	$nombre = $_POST['nombreS'];
	$limiteSecuencia=true;
	$stmt = $conexion->prepare("SELECT * FROM secuencias WHERE `investigador_login_idInvestigador_login` = ? ");
	$stmt->bind_param("i",$_SESSION['logged_in_user_id']);
	$result = $stmt->execute();
	$stmt->store_result();  
	if ($result) {
		$row_cnt = $stmt->num_rows;
		if($row_cnt >= 5){
			echo '<p>Se han detectado 5 secuencias registrados con su cuenta. No se puede tener mas.</p>'; //cambiar texto
			$stmt->close();
			$limiteSecuencia=false;
		}
	}else{echo "problema con consulta de Cantidad_Pacientes";$stmt->close();}
  
}else if(empty($nombre)){
   $errMSG = "Por favor introduce el nombre de la secuencia a crear.";
}
else if($limiteSecuencia)
	{
   

   if(!isset($errMSG))
   {
    $stmt = $conexion->prepare('INSERT INTO secuencias (`investigador_login_idInvestigador_login`, `nombreSecuencia`, `	fechaDeCreacion`) VALUES (?,?,NOW())');
    $stmt->bind_paran("is",$_SESSION['logged_in_user_id'],$nombre);
   if($stmt->execute())
   {
    $successMSG = "Nuevo registro insertado con éxito ...";
	echo "Secuencia creada";
   }
   else
   {
    $errMSG = "error al insertar ....";
   }
   
  }
}

?>