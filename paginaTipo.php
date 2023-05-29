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
	    <form class="formulario" method="POST">
	    	<input type="text" name="busqueda" placeholder="Escribe el nombre de un Pokémon...">
	    	<input type="submit" value="Buscar">
	    	<select name="tipo">
                <option value="">Todos los tipos</option>
                <option value="Agua">Agua</option>
                <option value="Fuego">Fuego</option>
                <option value="Planta">Planta</option>
				<option value="Tierra">Tierra</option>
				<option value="Psquico">Psiquico</option>
				<option value="Volador">Volador</option>
				<option value="Roca">Roca</option>
				<option value="Lucha">Lucha</option>
				<option value="Bicho">Bicho</option>
				<option value="Hielo">Hielo</option>
				<option value="Elctrico">Electrico</option>
                
            </select>
	
	    </form>
	    <div class="tabla">
	    	<?php include_once("consultaTipo.php"); ?>
	    </div>
    </div>

    <script>

    </script>
</body>
</html>