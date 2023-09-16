<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//indicamos el nombre de la base datos
$datab = "registro";
//indicamos selecionar ala base datos
$db = mysqli_select_db($connection, $datab);

?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="jquery/code.jquery.com_jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>Document</title>
</head>

<div class="container">
  <div class="row">
    <h2 style="text-align: center">TABLA DE USUARIOS</h2>

  </div>
  <br>

  <div class="row table-responsive">

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">apellidos</th>
            <th scope="col">numero de cedula</th>
            <th scope="col">numero de celular</th>
            <th scope="col">direccion</th>
            <th scope="col">tipo de traje</th>
            <th scope="col">separado</th>
            <th scope="col">costo</th>
            <th scope="col">deposito</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $consulta = "SELECT * FROM usuarios";

            $result = mysqli_query($connection, $consulta);
        
            while ($colum = mysqli_fetch_array($result)) {

          ?>

          <tr>
          <td><h2> <?php echo $colum['id'] ?> </td></h2>
        <td><h2> <?php echo $colum['nombres'] ?> </td></h2>
        <td><h2> <?php echo $colum['apellidos'] ?></td></h2>
        <td><h2> <?php echo $colum['numero_cedula'] ?></td></h2>
        <td><h2> <?php echo $colum['numero_celular'] ?></td></h2>
        <td><h2> <?php echo $colum['dirección'] ?></td></h2>
        <td><h2> <?php echo $colum['tipo_traje'] ?></td></h2>
        <td><h2> <?php echo $colum['separado'] ?></td></h2>
        <td><h2> <?php echo $colum['costo'] ?></td></h2>
        <td><h2> <?php echo $colum['deposito'] ?></td></h2>
        <td><?php echo "<a href='editar.php?id=".$colum['id']."'>"; ?> <i class="bi bi-pencil"></i></a></td>
        <td><?php echo "<a href='eliminar.php?id=".$colum['id']."'>"; ?><span class="bi bi-trash"></span></a></td>
          </tr>
            <?php }   ?>


        </tbody>
      </table>
      <a href="Formulario.html" class="btn btn-danger" > Volver Atrás</a>

    </div>


  </div>


</div>

<body></body>

</html>