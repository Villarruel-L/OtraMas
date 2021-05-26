<?php 
session_start();
if(!isset($_SESSION["autentificado"])){
    if($_SESSION["autentificado"]=='Investigador'){
        header("Location: sesionV.php");
   }
}

?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
   

    <link rel="shortcut icon" href="img/logoS.ico" type="image/x-ico">
    <title>Memory Test | Cuenta</title>

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
    <div class="row py-3">
        <div class="col-sm-3 order-2" id="sticky-sidebar">
            <div class="sticky-top">
                <ul class="list-group list-group-flush">
                <a id="pacientesBTN" type="button" class="list-group-item list-group-item-action active" href="javascript:pacientes();">Pacientes</a>
                <a id="pruebasBTN" type="button" class="list-group-item list-group-item-action"  href="javascript:pruebas();">Pruebas</a>
                <a id="secuenciasBTN" type="button" class="list-group-item list-group-item-action"  href="javascript:secuencias();">Secuencias</a>
            </ul>
            </div>
        </div>
        <div class="col" id="main">
            <?php 
            
            echo '
            <div id="pacientes" style="display:;">
                <h1>Pacientes</h1>
                <hr>';
                require_once 'obtenerPacientes.php';
                
            echo '
            </div>
            <div id="pruebas" style="display:none;">
                <h1>Pruebas Realizadas</h1>
                <hr>
                Ninguna prueba realizada
                ';

            echo '
            </div>
            <div id="secuencias" style="display:none;">
                <h1>Secuencias de Imagenes</h1>
                <hr>
                ';
                require_once 'Secuencias/obtenerSecuencia.php';
                
            echo'
            </div>
            ';            
        ?>
        </div>
    </div>
</div>




<footer class="page-footer center-on-small-only stylish-color-dark">
       <div class="footer-copyright text-center py-3">© 2021 Copyright:
        <a href="#" style="color:white !important"> MemoryTest</a>
      </div>

</footer>

<script languague="javascript">
        function pacientes() {
            div = document.getElementById('pacientes');
            div.style.display = '';
            div = document.getElementById('pruebas');
            div.style.display = 'none';
            div = document.getElementById('secuencias');
            div.style.display = 'none';
            
            boton = document.getElementById("pruebasBTN");
            boton.className= "list-group-item list-group-item-action";
            boton = document.getElementById("secuenciasBTN");
            boton.className= "list-group-item list-group-item-action";
            boton = document.getElementById("pacientesBTN");
            boton.className= "list-group-item list-group-item-action active";
        }

        function pruebas() {
            div = document.getElementById('pacientes');
            div.style.display = 'none';
            div = document.getElementById('pruebas');
            div.style.display = '';
            div = document.getElementById('secuencias');
            div.style.display = 'none';
            
            boton = document.getElementById("pacientesBTN");
            boton.className= "list-group-item list-group-item-action";
            boton = document.getElementById("pruebasBTN");
            boton.className= "list-group-item list-group-item-action active";
            boton = document.getElementById("secuenciasBTN");
            boton.className= "list-group-item list-group-item-action";
        }
        function secuencias() {
            div = document.getElementById('pacientes');
            div.style.display = 'none';
            div = document.getElementById('pruebas');
            div.style.display = 'none';
            div = document.getElementById('secuencias');
            div.style.display = '';
            
            boton = document.getElementById("pacientesBTN");
            boton.className= "list-group-item list-group-item-action";
            boton = document.getElementById("pruebasBTN");
            boton.className= "list-group-item list-group-item-action";
            boton = document.getElementById("secuenciasBTN");
            boton.className= "list-group-item list-group-item-action active";
        }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body></html>

