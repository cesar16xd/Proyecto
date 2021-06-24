<div class="picture_profile text-center">
        <img class="imagenPerfil" src="<?php echo $user->getImgPerfil(); ?>" alt="Foto_de_perfil">
</div>
<div class="usuario text-center">
    <h4 class=""><?php echo '$user->getPersona(0)->getNombres()'; ?></h4>
</div>
<div class="text-center mt-4">
    <a class="btn btn-dark" href="#">Cerrar Sesión</a>
</div>
<div class="text-center">
    <ul class="list-unstyled enlaces mt-5">
        <li class="mt-3">
            <img src="public/img/Mi_Perfil.png" alt="tecnico" style="width: 30px">
            <a class="h5 text-decoration-none" href="home">Mi Perfil</a>
        </li>
        <li class="mt-3">
            <img src="public/img/Contratos.png" alt="tecnico" style="width: 30px">
            <a class="h5 text-decoration-none" href="contratos">Contratos</a>
        </li>
        <li class="mt-3">
            <img src="public/img/Tecnico.png" alt="tecnico" style="width: 30px">
            <a class="h5 text-decoration-none" href="tecnicos">Tecnicos</a>
        </li>
    </ul>
</div>