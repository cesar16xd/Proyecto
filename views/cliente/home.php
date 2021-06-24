<?php
    $user = $this->d['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- link de estilos de bootstrap -->
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/profile.css">

  <title>Tecnologyservices</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row" style="height:100vh">
      <!----------- PANEL IZQUIERDO --------->
      <div class="col-sm-3 left">
        <?php require_once 'views/cliente/panelIzquierdo.php'; ?>
      </div>
      <!--------- PANEL DERECHO ----------->
      <div class="col-sm-9 rigth">
      <div class="title">Mi Perfil</div>
        <div class="change_profile">
          <img src="public/img/image_perfil.png" class="despues">
          <a class="camera"><img src="public/img/camera.png"></a>
        </div>
        <div class="client_data container">
          <div class="row">
            <div class="col-sm-6">
              <p><b style="color:black">Nombre : </b> Cesar Wilder</p>
              <p><b style="color:black">Celular : </b> 999-999-999</p>
              <p><b style="color:black">Direccion: </b> calle 40</p>
            </div>
            <div class="col-sm-6">
              <p><b style="color:black">Apellido : </b> Abanto Barrios</p>
              <p><b style="color:black">Celular : </b><?php echo $user->getCorreo(); ?></p>
            </div>
          </div>
        </div>
        <div class="buttons">
          <button class="btn" data-bs-toggle="modal" data-bs-target="#edit_info">
            <p class="edit">Editar Informacion</p>
          </button>
          <button class="btn" data-bs-toggle="modal" data-bs-target="#change_pass">
            <p class="change_password">Cambiar Contraseña</p>
          </button>
        </div>
      </div>
      <!--Cierre de panel derecho-->
    </div>
    <!--Cierre de Row-->
  </div>
  <!--Cierre de Column-->

  <!-- Modal Editar informacion-->
  <div class="modal fade" id="edit_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:450px;">
      <div class="modal-content">
        <div class="modal-headerr">
          <h5 class="modal-title" id="exampleModalLabel">Editar Informaion</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <div class="modal-bodyy">
          <form action="">
            <div class="container content">
              <div class="row">
                <div class="col-6">
                  <label>Nombre</label>
                  <input type="text" style="width: 168px;" placeholder="Cesar Wilder">
                </div>
                <div class="col-6" style="margin-left: -15px;">
                  <label>Apellido</label>
                  <input type="text" style="width: 168px;" placeholder="Abanto Barrios">
                </div>
                <div class="col-12">
                  <label>Celular</label><br>
                  <input class="in_content" type="text" placeholder="999-999-99">
                </div>
                <div class="col-12">
                  <label>Correo</label><br>
                  <input class="in_content" type="text" placeholder="cesarwilder@upn.pe">
                </div>
                <div class="col-12">
                  <label>Direccion</label><br>
                  <input class="in_content" type="text" placeholder="av las naciones 40">
                </div>
              </div>
              <div class="enviar col-12">
                <div class="btn-save" data-bs-dismiss="modal">Guardar Cambios</div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Change Password -->
  <div class="modal fade" id="change_pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:406px;border-radius: 25px;">
      <div class="modal-content">
        <div class="modall-headerr">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <div class="modal-bodyy">
          <form action="">
            <div class="container content2">
              <div class="row">
                <div class="col-12">
                  <label>Actual</label><br>
                  <input class="in_content" type="text" style="width:243px;">
                </div>
                <div class="col-12">
                  <label>Nuevo</label><br>
                  <input class="in_content" type="text" style="width:243px;">
                </div>
                <div class="col-12">
                  <label>Repetir nueva contraseña</label><br>
                  <input class="in_content" type="text" style="width:243px;">
                </div>
              </div>
              <div class=" col-12">
                <div class="btn-save1" style="width:243px;" data-bs-dismiss="modal">Guardar Cambios</div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="public/js/jquery-3.5.1.min.js"></script>
  <script src="public/js/popper-1.16.0.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  
</body>

</html>