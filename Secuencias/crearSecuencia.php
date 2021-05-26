
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/Styles.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
   

    <link rel="shortcut icon" href="../img/logoS.ico" type="image/x-ico">
    <title>Memory Test | Secuencias</title>

</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-md navbar-dark pmd-z-depth">
            <figure class="logo a.navbar-brand">
                <a href="index.html">
                    <img src="img/logoS.jpg"  
                    alt="logo" 
                    onmousedown="return false" 
                    onkeydown="return false" 
                    oncopy="return false" 
                    oncontextmenu="return false">
                </a>
            </figure>
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barra">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="barra">
                    <ul class="navbar-nav ml-auto"><?php 
                        echo '
                        <!-- Si se inició sesión como PACIENTE
							<li class="nav-item">
								<a class="nav-link" href="prueba.php">Prueba de memoria</a>
							</li>
                        -->';
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cuenta.php">Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
</header>

<div class="container">
    <div class="col" id="main">
		<form method="post" class="form-horizontal" onsubmit="C:/xampp/htdocs/TestLiveSegundoAvance/Secuencias/crearSecuencia.php">   
			<label >Nombre: </label>
			<input type="text" name="nombreS" placeholder="Inserte nombre de la nueva Secuencia"/>
			Aca iría el crud para las imagenes y el orden de inserción<br>
		
			<button type="submit" name="btnsave" class="btn btn-default">
				<span class="glyphicon glyphicon-save"></span> &nbsp; Crear Secuencia
			</button>
		</form>
	</div>
</div>
</body>
</html>

<?php
require "C:/xampp/htdocs/TestLiveSegundoAvance/dbconfig.php";
if(isset($_POST['nombreS'])){
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
		
			$limiteSecuencia=false;
		}
	}else{
		echo "problema con consulta de Cantidad_Pacientes";
	}
	$stmt->close();
	if($limiteSecuencia)
		{

		if(!isset($errMSG))
		{
			$stmt = $conexion->prepare('INSERT INTO secuencias (`investigador_login_idInvestigador_login`, `nombreSecuencia`, `fechaDeCreacion`) VALUES (?,?,NOW())');
			$stmt->bind_param("is",$_SESSION['logged_in_user_id'],$nombre);
			if($stmt->execute())
			{
				$successMSG = "Nuevo registro insertado con éxito ...";
				echo "Secuencia creada";
			}
			else
			{
				$errMSG = "error al insertar ....";
				echo $errMSG;
			}
		
		}
	}
}
?>