<?php 
if(!isset($_SESSION["autentificado"])){
     header("Location: sesionV.php");
}?>
<style>
  
/* Full-width input fields */
input[type="text"],
input[type="date"],
input[type="number"],
input[type="email"],
input[type="password"] {
	width: 100% !important;
	padding: 12px 20px !important;
	margin: 8px 0 !important;
	display: inline-block !important;
	border: 1px solid #ccc !important;
	box-sizing: border-box !important;
}

/* Set a style for all buttons */
button {
	background-color: #04aa6d;
	color: white !important;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 100%;
}

button:hover {
	opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
	width: auto;
	padding: 10px 18px;
	background-color: #f44336;
}

/* Center the image and position the close button */


.container {
	padding: 16px;
}

/* The Close Button (x) */
.close {
	position: absolute;
	right: 25px;
	top: 0;
	color: #000;
	font-size: 35px;
	font-weight: bold;
}

.close:hover,
.close:focus {
	color: red;
	cursor: pointer;
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
	span.psw {
		display: block;
		float: none;
	}
	.cancelbtn {
		width: 100%;
	}
}

    </style>
	
<div class="text-center">    
<button onclick="document.getElementById('id01').style.display=''" style="width:auto;">Registrar Nuevo Paciente</button>
</div>
<div id="id01" style="display:none">
  
  <form class="modal-content animate" action="registroPaciente.php" method="post">
       
  <div class="container">
    <label id="icon" for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Primer nombre" required/>

    <label id="icon" for="apellidoP">Apellido Paterno</label>
    <input type="text" name="apellidoP" id="apellidoP" placeholder="Inserta Apellido paterno" required/><br>

    <label id="icon" for="fechaNacimiento">Fecha de Nacimiento</label><br>
    <input type="date" name="fechaNacimiento" id="fechaNacimiento" required/><br>

    <label id="icon" for="ciudad">Ciudad de Residencia Actual</label>
    <input type="text" name="ciudad" id="ciudad" placeholder="Inserta ciudad" required/><br>

    <label id="icon" for="Correo">Correo</label><br>
    <input type="email" name="correo" id="Correo" placeholder="Correo electrónico" required/><br>

      <label for="psw"><b>Contraseña</b></label>
      <input type="password" placeholder="Introduzca la contraseña" name="psw" required><br>
      
    <label id="icon" for="nombre">Seleciona el sexo</label>
    <div>
        <input type="radio" value="H" id="hombre" name="gender" checked/>
        <label for="hombre" class="radio" chec>Hombre</label>
        <input type="radio" value="M" id="mujer" name="gender" />
        <label for="mujer" class="radio">Mujer</label>
    </div> 
      <button type="submit">Registrar</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
   
    </div>
  </form>
</div>

<table border="1" width="100%">
	<tr>
		<th width="20%">Nombre</th>
		<th width="20%">Apellido Paterno</th>
		<th width="30%">Correo Electronico</th>
		<th width="25%">Opciones</th>
	</tr>
<?php 
    require_once "dbconfig.php";
	$stmt = $conexion->prepare("SELECT paciente_login_idPaciente_login, nombre, apellidoPaterno, correoE FROM `paciente` WHERE `investigador_ifk_idInvestigador_login` = ?");
	$stmt->bind_param("i",$_SESSION['logged_in_user_id']);
	$stmt->execute();
	$stmt->bind_result($idPaciente, $nombreP, $apellidoUno, $correoE);
	$i=0;
	while($stmt->fetch()){
		if($i>=10){
			break;
			
		}
?>
	<tr>
		<td><?php echo $nombreP;?></td>
		<td><?php echo $apellidoUno;?></td>
		<td><?php echo $correoE;?></td>
		<td>

		<a class="btn btn-primary" href="detallesPaciente.php?id=<?php echo $idPaciente; ?>">Detalles</a>
		<a class="btn btn-primary" href="borrarPaciente.php?id=<?php echo $idPaciente;?>">Borrar</a>
		</td>
	</tr>

	<?php $i++; } 
	echo '</table>';
		if($i===0){
			echo "<p>No se encontraron pacientes</p>";
		}
		?>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>