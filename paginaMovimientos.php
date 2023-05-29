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
			margin-top: 10px; /* Ajuste el valor para reducir el espacio */
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.formulario {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}

		.formulario input[type="text"] {
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			border: none;
			margin-right: 10px;
		}

		.formulario input[type="submit"],

		.tabla {
			width: 70%;
			margin: auto;
			max-height: 1500px;
			overflow-y: scroll;
		}

		.tabla table {
			width: 100%;
			border-collapse: collapse;
		}

		.tabla table th,
		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #FFD700;
		}

		.tabla table th {
			background-color: #FF0000;
			color: white;
		}
	</style>
</head>
<body>
	<div style="text-align:center;">
		<img src="pokemon.png" width="500" height="200" alt="Descripción de la imagen" />
	</div>
	<div class="container">
		<form class="formulario" method="GET">
			<input type="text" name="nombre_movimiento" placeholder="Realiza búsqueda de movimiento">
			<input type="submit" value="Buscar">
		</form>
		<div class="tabla">
			<?php
			include "abrirBBDD.php";
           
			if (isset($_GET['nombre_movimiento'])) {
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
			}
			?>
		</div>
	</div>
    </body>
</html>