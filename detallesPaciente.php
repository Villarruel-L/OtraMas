<?php function calculaedad($fechanacimiento){
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;
        return $ano_diferencia;
      } ?>

<table border="1" width="100%">
	<tr>
		<th width="auto">Nombre</th>
       
		<th width="auto">Apellido Paterno</th>
		<th width="auto">Apellido Materno</th>
        <th width="auto">Ciudad</th>
		<th width="auto">Telefono</th>
        <th width="auto">Correo Electronico</th>
		<th width="auto">Sexo</th>
		<th width="auto">Edad</th>
		<th width="aunto">Opcion</th>
	</tr>
<?php 
    require "dbconfig.php";
	$stmt = $conexion->prepare("SELECT nombre, sexo,telefonoDeContacto, apellidoPaterno, apellidoMaterno, ciudad, correoE, fechaNacimiento FROM `paciente`WHERE `paciente_login_idPaciente_login` LIKE ? ");
	$stmt->bind_param("s",$_GET['id']);
	$stmt->execute();
	$stmt->bind_result($nombreP, $sexoP, $telP, $apellidoUno, $apellidoM, $ciudadP, $correoE, $fechaNP);
	while($stmt->fetch()){
?>
	<tr>
		<td><?php echo $nombreP;?></td>
		<td><?php echo $apellidoUno;?></td>
        <td><?php echo $apellidoM;?></td>
		<td><?php echo $ciudadP;?></td>
		<td><?php echo $telP;?></td>
		<td><?php echo $correoE;?></td>
		<td><?php if($sexoP=='H'){
                        echo  "Hombre";
                    }else if($sexoP=='M'){
                        echo "Mujer";
        }?></td>
		<td><?php echo calculaedad($fechaNP);?></td>
		
		<td><a class="btn btn-primary" href="cuenta.php">Volver</a>
    </td>
	</tr>
<?php }?>