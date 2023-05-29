<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de Pokémons</title>
    <style>
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

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card th {
            text-align: center;
            font-weight: bold;
            padding: 10px;
        }

        .card td {
            padding: 10px;
        }

        .card input[type="number"],
        .card input[type="text"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .card select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .card .submit {
            width: 100px;
            height: 30px;
            padding: 0;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .pokemon-table {
            width: 100%;
            border-collapse: collapse;
        }

        .pokemon-table th,
        .pokemon-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .pokemon-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
<form action="RestaurarBBDD.php" method="post">
        <button class="restore-btn" type="submit">RESTAURAR BASE DE DATOS</button>
    </form>
<div class="container">
    
    <table class="card">
    <form id="insertar" name="insertar" method="get" action="insertarPokemon.php">
  <th colspan="2" style="text-align: center">Crear Pokemon</th>
  <tr>
    <td>Número pokedex</td>
    <td><input required type="number" name="numero_pokedex" id="numero_pokedex" value="<?php echo $siguienteNumero ?>"></td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><input required type="text" name="nombre" id="nombre" autofocus></td>
  </tr>
  <tr>
    <td>Peso</td>
    <td><input required type="number" min="0" max="1000" step="0.1" name="peso" id="peso"></td>
  </tr>
  <tr>
    <td>Altura</td>
    <td><input required type="number" name="altura" min="0" max="100" step="0.1" id="altura"></td>
  </tr>
  <tfoot>
    <tr>
      <td colspan="2">
        <input type="submit" value="Enviar" class="submit">
      </td>
    </tr>
  </tfoot>
</form>

    <table class="pokemon-table">
        <thead>
            <tr>
                <th>Número Pokédex</th>
                <th>Nombre</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Tiempo</th>
            </tr>
        </thead>
		
        <tbody>
            <?php
               include "abrirBBDD.php";

            $query = "SELECT * FROM pokemons_anadidos";
            $result = mysqli_query($con, $query);

            // Verificar si hay resultados
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['numero_pokedex'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '<td>' . $row['peso'] . '</td>';
                    echo '<td>' . $row['altura'] . '</td>';
                    echo '<td>' . $row['tiempo'] . '</td>';

                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>