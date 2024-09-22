 src="https://code.jquery.com/jquery-3.6.0.min.js"

    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Evitar el envío del formulario

            $.ajax({
                type: 'POST',
                url: '../controller/buscar.php', // Asegúrate de que la ruta sea correcta
                data: $(this).serialize(), // Enviar los datos del formulario
                success: function(response) {
                    $('#resultadoBusqueda').html(response); // Mostrar los resultados en el contenedor
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud: " + error); // Manejo de errores
                }
            });
        });
    });
