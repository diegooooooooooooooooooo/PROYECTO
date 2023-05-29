<?php
include 'abrirBBDD.php';

// Eliminar los triggers si existen
$sql_drop_trigger = "DROP TRIGGER IF EXISTS insert_pokemon_trigger";
if (mysqli_query($con, $sql_drop_trigger)) {
    echo 'Trigger eliminado correctamente.<br>';
} else {
    echo 'Error al eliminar el trigger: ' . mysqli_error($con) . '<br>';
}

// Crear el trigger para la tabla pokemon
$sql_create_trigger = "
    CREATE TRIGGER insert_pokemon_trigger
    AFTER INSERT ON pokemon
    FOR EACH ROW
    BEGIN
        INSERT INTO pokemons_anadidos (numero_pokedex, nombre, peso, altura, tiempo)
        VALUES (NEW.numero_pokedex, NEW.nombre, NEW.peso, NEW.altura, NOW());
    END;
";

if (mysqli_query($con, $sql_create_trigger)) {
    echo 'Trigger creado correctamente.';
} else {
    echo 'Error al crear el trigger: ' . mysqli_error($con);
}
?>