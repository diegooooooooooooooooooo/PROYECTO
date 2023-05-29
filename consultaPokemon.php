<!DOCTYPE html>
<html>
<head>
    <style>
       /* Estilo para la tabla */
       table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
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

            // Función para cambiar las fotos al hacer clic en los botones Shiny! o Normal
            $('#shinyButton').click(function() {
                $('.pokemon-table tbody tr').each(function() {
                    var numeroPokedex = $(this).find('td:first').text();
                    var gif = "gifShiny/" + numeroPokedex + ".gif";
                    $(this).find('td:eq(1) img').attr('src', gif);
                });
            });
            $('#normalButton').click(function() {
                $('.pokemon-table tbody tr').each(function() {
                    var numeroPokedex = $(this).find('td:first').text();
                    var gif = "gifPokemon/" + numeroPokedex + ".gif";
                    $(this).find('td:eq(1) img').attr('src', gif);
                });
            });
        });
    </script>
</head>
<body>
    <div class="table-container">
    <?php
         include "abrirBBDD.php";

         $consulta = "SELECT p.*, e.ps, e.ataque, e.defensa, e.especial, e.velocidad FROM pokemon p LEFT JOIN estadisticas_base e ON p.numero_pokedex = e.numero_pokedex";

         $resultado = $con->query($consulta);

         // Verifica si se encontraron resultados
         if ($resultado->num_rows > 0) {
            echo "<table class='pokemon-table'>";
            echo "<thead><tr><th>#</th><th>POKEMON </th><th>></th><th><a href='#' class='sort-link'>PS</a></th><th><a href='#' class='sort-link'>ATAQUE</a></th><th><a href='#' class='sort-link'>DEFENSA</a></th><th><a href='#' class='sort-link'>ESPECIAL</a></th><th><a href='#' class='sort-link'>VELOCIDAD</a></th></tr></thead>";
            echo "<tbody>";

            while ($fila = $resultado->fetch_assoc()) {
                $numeroPokedex = $fila['numero_pokedex'];
                $gif = "gifPokemon/" . $numeroPokedex . ".gif";

                echo "<tr><td>" . $numeroPokedex . "</td><td><img src='" . $gif . "' alt='GIF Pokémon'></td><td>" . $fila['nombre'] . "</td><td>" . $fila['ps'] . "</td><td>" . $fila['ataque'] . "</td><td>" . $fila['defensa'] . "</td><td>" . $fila['especial'] . "</td><td>" . $fila['velocidad'] . "</td></tr>";
            }

            echo "</tbody></table>";
        }
        
    
        mysqli_close($con);
        ?>
    </div>

</body>
</html>