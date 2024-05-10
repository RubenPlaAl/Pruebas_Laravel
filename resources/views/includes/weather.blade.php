<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../js/main.js" ></script>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card1">
                <div class="card-body1">
                    <div class="form-group">
                        <label for="city-select">Selecciona una ciudad:</label>
                        <select id="city-select" class="form-control">
                            <option value="Madrid">Madrid</option>
                            <option value="London">Londres</option>
                            <option value="New York">Nueva York</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time"></label>
                        <div id="time" class="form-control"></div>
                    </div>
                    <div class="form-group">
                        <label for="weather"></label>
                        <div id="weather" class="form-control"></div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

<script>
    $(document).ready(function () {
        // Función para obtener el tiempo de una ciudad utilizando AJAX
        function obtenerTiempo(ciudad) {
            // URL de la API del tiempo
            var apiUrl = 'https://api.openweathermap.org/data/2.5/weather?q=' + ciudad + '&appid=e22ab0e6918748dbd2aafb54bd07f33e';

            // Realizar la petición AJAX
            $.ajax({
                url: apiUrl,
                type: 'GET',
                success: function (data) {
                    // Actualizar el contenido del div de clima con la información recibida
                    $('#weather').text('Clima: ' + data.weather[0].description);
                },
                error: function (error) {
                    console.error('Error al obtener el clima:', error);
                    $('#weather').text('Error al obtener el clima');
                }
            });
        }

        // Evento de cambio en el selector de ciudades
        $('#city-select').change(function () {
            // Obtener el valor seleccionado del selector
            var selectedCity = $(this).val();
            
            // Llamar a la función obtenerTiempo para obtener el clima de la ciudad seleccionada
            obtenerTiempo(selectedCity);
        });

        // Función para obtener la hora actual y mostrarla
        function mostrarHora() {
            // Obtener la hora actual
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var timeString = hours + ':' + minutes;

            // Actualizar el contenido del div de hora con la hora actual
            $('#time').text('Hora: ' + timeString);
        }

        // Llamar a la función mostrarHora para mostrar la hora actual al cargar la página
        mostrarHora();
    });
</script>
