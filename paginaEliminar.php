<?php
include "abrirBBDD.php";

// Crear la tabla pokemons_eliminados si no existe
$query = "CREATE TABLE IF NOT EXISTS pokemons_eliminados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fecha_elimination TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($con, $query);

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
       /* Estilo para la tabla */
       table {
            border-collapse: collapse;
            width: 80%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-family: "VT323", monospace;
            cursor: pointer;
        }
        body {
          background-image: url("wallpaper_pokemon.jpg");
          background-size: auto;
          background-position: center center;
          background-repeat: no-repeat;
          overflow-y: scroll;
          height: 2160px;
          margin: 0;
          padding: 0;
        }
        th {
            position: sticky;
            top: 0;
            background-color: #ff0000;
            color: #ffffff;
        }

        /* Estilo para el contenedor de la tabla */
        .table-container {
            max-height: 400px;
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
        
        /* Estilo para el cuadrado marcado */
        .marked-square {
            width: 30px;
            height: 30px;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            cursor: pointer;
        }

        /* Estilo para la imagen de eliminar */
        .delete-icon {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

       
        });
    </script>
</head>
<body>
<h1>MARCA LOS POKÉMONS QUE QUIERES ELIMINAR Y DALE AL BOTÓN!</h1>
<div class="table-container">
        <!-- Agregar el formulario -->
        <form method="POST" action="eliminarPokemon.php">
    <input type="text" name="nombrePokemon" placeholder="Nombre del Pokémon">
    <input type="submit" name="submit" value="ELIMINAR POKÉMON">
</form>
        
       

        <!-- Código para mostrar los datos de pokemons_eliminados -->
        <h2>Pokémons Eliminados</h2>
        <p>Mostrará los resultados a partir del 2do pokemon eliminado</p>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de Eliminación</th>
            </tr>
            <?php
            include "abrirBBDD.php";

            // Consulta para obtener los datos de pokemons_eliminados
            $consulta = "SELECT * FROM pokemons_eliminados";

            $resultado = mysqli_query($con, $consulta);
            if ($resultado) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['nombre']."</td>";
                    echo "<td>".$row['fecha_elimination']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "Error al obtener los datos de pokemons_eliminados: " . mysqli_error($con);
            }

            mysqli_close($con);
            ?>
        </table>
    </div>
</body>
</html>