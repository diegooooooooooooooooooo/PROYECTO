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

	.pikachu-container {
	  position: sticky;
	  top: 0;
	  left: 20;
	  z-index: 9999;
	}

	.pikachu-image {
	  width: 150px;
	  height: 150px;
	  transform: rotate(90deg);
	}

	.container {
	  margin-top: 30px;
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	}

	.tabla table {
	  width: 100%;
	  border-collapse: collapse;
	}

	.tabla {
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	}

	.tabla a {
	  display: inline-block;
	  padding: 20px 20px; /* Aumenta el valor del padding para mayor separación */
	  text-decoration: none;
	  color: #ffffff;
	  background-color: #FF0000;
	  border-radius: 5px;
	  font-weight: bold;
	  transition: transform 0.3s ease;
	  margin-bottom: 20px; /* Espacio entre los apartados de consultas */
	}

	.tabla a:hover {
	  transform: rotate(-3deg);
	}

	/* Estilos para la imagen flotante */
	.float-image-container {
	  position: relative;
	  z-index: 1;
	  margin-bottom: 20px; /* Aumenta el valor del margen inferior para mayor separación */
	  margin-top: -60px; /* Mueve la imagen flotante más arriba */
	}

	.float-image {
	  width: 800px; /* Ancho original de la imagen */
	  animation: floatAnimation 5s infinite alternate ease-in-out;
	}



	@keyframes floatAnimation {
	  0% {
	    transform: translateY(0);
	  }
	  50% {
	    transform: translateY(-20px);
	  }
	  100% {
	    transform: translateY(0);
	  }
	}
	</style>
</head>
<body>
	<div class="pikachu-container">
	  <img src="pikachuAsomado.png" alt="Descripción de la imagen" class="pikachu-image" />
	</div>

	<div class="tabla">
	  <div class="float-image-container">
	    <img src="pokemon.png" class="float-image" alt="Descripción de la imagen" />
	  </div>
	  <a href="paginaPokemon.php">CONSULTAR UN NOMBRE DE POKÉMON Y SUS CARACTERÍSTICAS</a>
	  
	  <div style="margin-bottom: 40px;"></div> <!-- Espacio adicional entre los apartados de consultas -->
	  
	  <a href="paginaTipo.php">CONSULTAR POKEMON Y SU TIPO</a>

	  <div style="margin-bottom: 40px;"></div> <!-- Espacio adicional entre los apartados de consultas -->
	  
	  <a href="paginaAgregar.php">MODIFICAR BASE DE DATOS(INSERTAR)</a>

	  <div style="margin-bottom: 40px;"></div> <!-- Espacio adicional entre los apartados de consultas -->
	  
	  <a href="paginaEliminar.php">MODIFICAR BASE DE DATOS(ELIMINAR)</a>

	  <div style="margin-bottom: 40px;"></div> <!-- Espacio adicional entre los apartados de consultas -->
	  
	  <a href="paginaMovimientos.php">CONSULTAR MOVIMIENTOS</a>

	  <div style="margin-bottom: 40px;" id="restaurar"></div> <!-- Espacio adicional entre los apartados de consultas -->
	  
	  <a href="restaurarBBDD.php">RESTAURAR BASE DE DATOS</a>
	</div>

</body>
</html>