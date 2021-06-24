<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Perfil Cliente</title>
 <!-- link de estilos -->
 <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" >
 <link rel="stylesheet" type="text/css" href="public/css/customer_tecnicos_section.css" >
</head>

<body>
 <div class="container-fluid">
  <div class="row">
   <!----------- PANEL IZQUIERDO --------->
    <div class="col-sm-3 left">
      <?php require_once 'views/cliente/panelIzquierdo.php'; ?>
    </div>
   <!--------- PANEL DERECHO ----------->
   <div class="col-sm-9 right">
    <div class="filtrado">
     <span>Filtrar por : </span>
     <div class="dropdown">
      <button class="dropdown-toggle drop" type="button" id="dropdownMenuButton1"
        data-bs-toggle="dropdown" aria-expanded="false"> Categoria </button>
      <!-- lista de Categorias -->   
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Categoria</a></li>
        </ul>
     </div>
     <div class="dropdown">
      <button class="dropdown-toggle drop" type="button" id="dropdownMenuButton2" 
      data-bs-toggle="dropdown" aria-expanded="false"> Servicio </button>
      <!-- lista de Servicios -->
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
          <li><a class="dropdown-item" href="#">Servicio</a></li>
        </ul>
     </div>
     <div class="dropdown">
      <button class="dropdown-toggle drop" type="button" id="dropdownMenuButton3"
       data-bs-toggle="dropdown" aria-expanded="false"> Popularidad </button>
        <!-- lista de popularidad -->
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
          <li><a class="dropdown-item" href="#">Popularidad</a></li>
        </ul>
     </div>
    </div>

    <!-- cards de tecnicos -->
    <div class="container">
     <div class="row">
      <div class="col-12 contenido_primera_seccion">
       <div class="col-4" style="margin-top:40px;">
        <div class="card" style="width: 234px;">
         <img src="public/img/tecnico1_card.png" class="card-img-top">
         <div class="card-body">
          <h5 class="card-title">Carlos Chung</h5>
          <p class="card-text">descripcion del tecnico y area en la que esta especializado(breve descrpicion)</p>
          <button class="btn" data-bs-toggle="modal" data-bs-target="#contactar">Contactar</button>
         </div>
        </div>
       </div>
      </div>
      <!-- segunda seccion -->
      <div class="col-12 contenido_primera_seccion">
       <div class="col-4" style="margin-top:40px;">
        <div class="card" style="width: 234px;">
         <img src="public/img/tecnico1_card.png" class="card-img-top">
         <div class="card-body">
          <h5 class="card-title">Carlos Chung</h5>
          <p class="card-text">descripcion del tecnico y area en la que esta especializado(breve descrpicion)</p>
          <button href="#" class="btn">Contactar</button>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>

   </div>

   <!-- modal de contacto -->
   <div class="modal fade" id="contactar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
     <div class="modal-content">
      <div class="modal-body">
       <div class="container">
        <div class="row">
         <div class="col-12 info_tecnico">
          <div class="col-4"><img src="public/img/perfil/perfil_defecto.png"></div>
          <div class="col-4">
           <span><b>Tecnico</b></span><br>
           <span>Luis Nilson Palma Campos</span><br><br>
           <span><b>Total de atenciones</b></span><br>
           <span>250</span>
          </div>
          <div class="col-4">
           <span><b>Calificacion</b></span><br>
           <span><img src="public/img/estrella.png"></span>
           <span><img src="public/img/images/estrella.png"></span>
           <span><img src="public/img/images/estrella.png"></span>
           <span><img src="public/img/images/estrella.png"></span><br><br>
           <span><b>Estado</b></span><br>
           <span><img src="public/img/images/Elipse 17.png"></span>
           <span>Disponible</span>
          </div>
         </div>
         <div class="col-12 contactoss">
          <span style="align-self: start;margin-left: 45px;"><b>Motivo de contacto : </b></span><br>
          <div class="motivo">
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, dolore quasi accusamus iusto aliquam mollitia
            omnis. Laudantium doloribus commodi maiores possimus, amet adipisci ex quod facere, optio eum nobis minima!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. A, dolore quasi accusamus iusto aliquam mollitia
            omnis. Laudantium doloribus commodi maiores possimus, amet adipisci ex quod facere, optio eum nobis minima!
           </p>
          </div>
           <button class="envia_consulta">Enviar</button>
         </div>
        </div>
       </div>
      </div>

     </div>
    </div>
   </div>


   <!-- link de scripts-->
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/popper-1.16.0.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
</body>

</html>