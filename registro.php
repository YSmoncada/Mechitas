<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$numero_cedula = $_POST['numero_cedula'];
$numero_celular = $_POST['numero_celular'];
$direccion = $_POST['direccion'];
$tipo_traje = $_POST['tipo_traje'];
$separado = $_POST['separado'];
$costo = $_POST['costo'];
$deposito = $_POST['deposito'];
$consul = "";
$send = "";

//verificamos la conexion a base datos
if (!$connection) {
    echo "No se ha podido conectar con el servidor";
} else {

}
//indicamos el nombre de la base datos
$datab = "registro";
//indicamos selecionar ala base datos
$db = mysqli_select_db($connection, $datab);

//validar cuando pulsen el botton
if (isset($_POST['send']))
    $send = $_POST['send'];

if ($send) {

    //verificar que no halla ningun input sin llenar    
    if (empty($nombres && $apellidos && $numero_cedula && $numero_celular && $direccion && $tipo_traje && $separado && $costo && $deposito)) {

        echo "<script language='javaScript'>
					alert('Porfavor ingresar datos');
					location.assign('formulario.html');
					</script>";


    } else {

        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO usuarios(`nombres`, `apellidos`, `numero_cedula`, `numero_celular`, `dirección`, `tipo_traje`, `separado`, `costo`, `deposito`) VALUES ('$nombres','$apellidos','$numero_cedula','$numero_celular','$direccion','$tipo_traje','$separado','$costo','$deposito')";


        $resultado = mysqli_query($connection, $instruccion_SQL);
        if ($resultado) {
			echo "<script language='javaScript'>
					alert('Los datos se han guardado exitosamente');
					location.assign('formulario.html');
					</script>";
		}else{
			echo "<script language='javaScript'>
					alert('Los datos NO se han guardado exitosamente');
					location.assign('formulario.html');
					</script>";
		}
    }
}

//validar cuando pulsen el botton
if (isset($_POST['consul']))
    $consul = $_POST['consul'];

if ($consul) {

    //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
    $consulta = "SELECT * FROM usuarios";


    $result = mysqli_query($connection, $consulta);

    //realiza la tabla
    if (!$result) {
        echo "No se ha podido realizar la consulta";
    }
    echo "<input type=text>";
    echo "<input type=submit value=buscar>";
    echo "<br>";
    echo "<br>";
    echo "<table>";
    echo "<tr>";
    echo "<th><h1>nombre</th></h1>";
    echo "<th><h1>apellidos</th></h1>";
    echo "<th><h1>numero de cedula</th></h1>";
    echo "<th><h1>numero de celular</th></h1>";
    echo "<th><h1>direccion</th></h1>";
    echo "<th><h1>tipo de traje</th></h1>";
    echo "<th><h1>separado</th></h1>";
    echo "<th><h1>costo</th></h1>";
    echo "<th><h1>deposito</th></h1>";
    echo "<th><h1>Opciones</th></h1>";
    echo "</tr>";

    while ($colum = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><h2>" . $colum['nombres'] . "</td></h2>";
        echo "<td><h2>" . $colum['apellidos'] . "</td></h2>";
        echo "<td><h2>" . $colum['numero_cedula'] . "</td></h2>";
        echo "<td><h2>" . $colum['numero_celular'] . "</td></h2>";
        echo "<td><h2>" . $colum['dirección'] . "</td></h2>";
        echo "<td><h2>" . $colum['tipo_traje'] . "</td></h2>";
        echo "<td><h2>" . $colum['separado'] . "</td></h2>";
        echo "<td><h2>" . $colum['costo'] . "</td></h2>";
        echo "<td><h2>" . $colum['deposito'] . "</td></h2>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($connection);

    //echo "Fuera " ;
    echo '<a href="Formulario.html"> Volver Atrás</a>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

    <style>
        table {
            border: solid 2px black;
            border-collapse: collapse;
            padding: 20px;
        }

        th {
            background-color: #000046;
        }

        h1 {
            color: white;
        }

        td,
        th {
            border: solid 1px black;
            padding: 2px;
            text-align: center;
        }
    </style>
</head>

<body>

</body>

</html>