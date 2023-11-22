<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["marca"]) || !isset($_POST["modelo"]) || !isset($_POST["costo"]) || !isset($_POST["color"]) || !isset($_POST["marca_cuchillas"]) || !isset($_POST["tipo_maquina"]) || !isset($_POST["existencia"])){ exit(); }
#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$costo = $_POST["costo"];
$color = $_POST["color"];
$marca_cuchillas = $_POST["marca_cuchillas"];
$tipo_maquina = $_POST["tipo_maquina"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO `productos`(`marca`, `modelo`, `costo`, `color`, `marca_cuchillas`, `tipo_maquina`, `existencia`) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$marca, $modelo, $costo, $color, $marca_cuchillas, $tipo_maquina, $existencia]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>