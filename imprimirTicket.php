<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$sentenciaProductos = $base_de_datos->prepare("SELECT p.marca, p.modelo, p.costo, p.id, pv.cantidad
FROM productos p
INNER JOIN 
productos_vendidos pv
ON p.id = pv.id_producto
WHERE pv.id_venta = ?");
$sentenciaProductos->execute([$id]);
$productos = $sentenciaProductos->fetchAll();
if (!$productos) {
    exit("No hay productos");
}

?>
<style>
    * {
        font-size: 20px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.producto,
    th.producto {
        width: 300px;
    }
    td.nom,
    th.nom{
        width: 180px;
    }

    td.cantidad,
    th.cantidad {
        width: 90px;
    }

    td.costo,
    th.costo {
        width: 50px;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 800px;
        max-width: 800px;
    }

    .cos {
        width: 120px;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <h2>Barberia</h2>
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="cantidad">ID</th>
                    <th class="nom">MARCA</th>
                    <th class="producto">MODELO</th>
                    <th class="cos">COSTO</th>
                    <th class="costo">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $subtotal = $producto->costo * $producto->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad" style="text-align:center;"><?php echo $producto->cantidad;  ?></td>
                        <td class="cantidad" style="text-align:center;"><?php echo $producto->id;  ?></td>
                        <td class="nom" style="text-align:center;"><?php echo $producto->marca;  ?></td>
                        <td class="cos" style="text-align:center;"><?php echo $producto->modelo;  ?></td>
                        <td class="cantidad" style="text-align:center;"><strong>$<?php echo number_format($producto->costo, 2) ?></strong></td>
                        <td class="costo">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="costo">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>