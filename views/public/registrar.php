<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/toastr.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/estilosRegistrar.css" type="text/css">

    <title>Tecnologyservices</title>
</head>
<body>
    <main class="flex">
        <div class="container">
            <form action="<?php echo constant('URL');?>/registrar/nuevoUsuario" method="POST">
                <div class="row">
                    <h4 >Estas a un paso de formar parte de nuestra comunidad</h4>
                    <br><br>
                    <div class="listRadio mb-3 text-center">
                        <div class="form-check form-check-inline mx-5" >
                            <input class="form-check-input" type="radio" name="perfilCuenta" id="idCliente" value="100" checked>
                            <label for="idCliente" class="form-check-label">Cliente</label>
                        </div>
                        <div class="form-check form-check-inline mx-5">
                        <input class="form-check-input" type="radio" name="perfilCuenta" id="idTecnico" value="200">
                            <label for="idTecnico" class="form-check-label">Tecnico</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="col-6 me-3">
                            <div class="pt-1">
                                <select id="documento" name="tipoDocumento">
                                <option hidden selected>documento</option>
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="CARNET EXT.">CARNET DE EXTRANJERIA</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-5 ms-3" id="divDocument">
                            <input type="text" placeholder="numero de documento" name="numDocumento" id="txtNumDoc" disabled>
                        </div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Nombres" name="nombres">
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                    </div>
                    <div class="input-group input-group-icon ">
                        <div class="col-half" style="padding-right:10px">
                            <div class="input-icon"><i class="fa fa-user-tie"></i></div>
                            <input type="text" placeholder="A.Paterno" name="apPaterno">
                        </div>
                        <div class="col-half">
                            <div class="input-icon"><i class="fa fa-user-tie"></i></div>
                            <input type="text" placeholder="A.Materno" name="apMaterno">
                        </div>
                    </div>
                    <div class="input-group input-group-icon">
                        <!-- combo box de departamento -->
                        <div class="col-third">
                        <div class="input-group">
                            <select id="selectDepart">
                            <option selected="">Departamento</option>
                            <option value="Amazonas">Amazonas</option>
                            </select>
                        </div>
                        </div>
                        <!-- combo box de Provincias -->
                        <div class="col-third">
                        <div class="input-group">
                            <select id="selectProvincia">
                            <option value="0">Provincia</option>
                            </select>
                        </div>
                        </div>
                        <!-- combo box dee distrito -->
                        <div class="col-third">
                        <div class="input-group">
                            <select id="selectDistrito" name="distrito">
                            <option value="0">Distrito</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="input-group input-group-icon">
                        <input type="direccion" placeholder="Domicilio" name="direccion" id="direccion" >
                        <div class="input-icon"><i class="fas fa-house-user"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Teléfono móvil" name="celular" maxlength="9">
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="email" placeholder="Correo electrónico" name="correo">
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña" />
                        <div class="input-icon"><i class="fa fa-key"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="password" placeholder="Repetir Contraseña" id="repeatContraseña" >
                        <div class="input-icon"><i class="fa fa-key"></i></div>
                    </div>
                    <div class="row">
                        <button class="col-5 registro" type="submit" >Registrarse</button>
                        <a href="login" class="col-5 login" >Iniciar Sesión</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/410cc9aa2d.js" crossorigin="anonymous"></script>
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/popper-1.16.0.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/toastr.min.js"></script>
    <script src="public/js/register.js"></script>
    <script type="text/javascript">
        $( window ).on( "load", function() {
            init();
        });
    </script>
    <?php $this->showMessages(); ?>
</body>

</html>