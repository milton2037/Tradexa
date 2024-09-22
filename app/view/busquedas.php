<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="">
  <link rel="icon" type="image/png" href="../../assets/img/logos/Imagen de WhatsApp 2024-09-10 a las 10.43.16_93945347.jpg">
  <title>
    TRADEXA
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css">
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <!-- <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <?php include_once '../../pages/modales/agregarTema.php'; ?>
  <?php include_once '../../pages/modales/agregarSubtema.php'; ?>
  <?php include_once '../../pages/modales/agregarContenido.php'; ?>
  <?php include_once '../../pages/modales/agregarRelacionContenido.php'; ?>

  <?php include_once '../../app/view/nav/nav.php'; ?>

</head>

<body class="about-us bg-gray-200">

  <!-- -------- END HEADER 7 w/ text and video ------- -->
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- Sección padre con display flex -->
    <section class="py-9 d-flex flex-column">
    <!-- contenedor de espacios -->
        <!-- Barra de búsqueda -->
        <div class="row justify-content-center mb-5">
          <div class="col-lg-6">
            <form id="searchForm" class="input-group input-group-outline" method="POST" action="../../controller/buscar.php"> <!-- Enviar a buscar.php -->
              <label class="form-label">Buscar...</label>
              <input type="text" name="query" class="form-control"> <!-- Añadido name para el input -->
              <button class="btn btn-outline-primary ms-2" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </form>
          </div>
        </div>

        

        <div class="row flex-grow-1 w-100"> <!-- Añadido w-100 para ocupar todo el ancho disponible -->
          <!-- Sección Temas con barra de scroll visible -->
          <div class="col-md-2 mb-5 mb-md-0">
            <div class="h-100 p-3" style="border-right: 1px solid rgba(0,0,0,0.1);">
              <button class="btn " onclick="location.reload();">
                <h3>Temas</h3>
              </button>

              <div class="temas-scroll" style="height: 600px; overflow-y: scroll; scrollbar-color: rgba(0,0,0,0.1) transparent; scrollbar-width: thin;">
                <ul id="lista-temas">
                  <?php
                  include '../../db.php'; // Incluir la conexión a la base de datos

                  // Consulta para obtener los temas
                  $query = "SELECT titulo FROM temas"; 
                  $result = $conn->query($query);

                  // Verificar si hay resultados
                  if ($result->num_rows > 0) {
                    // Salida de cada fila
                    while ($row = $result->fetch_assoc()) {
                      // Cambiar a botón que llama a la función de búsqueda
                      echo "<li><button class='btn btn-link' style='text-decoration: none; color: inherit;' onclick=\"searchByTitle('" . $row['titulo'] . "')\">" . $row['titulo'] . "</button></li>";
                    }
                  } else {
                    echo "<li>No hay temas disponibles.</li>";
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <script>
            function searchByTitle(title) {
              // Establecer el valor del input de búsqueda y enviar el formulario
              $('input[name="query"]').val(title);
              $('#searchForm').submit();
            }
          </script>

          <!-- Sección Consulta -->
          <div class="col-md-8 mb-5 mb-md-0">
            <div class="h-100 p-3" id="resultadoBusqueda" style="max-height: 700px; overflow-y: auto; scrollbar-color: rgba(0,0,0,0.3) rgba(0,0,0,0.1); scrollbar-width: thin;"> <!-- Ajustado el tamaño y estilo del scroll -->
              <h3>Consulta</h3>
              <p>Realiza consultas específicas sobre comercio internacional.</p>
              <ul id="lista-temas">
                <?php
                // Consulta para obtener todos los temas
                $queryTemas = "SELECT * FROM temas"; 
                $resultTemas = $conn->query($queryTemas);

                // Verificar si hay resultados
                if ($resultTemas->num_rows > 0) {
                  while ($tema = $resultTemas->fetch_assoc()) {
                    echo "<li><strong>" . $tema['titulo'] . "</strong> " . nl2br($tema['descripcion']) . "</li>"; // Añadido nl2br para saltos de línea
                    // Consulta para obtener los subtemas relacionados
                    $querySubtemas = "SELECT * FROM subtemas WHERE tema_id = " . $tema['id'];
                    $resultSubtemas = $conn->query($querySubtemas);

                    if ($resultSubtemas->num_rows > 0) {
                      echo "<ul>"; // Iniciar lista de subtemas
                      while ($subtema = $resultSubtemas->fetch_assoc()) {
                        echo "<li><strong>" . $subtema['subtitulo'] . "</strong>: " . nl2br($subtema['descripcion']) . "</li>";

                        // Consulta para obtener los contenidos relacionados
                        $queryContenido = "SELECT * FROM contenido WHERE subtema_id = " . $subtema['id'];
                        $resultContenido = $conn->query($queryContenido);

                        if ($resultContenido->num_rows > 0) {
                          echo "<ul>"; // Iniciar lista de contenidos
                          while ($contenido = $resultContenido->fetch_assoc()) {
                            echo "<li>" . $contenido['informacion'] . "</li>" .  "<br>";
                          }
                          echo "</ul>"; // Cerrar lista de contenidos
                        }
                      }
                      echo "</ul>"; // Cerrar lista de subtemas
                    }
                  }
                } else {
                  echo "<li>No hay temas disponibles.</li>";
                }
                ?>
              </ul>
            </div>
          </div>

          <!-- Sección Subtemas -->
          <div class="col-md-2" style="height: 600px;"> <!-- Cambiado el tamaño del contenedor de subtemas -->
            <div class="h-100 p-2" style="border-left: 1px solid rgba(0,0,0,0.1); overflow-y: scroll; height: 1200px; scrollbar-color: rgba(0,0,0,0.1) transparent; scrollbar-width: thin;"> <!-- Aumentado height y modificado scrollbar -->
              <h3>Subtemas</h3>
              <ul id="lista-subtemas">
                <?php
                // Consulta para obtener los subtítulos de la tabla subtemas
                $query = "SELECT subtitulo FROM subtemas"; 
                $result = $conn->query($query);

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                  // Salida de cada fila
                  while ($row = $result->fetch_assoc()) {
                    // Cambiar a botón que llama a la función de búsqueda con clase para altura
                    echo "<li><button class='btn btn-link btn-sm' style='text-decoration: none; color: inherit;' onclick=\"searchByTitle('" . $row['subtitulo'] . "')\">" . $row['subtitulo'] . "</button></li>";
                  }
                } else {
                  echo "<li>No hay subtemas disponibles.</li>";
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Fin de la sección padre -->
  </div>
  <?php include_once '../../app/view/footer.php'; ?>




  <!--   Core JS Files   -->
  <!-- <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script> -->
  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <!-- <script src="../assets/js/plugins/countup.min.js"></script> -->
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script> -->
  <!-- <script src="../assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script> -->

  <script src="../db.js"></script> <!-- Asegúrate de que la ruta sea correcta -->
  <script src="../controller/script.js"> </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
</script>

<script>
  $(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const query = urlParams.get('query');
    if (query) {
      $('input[name="query"]').val(query); // Establecer el valor del input
      $('#searchForm').submit(); // Enviar el formulario automáticamente
    }
  });
</script>

</body>

</html>