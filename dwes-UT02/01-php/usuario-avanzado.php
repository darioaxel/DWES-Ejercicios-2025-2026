<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
<?php
// ===========================
// VARIABLES EN PHP
// ===========================
// En PHP, todas las variables comienzan con el símbolo "$".
// Se crean en el momento en el que se les asigna un valor.
// No es necesario declarar el tipo (PHP es un lenguaje débilmente tipado).
// Ejemplo: $nombre = "Laura";  $edad = 25;

// 1. Definir los datos en formato JSON (varios usuarios)
$usuariosJSON = '[
    {
        "nombre": "Laura",
        "apellidos": "García Pérez",
        "dni": "12345678A",
        "email": "laura.garcia@example.com",
        "edad": 25,
        "nombre_usuario": "lauragp"
    },
    {
        "nombre": "Carlos",
        "apellidos": "López Díaz",
        "dni": "87654321B",
        "email": "carlos.lopez@example.com",
        "edad": 16,
        "nombre_usuario": "carlitos16"
    },
    {
        "nombre": "Ana",
        "apellidos": "Martínez Ruiz",
        "dni": "11223344C",
        "email": "ana.martinez@example.com",
        "edad": 30,
        "nombre_usuario": "anaMR30"
    }
]';

// 2. Convertir el JSON a un array de PHP
// json_decode transforma un JSON en un array asociativo o en un objeto PHP.
// El segundo parámetro "true" indica que queremos un array asociativo.
$usuarios = json_decode($usuariosJSON, true);

// ===========================
// SALIDA DE DATOS EN PHP
// ===========================
// Usamos echo para mostrar información en pantalla.
echo "<h1>Listado de usuarios</h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th>Email</th>
        <th>Edad</th>
        <th>Usuario</th>
        <th>Estado</th>
      </tr>";

// ===========================
// BUCLE FOR EN PHP
// ===========================
// La sintaxis del bucle for es:
// for (valor_inicial; condición; incremento) { ... }
// - valor_inicial: normalmente un contador ($i = 0)
// - condición: mientras se cumpla, el bucle se repite ($i < total)
// - incremento: cómo avanza el contador ($i++)
//
// En este caso, recorremos el array de usuarios desde el primero hasta el último.
for ($i = 0; $i < count($usuarios); $i++) {
    $usuario = $usuarios[$i];

    // ===========================
    // CONDICIONAL IF EN PHP
    // ===========================
    // La sintaxis es:
    // if (condición) {
    //     código si se cumple
    // } else {
    //     código si NO se cumple
    // }
    //
    // En este caso, comprobamos si el usuario es mayor o menor de edad.
    if ($usuario['edad'] >= 18) {
        $estado = "<span style='color:green;'>Mayor de edad</span>";
    } else {
        $estado = "<span style='color:red;'>Menor de edad</span>";
    }

    // Mostrar fila de la tabla
    echo "<tr>";
    echo "<td>" . $usuario['nombre'] . "</td>";
    echo "<td>" . $usuario['apellidos'] . "</td>";
    echo "<td>" . $usuario['dni'] . "</td>";
    echo "<td>" . $usuario['email'] . "</td>";
    echo "<td>" . $usuario['edad'] . "</td>";
    echo "<td>" . $usuario['nombre_usuario'] . "</td>";
    echo "<td>" . $estado . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
 </body>
</html>