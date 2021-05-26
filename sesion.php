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
                            <a class="nav-link" href="registroV.php">Registrarme</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
</header>
<?php

if(isset($_POST['username'])){
      /*OBTENCION DE VARIABLES */
    $correo = $_POST["username"]; //Puede ingresar el correo electronico o el nombre de usuario
    $password = $_POST["password"]; 

     /*CONEXION */
     include 'dbconfig.php'; //se define "con"

	//primero busca con investigador
    $stmt = $conexion->prepare("SELECT idInvestigador_login FROM investigador_login  WHERE  correo like ? LIMIT 1");
    
        $stmt->bind_param("s",$correo);
        $stmt->execute();
        $stmt->store_result();

    if ($stmt->num_rows===1) 
    {
             
        $stmt->free_result();
        $stmt = $conexion->prepare("SELECT nombre, idInvestigador_login, AES_DECRYPT(`pasword`,'thegame') as pasword 
                            FROM `investigador_login`WHERE correo like ? LIMIT 1");
        $stmt->bind_param("s",$correo);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($noombre, $id, $passwordDB);
        $stmt->fetch();
            if (password_verify($password, $passwordDB)) {
                 session_start();
                    $_SESSION['logged_in_user_id'] = $id; //setear la id de sesion con id de investigador
                    $_SESSION['logged_in_user_name'] = $noombre; 
                    $_SESSION["autentificado"]= "Investigador";
                    echo '<p class="success">Login exitoso!</p>';
                    $stmt->free_result();
                    $conexion->close();
                    header("Location: cuenta.php");
            } else {
                $stmt->free_result();
                $conexion->close();
                    echo '<p class="error">La contraseña y el usuario no coinciden</p>';

            } 
			
    } else { //Si no lo encuentra entonces busca en la tabla pacientes
        $stmt->free_result();
        $stmt = $conexion->prepare("SELECT nombre, idPaciente_login, AES_DECRYPT(`pasword`,'thegame') as pasword 
                                                                                    FROM `paciente_login` 
                                                                                    WHERE correo like ?  LIMIT 1 ");
          
          $stmt->bind_param("s",$correo);
          $stmt->execute();
          $stmt->store_result();
          $stmt->bind_result($nombre, $id, $passwordDB);
          $stmt->fetch();
                if (password_verify($password, $passwordDB)) {
                    session_start();
                    $_SESSION['logged_in_user_id'] = $id; //setear la id de sesion con id de investigador
                    $_SESSION['logged_in_user_name'] = $noombre; 
                    $_SESSION["autentificado"]= "Paciente";
                    echo '<p class="success">Login exitoso!</p>';
                    
                    header("Location: cuenta.php");
                } else {
                        echo '<p class="error">La contraseña y el usuario no coinciden</p>';
    
                }   
                $stmt->free_result();
                $stmt->close();
                $conexion->close();  	
    }
}
?>		
    <br>
    <footer class="page-footer center-on-small-only stylish-color-dark">
       <div class="footer-copyright text-center py-3">© 2021 Copyright:
        <a href="#" style="color:white !important"> App de tira de imagenes</a>
      </div>

</footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>


