<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Artículos Computacionales</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        html {
            zoom: 90%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Compra de Artículos Computacionales</h1>
        <form action="factura.php" method="POST">
            <div class="product-grid">
                <?php
                $articulos = [
                    ["Asus TUF Gamer", 999.95, "Assets/laptop.png"],
                    ["Monitor Gamer", 299.95, "Assets/monitor.png"],
                    ["Teclado Logitech G", 109.95, "Assets/teclado.png"],
                    ["Mouse Logitech G", 49.95, "Assets/mouse.png"],
                    ["Impresora HP", 199.95, "Assets/impresora.png"],
                    ["Router ZetaHGF", 79.95, "Assets/router.png"],
                    ["Disco Duro SSD", 149.95, "Assets/disco_duro.png"],
                    ["Memoria RAM DDR5", 59.95, "Assets/memoria_ram.png"],
                    ["ASUS Webcam C3", 69.95, "Assets/camara_web.png"],
                    ["Micrófono Razer", 39.95, "Assets/microfono.png"],
                    ["Auriculares Astro A50", 99.95, "Assets/auriculares.png"],
                    ["Gigabyte GTX 1650", 199.95, "Assets/tarjeta_grafica.png"],
                    ["Fuente de Poder B500", 119.95, "Assets/fuente_poder.jpg"],
                    ["Placa Base ROG", 249.95, "Assets/placa_base.png"],
                    ["Silla Gamer NITRO", 179.95, "Assets/silla_gamer.png"]
                ];

                foreach ($articulos as $index => $articulo) {
                    echo "<div class='card'>
                            <img src='{$articulo[2]}' alt='{$articulo[0]}' />
                            <h3>{$articulo[0]}</h3>
                            <p>Precio: B/. {$articulo[1]}</p>
                            <label for='cantidad{$index}'>Disponibilidad: 10</label>
                            <label for='cantidad{$index}'>Cantidad:</label>
                            <input type='number' name='cantidad{$index}' value='0' min='0' max='10' />
                            <input type='hidden' name='articulo_{$index}_nombre' value='{$articulo[0]}' />
                            <input type='hidden' name='articulo_{$index}_precio' value='{$articulo[1]}' />
                          </div>";
                }
                ?>
            </div>
            <button class="btn" type="submit">Comprar Artículos</button>
        </form>
    </div>

    <footer class="footer">
        <p>Johny Medina 8-954-566, Desarrollo de Software VII, Asignación No. 2</p>
    </footer>
</body>
</html>