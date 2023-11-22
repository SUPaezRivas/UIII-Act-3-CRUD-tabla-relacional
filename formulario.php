<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
	
	<label for="marca">Marca:</label>
			<input class="form-control" name="marca" required type="text" id="marca" placeholder="Escribe la marca">
			
			<label for="modelo">Modelo:</label>
			<input class="form-control" name="modelo" required type="text" id="modelo" placeholder="Modelo">

			<label for="costo">Costo:</label>
			<input class="form-control" name="costo" required type="text" id="costo" placeholder="Escribe el costo">

			<label for="color">Color:</label>
			<input class="form-control" name="color" required type="text" id="color" placeholder="Color">

			<label for="marca_cuchillas">Marca de cuchillas:</label>
			<input class="form-control" name="marca_cuchillas" required type="text" id="marca_cuchillas" placeholder="Escribe la marca de cuchillas">

			<label for="tipo_maquina">Tipo de maquina:</label>
			<input class="form-control" name="tipo_maquina" required type="text" id="tipo_maquina" placeholder="Tipo de cuchillas">

			<label for="existencia">Existencia:</label>
			<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
			
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>