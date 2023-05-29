<!DOCTYPE html>
<html>
<head>
    <style>
       /* Estilo para la tabla */
       table {
            border-collapse: collapse;
            width: 100%;
        }   
        th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-family: "VT323", monospace;
        cursor: pointer;
    }

    th {
        position: sticky;
        top: 0;
        background-color: #ff0000;
        color: #ffffff;
    }

    /* Estilo para el contenedor de la tabla */
    .table-container {
        max-height: 1500px;
        overflow-y: scroll;
    }
    
    /* Estilo de Pokémon para la tabla */
    .pokemon-table {
        background-image: url('pokedex.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        color: #000000;
        font-family: "VT323", monospace;
        font-size: 23px;
        border: 1px solid #000000;
        border-radius: 8px;
    }

    .pokemon-table th {
        background-color: #e5e5e5;
        font-weight: bold;
    }

    /* Estilo para las imágenes de la tabla */
    .pokemon-table td img {
        
        padding-left: 30px; /* Ajusta el valor según sea necesario */
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Función para ordenar los resultados al hacer clic en el encabezado de la tabla
        $('th').click(function() {
            var table = $(this).parents('table').eq(0);
            var rows = table.find('tr:gt(0)').toArray().sort(comparator($(this).index()));
            this.asc = !this.asc;
            if (!this.asc) {
                rows = rows.reverse();
            }
            for (var i = 0; i < rows.length; i++) {
                table.append(rows[i]);
            }
        });
        
        // Función de comparación para ordenar los resultados
        function comparator(index) {
            return function(a, b) {
                var valA = getCellValue(a, index);
                var valB = getCellValue(b, index);
                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB);
            };
        }
        
        // Función para obtener el valor de una celda
        function getCellValue(row, index) {
            return $(row).children('td').eq(index).text();
        }


});
</script>

</head>
<body>
    <div class="table-container">
    <?php
 include "abrirBBDD.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $busqueda = $_POST['busqueda'];
    $tipo = $_POST['tipo']; // Obtener el tipo de Pokémon desde el formulario

    $consulta = "SELECT p.numero_pokedex, p.nombre, GROUP_CONCAT(t.nombre) AS tipos
                 FROM pokemon p
                 LEFT JOIN pokemon_tipo pt ON p.numero_pokedex = pt.numero_pokedex
                 LEFT JOIN tipo t ON pt.id_tipo = t.id_tipo
                 WHERE p.nombre LIKE '%$busqueda%'";

    if (!empty($tipo)) {
        $consulta .= " AND t.nombre = '$tipo'"; // Agregar filtro por tipo de Pokémon si se especificó
    }

    $consulta .= " GROUP BY p.numero_pokedex, p.nombre
                   ORDER BY p.numero_pokedex";

    $resultado = $con->query($consulta);

    if ($resultado->num_rows > 0) {
        echo "<table class='pokemon-table'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>POKEMON</th>
                        <th>NOMBRE</th>
                        <th>TIPOS</th>
                    </tr>
                </thead>
                <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            $numeroPokedex = $fila['numero_pokedex'];
            $gif = "gifPokemon/" . $numeroPokedex . ".gif";
            $tipos = explode(",", $fila['tipos']);

            echo "<tr>
                    <td rowspan='" . count($tipos) . "'>" . $numeroPokedex . "</td>
                    <td rowspan='" . count($tipos) . "'><img src='" . $gif . "' alt='Imagen Pokémon'></td>
                    <td rowspan='" . count($tipos) . "'>" . $fila['nombre'] . "</td>";

            foreach ($tipos as $tipo) {
                $nombreTipoSinEspacios = str_replace(' ', '', $tipo);
                $imagenTipo = "Tipos/" . $nombreTipoSinEspacios . ".png";
                echo "<td><img src='" . $imagenTipo . "' alt='Imagen Tipo'></td></tr>";
            }
        }

        echo "</tbody></table>";
    } else {
        echo "<p>No se encontraron Pokémons en la base de datos que coincidan con la búsqueda.</p>";
    }
}

$con->close();
?>

</div>
</body>
</html>