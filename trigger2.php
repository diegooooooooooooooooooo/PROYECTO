<?php
include "abrirBBDD.php";

// Crear la tabla pokemons_eliminados si no existe
$sql_create_table = 'CREATE TABLE IF NOT EXISTS pokemons_eliminados (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        nombre VARCHAR(255),
                        fecha_elimination DATETIME
                    )';
mysqli_query($con, $sql_create_table);

// Eliminar el trigger si existe
$sql_drop_trigger = "DROP TRIGGER IF EXISTS eliminarPokemon_trigger";
if (mysqli_query($con, $sql_drop_trigger)) {
    echo 'Trigger eliminado correctamente.<br>';
} else {
    echo 'Error al eliminar el trigger: ' . mysqli_error($con) . '<br>';
}

// Crear el trigger para insertar los datos del Pokémon eliminado en la tabla pokemons_eliminados
$query = "
CREATE TRIGGER eliminarPokemon_trigger
AFTER DELETE ON pokemon
FOR EACH ROW
BEGIN
    INSERT INTO pokemons_eliminados (nombre, fecha_elimination) VALUES (OLD.nombre, NOW());
END";

if (mysqli_query($con, $query)) {
    echo "El trigger 'eliminarPokemon_trigger' ha sido creado correctamente.";
} else {
    echo "Error al crear el trigger 'eliminarPokemon_trigger': " . mysqli_error($con);
}

mysqli_close($con);
?>