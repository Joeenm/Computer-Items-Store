<?php
// Redirigir al index.php si no se han enviado datos POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de Compra</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Factura de Compra</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $total = 0;
            $factura_vacia = true;

            echo "<div class='invoice'>";
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>";

            foreach ($_POST as $key => $value) {
                if (strpos($key, 'cantidad') === 0) {
                    $index = str_replace('cantidad', '', $key);
                    $cantidad = (int)$value;

                    if ($cantidad > 0) {
                        $nombre = $_POST["articulo_{$index}_nombre"];
                        $precioUnitario = (float)$_POST["articulo_{$index}_precio"];
                        $subtotal = $cantidad * $precioUnitario;
                        $total += $subtotal;
                        $factura_vacia = false;

                        echo "<tr>
                                <td>{$nombre}</td>
                                <td>{$cantidad}</td>
                                <td>B/. " . number_format($precioUnitario, 2) . "</td>
                                <td>B/. " . number_format($subtotal, 2) . "</td>
                              </tr>";
                    }
                }
            }

            if ($factura_vacia) {
                echo "<tr><td colspan='4'>No se han seleccionado artículos.</td></tr>";
            } else {
                $itbms = $total * 0.07;
                $totalConITBMS = $total + $itbms;

                echo "</tbody></table>";
                echo "<div class='totales'>";
                echo "<h3>Subtotal: B/. " . number_format($total, 2) . "</h3>";
                echo "<h3>ITBMS (7%): B/. " . number_format($itbms, 2) . "</h3>";
                echo "<h3>Total a Pagar: B/. " . number_format($totalConITBMS, 2) . "</h3>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>