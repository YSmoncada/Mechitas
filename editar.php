<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$base = "registro";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass, $base);


?>




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
<body>

<?php
	if(isset($_POST['enviar'])){
		$id = $_POST['id'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$numero_cedula = $_POST['numero_cedula'];
		$numero_celular = $_POST['numero_celular'];
		$dirección = $_POST['dirección'];
		$tipo_traje = $_POST['tipo_traje'];
		$separado = $_POST['separado'];
		$costo = $_POST['costo'];
		$deposito = $_POST['deposito'];

		$sql="update usuarios set nombres='".$nombres."', apellidos='".$apellidos."',numero_cedula ='".$numero_cedula."',numero_celular ='".$numero_celular."',dirección ='".$dirección."',tipo_traje ='".$tipo_traje."',separado ='".$separado."',costo ='".$costo."',deposito ='".$deposito."' where id='".$id."'";
		$resultado=mysqli_query($connection,$sql);

		if ($resultado) {
			echo "<script language='javaScript'>
					alert('Los datos se actualizaron correctamente');
					location.assign('consultar.php');
					</script>";
		}else{
			echo "<script language='javaScript'>
					alert('Los datos NO se actualizaron correctamente');
					location.assign('consultar.php');
					</script>";
		}
			 

	}else
	{
		$id=$_GET['id'];
		$sql="select * from usuarios where id='".$id."'";
		$resultado=mysqli_query($connection,$sql);
        
		$colum =mysqli_fetch_assoc($resultado);

		$id = $colum['id'];
		$nombres = $colum['nombres'];
		$apellidos = $colum['apellidos'];
		$numero_cedula = $colum['numero_cedula'];
		$numero_celular = $colum['numero_celular'];
		$dirección = $colum['dirección'];
		$tipo_traje = $colum['tipo_traje'];
		$separado = $colum['separado'];
		$costo = $colum['costo'];
		$deposito = $colum['deposito'];
		
?>


<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form  method="POST" action="<?=$_SERVER['PHP_SELF'] ?>">
			<div class="row mb-3">
					<label for="nombre" class="col-sm-2 control-label">id</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="id" value="<?php echo $colum['id']; ?>" required>
					</div>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
				</div>	
				<input type="hidden" id="id"  value="<?php echo $colum['id']; ?>" />
			
			<div class="row mb-3">
					<label  class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombres" placeholder="Nombres" value="<?php echo $nombres; ?>" required>
					</div>
				</div>
				
				
				
				<div class="row mb-3">
					<label  class="col-sm-2 control-label">apellidos</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellidos"  placeholder="Email" value="<?php echo $apellidos; ?>"  required>
					</div>
				</div>
				
				<div class="row mb-3">
					<label  class="col-sm-2 control-label">numero de cedula</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="numero_cedula" id="telefono" placeholder="numero de cedula" value="<?php echo $numero_cedula; ?>">
					</div>
				</div>
				
				<div class="row mb-3">
					<label  class="col-sm-2 control-label">numero de celular</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="numero_celular"  placeholder="numero de celular" value="<?php echo $numero_celular; ?>" >
					</div>
				</div>

				<div class="row mb-3">
					<label  class="col-sm-2 control-label">direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="dirección" placeholder="direccion" value="<?php echo $dirección; ?>" >
					</div>
				</div>

				<div class="row mb-3">
					<label  class="col-sm-2 control-label">tipo de traje</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tipo_traje"  placeholder="tipo de traje" value="<?php echo $tipo_traje; ?>" >
					</div>
				</div>

				<div class="row mb-3">
					<label  class="col-sm-2 control-label">separado</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="separado" placeholder="separado" value="<?php echo $separado; ?>">
					</div>
				</div>

				<div class="row mb-3">
					<label  class="col-sm-2 control-label">costo</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="costo"  placeholder="costo" value="<?php echo $costo; ?>">
					</div>
				</div>

				<div class="row mb-3">
					<label  class="col-sm-2 control-label">deposito</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="deposito"  placeholder="deposito" value="<?php echo $deposito; ?>" >
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="consultar.php" class="btn btn-primary">Regresar</a>
						<button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			<?php  }  ?>
		</div>
</body>
</html>