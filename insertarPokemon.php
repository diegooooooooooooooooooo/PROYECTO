<?php
include 'abrirBBDD.php';

// Crear la tabla pokemons_anadidos si no existe
$sql_create_table = 'CREATE TABLE IF NOT EXISTS pokemons_anadidos (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        numero_pokedex INT,
                        nombre VARCHAR(255),
                        peso FLOAT,
                        altura FLOAT,
                        tiempo DATETIME
                    )';
mysqli_query($con, $sql_create_table);
 

$numero_pokedex = mysqli_real_escape_string($con, $_GET['numero_pokedex']);
$nombre = mysqli_real_escape_string($con, $_GET['nombre']);
$altura = mysqli_real_escape_string($con, $_GET['altura']);
$peso = mysqli_real_escape_string($con, $_GET['peso']);

$sql_insert_pokemon = 'INSERT INTO pokemon (numero_pokedex, nombre, peso, altura) VALUES (' . $numero_pokedex . ', "' . $nombre . '", ' . $peso . ', ' . $altura . ')';

include 'trigger1.php';
if (mysqli_query($con, $sql_insert_pokemon)){
    echo '<script>alert("Pokémon creado correctamente");</script>';
} else {
    echo 'Error: ' . mysqli_error($con);
}
?>