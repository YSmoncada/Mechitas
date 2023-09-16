<?php
   //validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$base = "registro";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass, $base);

$id=$_GET['id'];
$sql="delete from usuarios where id='".$id."'";
$resultado=mysqli_query($connection,$sql);

if ($resultado) {
    echo "<script language='javaScript'>
            alert('Los datos se han eliminado correctamente');
            location.assign('consultar.php');
            </script>";
}else{
    echo "<script language='javaScript'>
            alert('Los datos NO se han eliminado');
            location.assign('consultar.php');
            </script>";
}

?>