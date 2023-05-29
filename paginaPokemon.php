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
	.formulario .button-shiny {
	  padding: 10px 20px;
	  font-size: 16px;
	  background-color: #42F32B;
	  color: white;
	  border-radius: 5px;
	  border: none;
	  cursor: pointer;
	}
	.formulario .button-shiny {
	  background-color: #FFD700;
	  margin-left: 100px;
	}
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
	.tabla table th, td {
	  padding: 8px;
	  text-align: left;
	  border-bottom: 1px solid #FFD700;
	}
	.tabla table th {
	  background-color: #FF0000;
	  color: white;
	}
	.button-shiny.normal {
	  background-color: #CCCCCC;
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

// Verificar si se ha enviado un nombre de movimiento en la búsqueda
if (isset($_GET['nombre_movimiento'])) {
	$nombre_movimiento = htmlentities($_GET['nombre_movimiento']);

	// Construir la consulta SQL utilizando el modo "IN BOOLEAN MODE"
	$sqlMovimientos = "SELECT nombre, pp, precision_mov
						FROM movimiento
						WHERE MATCH(nombre, descripcion) AGAINST ('$nombre_movimiento' IN BOOLEAN MODE)";

	$resultMovimientos = mysqli_query($con, $sqlMovimientos);

	if (!$resultMovimientos) {
		die('Consulta inválida: ' . mysqli_error($con));
	}

	echo "<table>
			<tr>
				<th><a href=\"?sort=nombre\">Nombre</a></th>
				<th><a href=\"?sort=pp\">PP</a></th>
				<th><a href=\"?sort=precision_mov\">Precisión</a></th>
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
} else {
	// Si no se ha especificado un término de búsqueda, devolver todos los movimientos
	$sqlMovimientos = "SELECT nombre, pp, precision_mov FROM movimiento";

	$resultMovimientos = mysqli_query($con, $sqlMovimientos);

	if (!$resultMovimientos) {
		die('Consulta inválida: ' . mysqli_error($con));
	}

	echo "<table>
			<tr>
				<th><a href=\"?sort=nombre\">Nombre</a></th>
				<th><a href=\"?sort=pp\">PP</a></th>
				<th><a href=\"?sort=precision_mov\">Precisión</a></th>
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