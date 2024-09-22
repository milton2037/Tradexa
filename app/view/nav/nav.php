<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
    <div class="container">
      <img src="../../assets/img/logos/WhatsApp Image 2024-09-09 at 12.29.36 PM.png" alt="Logo de TRADEXA" class="navbar-brand text-white" style="max-width: 4rem; max-height: 4rem; width: auto; height: auto;">
      <a class="navbar-brand text-white" href="../../../index.php">
        <i class="material-icons opacity-6 me-2"></i>
        TRADEXA
      </a>

      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
          <!-- <li class="nav-item">
            <form id="searchForm" class="input-group input-group-outline" method="POST" action="../../../app/controller/buscar.php"> 
              <label class="form-label">Buscar...</label>
              <input type="text" name="query" class="form-control"> 
              <button class="btn btn-outline-primary ms-2" onclick="window.location.href='../../../veiw/busquedas.php';" type="submit" >
                <i class="fas fa-search"></i>
              </button>
            </form>
          </li> -->


          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
              id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="material-icons opacity-6 me-2 text-md">article</i>
              Docs
              <img src="../../../assets/img/down-arrow-white.svg" alt="down-arrow" class="arrow ms-3 d-lg-block d-none">
              <img src="../../../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-3 d-lg-none d-block">
            </a>
            <ul
              class="dropdown-menu dropdown-menu-animation dropdown-menu-end dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg"
              aria-labelledby="dropdownMenuDocs">
              <div class="d-none d-lg-block">
                <ul class="list-group">
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md"
                      href="../../app/view/index.php">
                      <h6
                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                        Inicio</h6>
                      <span class="text-sm">Inicio de la pagina</span>
                    </a>
                  </li>

                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md"
                      href="../../app/view/busquedas.php">
                      <h6
                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                        Consulta de temas</h6>
                      <span class="text-sm">puedes consultar los temas que tenemos disponibles sobre el comercio internacional</span>
                    </a>
                  </li>

                  <li class="nav-item list-group-item border-0 p-0"></li>
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="#" data-bs-toggle="modal" data-bs-target="#modalTema">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                        Agregar Un Tema Nuevo
                      </h6>
                      <span class="text-sm">Puedes colaborar con nosotros agregando un tema nuevo</span>
                    </a>
                  </li>

                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="#" data-bs-toggle="modal" data-bs-target="#modalSubtema">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                        Agregar Un nuevo Subtema
                      </h6>
                      <span class="text-sm">Puedes colaborar con nosotros agregando un nuevo subtema a un tema ya existente</span>
                    </a>
                  </li>

                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="#" data-bs-toggle="modal" data-bs-target="#modalContenido"
                      href="../pages/busquedas.php">
                      <h6
                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                        Contenidos</h6>
                      <span class="text-sm">puedes consultar los temas que tenemos disponibles sobre el comercio internacional</span>
                    </a>
                  </li>


                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="#" data-bs-toggle="modal" data-bs-target="#modalTemaContenido"
                      href="../pages/busquedas.php">
                      <h6
                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                        Relacionar Contenidos</h6>
                      <span class="text-sm">puedes consultar los temas que tenemos disponibles sobre el comercio internacional</span>
                    </a>
                  </li>

                </ul>
              </div>
              <div class="row d-lg-none">
                <div class="col-md-12 g-0">
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="../../../pages/about-us.html">
                    <h6
                      class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                      Getting Started</h6>
                    <span class="text-sm">All about overview, quick start, license and contents</span>
                  </a>
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="../../../pages/about-us.html">
                    <h6
                      class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                      Foundation</h6>
                    <span class="text-sm">See our colors, icons and typography</span>
                  </a>
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="../../../pages/about-us.html">
                    <h6
                      class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                      Components</h6>
                    <span class="text-sm">Explore our collection of fully designed components</span>
                  </a>
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="../../../pages/about-us.html">
                    <h6
                      class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                      Plugins</h6>
                    <span class="text-sm">Check how you can integrate our plugins</span>
                  </a>
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="../../../pages/about-us.html">
                    <h6
                      class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                      Utility Classes</h6>
                    <span class="text-sm">For those who want flexibility, use our utility classes</span>
                  </a>
                </div>
              </div>
            </ul>
          </li>


        </ul>

      </div>
    </div>
  </nav>
   <!-- End Navbar -->
  <!-- -------- START HEADER 7 w/ text and video ------- -->
  <header class="bg-gradient-dark">
    <div class="page-header min-vh-45" style="background-image: url('../../../assets/img/logos/Diseño sin título.png');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center mx-auto my-auto">
            <h1 class="text-white">TRADEXA</h1>
            <p class="lead mb-4 text-white opacity-8"> “Conoce, Aprende y Estudia, el futuro te espera."</p>
          
          </div>
        </div>
      </div>
    </div>
  </header>

  <script src="../../../app/controller/script.js"></script>