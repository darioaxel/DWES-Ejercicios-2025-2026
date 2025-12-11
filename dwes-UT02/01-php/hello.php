<html>
    <head>
        <style>
        body{
            font-family: "Arial"
        }
        h3{
            color: darkblue;
        }
        h2{
            color: darkred;
        }
        table {
            border-collapse: separate;
            border: 1px solid black;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
            width: 50%;
        }
        th, td {
            border: 1px solid #c1d0ffff;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #c1d0ffff;
        }
        .color-rojo{
            background: #ffbbbbff;
            color: red;
        }
        </style>
    </head>
    <body>
        <?php
        # Info sobre los tipos de array en PHP -> https://www.php.net/manual/es/language.types.array.php

        # Array indexado: Se crean con "array(...)" o "[...]". Ejemplo -> $array = array("foo", "bar", "hello", "world");
        # Array multidimensional: Tiene uno o más arrays dentro de otro array. En nuestro caso un array, dentro de un array, dentro de un array. Nada confuso.
        $socios = [
            #Array asociativos (ID1, ID2) se crean usando las claves => valores.
            "ID1" => [
                "ID" => 1,
                "Nombre" => "Sabrina",
                "Apellidos" => "Spellman",
                "DNI" => "98765432Q",
                "Mail" => "salem@witch.com",
                "Móvil" => 666222666,
                "pagos" => [
                    "1692-01" => ["mes" => "Enero", "Importe" => 666, "estado" => "Pagado", "Fecha de pago" => "2028-01-16"],
                    "1692-02" => ["mes" => "Febrero", "Importe" => 1, "estado" => "Pendiente", "Fecha de pago" => null],
                    "1692-03" => ["mes" => "Marzo", "Importe" => 120, "estado" => "Pagado", "Fecha de pago" => "2058-03-10"],
                    "1692-04" => ["mes" => "Abril", "Importe" => 90, "estado" => "Pendiente", "Fecha de pago" => null],
                    "1692-05" => ["mes" => "Mayo", "Importe" => 100, "estado" => "Pagado", "Fecha de pago" => "2004-05-18"],
                    "1692-06" => ["mes" => "Junio", "Importe" => 80, "estado" => "Pagado", "Fecha de pago" => "2099-06-20"],
                    "1692-07" => ["mes" => "Julio", "Importe" => 150, "estado" => "Pendiente", "Fecha de pago" => null],
                    "1692-08" => ["mes" => "Agosto", "Importe" => 200, "estado" => "Pagado", "Fecha de pago" => "3028-08-05"],
                    "1692-09" => ["mes" => "Septiembre", "Importe" => 75, "estado" => "Pendiente", "Fecha de pago" => null],
                    "1692-10" => ["mes" => "Octubre", "Importe" => 130, "estado" => "Pagado", "Fecha de pago" => "1805-10-28"],
                    "1692-11" => ["mes" => "Noviembre", "Importe" => 95, "estado" => "Pendiente", "Fecha de pago" => null],
                    "1692-12" => ["mes" => "Diciembre", "Importe" => 180, "estado" => "Pagado", "Fecha de pago" => "1752-12-15"]
                ]
            ],
            "ID2" => [
                "ID" => 2,
                "Nombre" => "Harvey",
                "Apellidos" => "Kinkle",
                "DNI" => "12345678Z",
                "Mail" => "harvey@greendale.com",
                "Móvil" => 666999333,

                "pagos" => [
                    "2021-01" => ["mes" => "Enero", "Importe" => 50, "estado" => "Pendiente", "Fecha de pago" => null],
                    "2004-02" => ["mes" => "Febrero", "Importe" => 75, "estado" => "Pagado", "Fecha de pago" => "2005-02-14"],
                    "2025-03" => ["mes" => "Marzo", "Importe" => 90, "estado" => "Pagado", "Fecha de pago" => "2025-03-22"],
                    "2021-04" => ["mes" => "Abril", "Importe" => 60, "estado" => "Pendiente", "Fecha de pago" => null],
                    "2004-05" => ["mes" => "Mayo", "Importe" => 120, "estado" => "Pagado", "Fecha de pago" => "2005-05-05"],
                    "2025-06" => ["mes" => "Junio", "Importe" => 110, "estado" => "Pagado", "Fecha de pago" => "2025-06-25"],
                    "2025-07" => ["mes" => "Julio", "Importe" => 95, "estado" => "Pendiente", "Fecha de pago" => null],
                    "2022-08" => ["mes" => "Agosto", "Importe" => 130, "estado" => "Pagado", "Fecha de pago" => "2025-08-15"],
                    "2004-09" => ["mes" => "Septiembre", "Importe" => 85, "estado" => "Pagado", "Fecha de pago" => "2005-09-10"],
                    "2023-10" => ["mes" => "Octubre", "Importe" => 140, "estado" => "Pendiente", "Fecha de pago" => null],
                    "2025-11" => ["mes" => "Noviembre", "Importe" => 60, "estado" => "Pagado", "Fecha de pago" => "2025-11-02"],
                    "2004-12" => ["mes" => "Diciembre", "Importe" => 150, "estado" => "Pagado", "Fecha de pago" => "2005-12-30"]
                ]
            ]
        ];
        ?>

        <h2>Datos de Socios</h2>
        <?php
        # Loop para sacar la información del array.
        foreach ($socios as $a => $info) {
            # . es el operador que une texto y variable; <br> pal salto de línea
            echo "<h3>".$info["Nombre"]." ".$info["Apellidos"]." - ID".$info["ID"]."</h3>";
            echo "<b>DNI:</b> ".$info["DNI"]."  -  ";
            echo "<b>Mail:</b> ".$info["Mail"]."  -  ";
            echo "<b>Móvil:</b> ".$info["Móvil"]."<br><br>";

            echo "<table>";
            echo "
                <tr>
                    <th>Referencia</th>
                    <th>Mes</th>
                    <th>Importe</th>
                    <th>Estado</th>
                    <th>Fecha de pago</th>
                </tr>";

            #$info, no $socios
            foreach ($info["pagos"] as $a => $pago) {
                echo "<tr>";
                echo "<td>$a</td>";
                echo "<td>".$pago["mes"]."</td>";
                echo "<td>".$pago["Importe"]." €</td>";
                echo "<td class='".($pago["estado"]==="Pendiente"?"color-rojo":"")."'>".$pago["estado"]."</td>";
                # Si Fecha de pago es null, pon -
                echo "<td>".($pago["Fecha de pago"]??"-")."</td>";
                echo "</tr>";
            }
            # Seleccionamos todos los importes y los sumamos 
            $importes = array_column($info["pagos"], "Importe");
            $totalimportes = array_sum($importes);
            echo "
                <tr>
                    <td><b>Total</td>
                    <td></td>
                    <td><b>$totalimportes €</td>
                    <td></td>
                    <td></td>
                </tr>";

            echo "</table>";
        }
        ?>

    </body>
</html>