<br>
<div class="text-center">
	<h2>Secuencias creadas</h2>
	<hr>
</div>
<table border="1" width="100%">
	<tr>
		<th width="10%">#</th>
		<th width="55%">Nombre</th>
		<th width="35%">Opciones</th>
	</tr>
<?php 
	require "C:/xampp/htdocs/TestLiveSegundoAvance/dbconfig.php";
	
	$stmt = $conexion->prepare("SELECT idSecuencia, nombreSecuencia FROM `secuencias` WHERE `investigador_login_idInvestigador_login` = ?");
	$stmt->bind_param("i",$_SESSION['logged_in_user_id']);
	$stmt->execute();
	$stmt->bind_result($idSecuencia, $nombreS);
	$i=0;
	while($stmt->fetch()){
		if($i>=5){
			break;
		}
?>
	<tr>
		<td><?php echo ($i+1);?></td>
		<td><?php echo $nombreS;?></td>
		<td>

		<a class="btn btn-primary" href="editarSecuencia.php?id=<?php echo $idSecuencia; ?>">Editar</a>
		<a class="btn btn-primary" href="borrarSecuencia.php?id=<?php echo $idSecuencia;?>">Borrar</a>
		</td>
	</tr>

	<?php $i++; } 
	echo '</table>';
		if($i===0){
			echo "<p>No se encontraron Secuencias de imagenes</p>";
		}
		?>
<br>
<div class="text-center">
	<a href="Secuencias/crearSecuencia.php"><h2>Crear nueva secuencia</h2></a>
</div>
