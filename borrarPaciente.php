<?php 
if(!isset($_SESSION["autentificado"])){
     header("Location: sesionV.php");
}?>

<?php 
include("function.php");
$id = $_GET['id'];
delete('tabla_demo','id',$id);
header("location:cuenta.php");
?>