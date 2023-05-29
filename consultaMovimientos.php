<?php
include "abrirBBDD.php";

$nombre_movimiento = htmlentities($_GET['nombre_movimiento']);

$sqlMovimientos = "SELECT nombre, pp, precision_mov
                    FROM movimiento
                    WHERE MATCH(nombre, descripcion) AGAINST ('$nombre_movimiento' IN BOOLEAN MODE)";

$resultMovimientos = mysqli_query($con, $sqlMovimientos);

if (!$resultMovimientos) {
    die('Invalid query: ' . mysqli_error($con));
}

echo "<table>
        <tr>
        <th>Nombre</th>
        <th>PP</th>
        <th>Precisión</th>
        </tr>";

while ($row = mysqli_fetch_assoc($resultMovimientos)) {
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['pp'] . "</td>";
    echo "<td>" . $row['precision_mov'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>