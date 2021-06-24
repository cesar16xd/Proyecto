<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/toastr.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/estilosLogin.css" type="text/css">
    
    <title>Tecnologyservices</title>
  </head>
  <body>
      <section>
        <div class="row g-0">
            <div class="col-lg-6 d-none d-lg-block">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item img-1 min-vh-100 active" id="imagen1">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="font-weight-bold">La más potente del mercado</h5>
                          <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                        </div>
                      </div>
                      <div class="carousel-item img-2 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="font-weight-bold">Descubre la nueva generación</h5>
                          <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                        </div>
                      </div>
                      <div class="carousel-item img-3 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="font-weight-bold">La mas potente del mercado</h5>
                          <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                        </div>
                      </div>
                      <div class="carousel-item img-4 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="font-weight-bold">Descubre la nueva generación</h5>
                          <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            <div class="col-lg-6 d-flex flex-column align-items-end min-vh-100" style="background-color: #e6dfdc;">
                <div class="px-lg-5 pt-lg-2 pb-lg-1 p-4 mb-auto w-100">
                  <p class="mb-0 text-center" style="color: black;">
                    <img src="public/img/LogoLogin.png" class="img-fluid" />
                  </p>
                </div>
                <div class="align-self-center w-100 py-1 px-5">
                  <h5 id="titleLogin" class="fs-2 text-center font-weight-bold mb-4">Personas Ayudándose entre si</h5>
                    <form id="formAccess" class="mb-3" action="<?php echo constant('URL'); ?>/login/autenticacion" method="POST">
                      <div class="mb-3 text-center">
                          <div class="form-check form-check-inline"  >
                            <input type="radio" class="form-check-input" name="perfilCuenta" id="idCliente" value="100" checked>
                              <label for="idCliente" class="form-check-label">Cliente</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="perfilCuenta" id="idTecnico" value="200">
                              <label for="idTecnico" class="form-check-label">Tecnico</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="perfilCuenta" id="idAdministrador" value="300">
                              <label for="idAdministrador" class="form-check-label">Colaborador</label>
                          </div>
                      </div>
                      <div class="mb-4 px-5">
                          <input type="email" class="form-control" id="txtEmail" placeholder="correo electrónico" name="correo" aria-describedby="emailHelp" >
                      </div>
                      <div class=" px-5">
                        <input type="password" class="form-control mb-2" placeholder="contraseña" name="contraseña" id="txtContraseña">
                        <span><i class="fa fa-eye pt-1 px-2" aria-hidden="true" id="eye"></i></span>
                      </div>
                      <div class="text-center mb-2">
                      <a href="" id="emailHelp" class="">¿Has olvidado tu contraseña?</a>
                      </div>
                      <div class="text-center">
                        <button id="btnSubmit" type="submit" class="btn py-2">Iniciar sesión</button>
                      </div>
                      
                    </form>

                  <p class="font-weight-bold text-center">O inicia sesión con</p>
                  <div class="d-flex justify-content-around">
                      <button type="button" class="btn btn-outline-secondary flex-grow-1 mr-2"><i class="fab fa-google fa-2x py-1"></i> Google</button>
                      <button type="button" class="btn btn-outline-secondary flex-grow-1 ml-2"><i class="fab fa-facebook-f fa-2x py-1"></i> Facebook</button>
                  </div>
                </div>
                <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
                    <p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p>
                    <a href="registrar" 
                      class="font-weight-bold text-decoration-none">Crea una ahora</a>
                </div>
            </div>
        </div>
      </section>

    <script src="https://kit.fontawesome.com/410cc9aa2d.js" crossorigin="anonymous"></script>
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/popper-1.16.0.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/toastr.min.js"></script>
    <script src="public/js/access.js"></script>
    <script  type="text/javascript">
      $( window ).on( "load", function() {
        init();
    });
    </script>
    <?php $this->showMessages(); ?>
  </body>
</html>