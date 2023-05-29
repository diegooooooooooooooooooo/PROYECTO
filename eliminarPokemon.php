<?php
include "abrirBBDD.php";

// Crear el procedimiento almacenado eliminarPokemon
mysqli_query($con, "
    CREATE PROCEDURE eliminarPokemon(IN nombrePokemon VARCHAR(100))
    BEGIN
        -- Desactivar temporalmente las restricciones de clave externa
        SET FOREIGN_KEY_CHECKS = 0;

        -- Consulta para eliminar el Pokémon de la base de datos
        DELETE FROM pokemon WHERE nombre = nombrePokemon;

        -- Activar nuevamente las restricciones de clave externa
        SET FOREIGN_KEY_CHECKS = 1;
    END;
");

if (isset($_POST['submit'])) {
    if (isset($_POST['nombrePokemon'])) {
        $nombrePokemon = mysqli_real_escape_string($con, $_POST['nombrePokemon']);

        // Llamar al procedimiento almacenado para eliminar el Pokémon
        $consulta = "CALL eliminarPokemon('$nombrePokemon')";

        // Desactivar temporalmente las restricciones de clave externa
        mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');

        if (mysqli_query($con, $consulta)) {
            // Eliminación exitosa
            echo "El Pokémon '$nombrePokemon' se ha eliminado de la base de datos.";
        } else {
            // Error al eliminar el Pokémon
            echo "Error al eliminar el Pokémon: " . mysqli_error($con);
        }

        // Activar nuevamente las restricciones de clave externa
        mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 1');
    }
}


?>