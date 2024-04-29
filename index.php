<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
</svg>   
    Productos Disponibles</h1>
    
<div class="productos-container">
    
    <?php
    
        $productos_json = file_get_contents("productos.json");
        $productos = json_decode($productos_json, true);
        
        foreach ($productos as $producto) {
            echo "<div class='producto'>";
            echo "<h2>" . $producto['nombre'] . "</h2>";
            echo "<p>Precio: $" . $producto['precio'] . "</p>";
            echo "<button onclick='agregarAlCarrito(\"" . $producto['nombre'] . "\", " . $producto['precio'] . ")'>Agregar al Carrito</button>";
            echo "</div>";
        }
    ?>
</div>

<div id="carrito">
    <h2>Carrito de Compras</h2>
    <ul id="lista-carrito"></ul>
    <p>Total: $<span id="total"></span></p>
    <button onclick="realizarPedido()">Realizar Pedido</button>
</div>
<footer>
  <center>Derechos reservados® </center> 
</footer>
<script src="scripts.js"></script>
</body>
</html>