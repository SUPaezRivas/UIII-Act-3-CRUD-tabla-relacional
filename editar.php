<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="marca">Marca:</label>
			<input value="<?php echo $producto->marca ?>" class="form-control" name="marca" required type="text" id="marca" placeholder="Escribe la marca">
			
			<label for="modelo">Modelo:</label>
			<input value="<?php echo $producto->modelo ?>" class="form-control" name="modelo" required type="text" id="modelo" placeholder="Modelo">

			<label for="costo">Costo:</label>
			<input value="<?php echo $producto->costo ?>" class="form-control" name="costo" required type="text" id="costo" placeholder="Escribe el costo">

			<label for="color">Color:</label>
			<input value="<?php echo $producto->color ?>" class="form-control" name="color" required type="text" id="color" placeholder="Color">

			<label for="marca_cuchillas">Marca de cuchillas:</label>
			<input value="<?php echo $producto->marca_cuchillas ?>" class="form-control" name="marca_cuchillas" required type="text" id="marca_cuchillas" placeholder="Escribe la marca de cuchillas">

			<label for="tipo_maquina">Tipo de maquina:</label>
			<input value="<?php echo $producto->tipo_maquina ?>" class="form-control" name="tipo_maquina" required type="text" id="tipo_maquina" placeholder="Tipo de cuchillas">

			<label for="existencia">Existencia:</label>
			<input value="<?php echo $producto->existencia ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
