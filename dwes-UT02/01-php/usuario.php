<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
<?php
// 1. Datos en formato JSON
$usuarioJSON = '{
    "nombre": "Laura",
    "apellidos": "García Pérez",
    "dni": "12345678A",
    "email": "laura.garcia@example.com",
    "edad": 25,
    "nombre_usuario": "lauragp"
}';

// 2. Convertir el JSON a un array asociativo de PHP
$usuario = json_decode($usuarioJSON, true);

// 3. Mostrar los datos
echo "<h1>Datos del usuario</h1>";
echo "<ul>";
echo "<li><strong>Nombre:</strong> " . $usuario['nombre'] . "</li>";
echo "<li><strong>Apellidos:</strong> " . $usuario['apellidos'] . "</li>";
echo "<li><strong>DNI:</strong> " . $usuario['dni'] . "</li>";
echo "<li><strong>Email:</strong> " . $usuario['email'] . "</li>";
echo "<li><strong>Edad:</strong> " . $usuario['edad'] . "</li>";
echo "<li><strong>Nombre de usuario:</strong> " . $usuario['nombre_usuario'] . "</li>";
echo "</ul>";
?>
 </body>
</html>