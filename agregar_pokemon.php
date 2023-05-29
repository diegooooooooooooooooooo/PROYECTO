<!DOCTYPE html>
<html>
<head>
    <style>
       /* Estilo para la tabla */
       table {
            border-collapse: collapse;
            width: 120%;
        }   
        th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-family: "VT323", monospace;
        cursor: pointer;
    }

    th {
        position: sticky;
        top: 0;
        background-color: #ff0000;
        color: #ffffff;
    }

    /* Estilo para el contenedor de la tabla */
    .table-container {
        max-height: 1500px;
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

    /* Estilo para el botón de eliminar */
    .delete-button {
    width: 24px;
    height: 24px;
    cursor: pointer;
    left: 20px;
}
</style>
<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Función para obtener el valor de una celda
        function getCellValue(row, index) {
            return $(row).children('td').eq(index).text();
        }

        // Función para eliminar un Pokémon
        function deletePokemon(row) {
            var numeroPokedex = getCellValue(row, 0);
            // Aquí puedes hacer una solicitud AJAX para eliminar el Pokémon del backend
            // y luego eliminar la fila de la tabla
            $(row).remove();
        }

        // Asignar el evento de clic al botón de eliminar
        $(document).on('click', '.delete-button', function() {
            var row = $(this).closest('tr');
            deletePokemon(row);
        });

        // Función para agregar un nuevo Pokémon
        $('#agregar-pokemon').submit(function(event) {
            event.preventDefault();

            var numeroPokedex = $('#numero_pokedex').val();
            var nombrePokemon = $('#nombre_pokemon').val();
            var tipo = $('#tipo').val();

            // Aquí puedes hacer una solicitud AJAX para agregar el Pokémon al backend
            // y luego actualizar la tabla con el nuevo Pokémon

            // Ejemplo de solicitud AJAX usando jQuery:
            $.ajax({
                url: 'agregar_pokemon.php', // Archivo PHP que procesará la solicitud de agregar el Pokémon
                method: 'POST',
                data: {
                    numero_pokedex: numeroPokedex,
                    nombre_pokemon: nombrePokemon,
                    tipo: tipo
                },
                success: function(response) {
                    alert(response); // Mostrar una alerta con la respuesta del servidor
                    