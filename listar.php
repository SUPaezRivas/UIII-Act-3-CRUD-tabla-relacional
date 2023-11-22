<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Costo</th>
					<th>Color</th>
					<th>Marca de cuchillas</th>
					<th>Tipo de maquina</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->marca ?></td>
					<td><?php echo $producto->modelo ?></td>
					<td><?php echo $producto->costo ?></td>
					<td><?php echo $producto->color ?></td>
					<td><?php echo $producto->marca_cuchillas ?></td>
					<td><?php echo $producto->tipo_maquina ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>