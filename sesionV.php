<?php 
if(isset($_SESSION["autentificado"])){
     header("Location: cuenta.php");
}?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Styles.css">

    <link rel="shortcut icon" href="img/logoS.ico" type="image/x-ico">
    <title>Memory Test | Main Page</title>
    <meta property="og:image" content="img/logoS.jpg">
    <meta property="og:title" content="Memory Test | main">
    <meta name="author" content="Los_Olvidados">
    <meta name="robots" content="index">
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-md navbar-dark">
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
                        <ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="index.html#info">Caracteristicas</a>
							</li>
                                
							<li class="nav-item">
								<a class="nav-link" href="index.html#contacto">Contáctanos</a>
							</li> 

                            <li class="nav-item">
                                <a class="nav-link" href="registroV.php">Registrarme</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>
    </header>

    <section class="container aling-items-center">
        <div class="row justify-content-center">
           
                <div class="col-md-6 col-lg-6 align-self-center">
                    <div class="presentacion">
                    <form action="sesion.php" method="post">
                        <div class="imgcontainer">
                            <h1>
                                Iniciar Sesión
                            </h1>
                            <img src="img/avatar.png" alt="Avatar" class="avatar">
                        </div>
                                
                        <div class="container">
                            <label for="username"><b>Nombre de Usuario</b></label>
                            <input type="text" placeholder="Introduce nombre" name="username" required>
                                
                            <label for="password"><b>Contraseña</b></label>
                            <input type="password" placeholder="Contraseña" name="password" required>
                            
                            <button type="submit">Iniciar Sesión</button>
                            <label>
                            <input type="checkbox" checked="checked" name="remember"> Recordarme
                            </label>
                            <span class="psw">¿Olvidaste la <a href="#">contraseña?</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>   	

    
    <br>
    <footer class="page-footer center-on-small-only stylish-color-dark">
	
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
         <a href="#"  style="color:white !important"> App de tira de imagenes</a>
       </div>
 
 </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body></html>