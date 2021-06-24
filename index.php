<?php
    date_default_timezone_set("America/Lima");
    error_reporting(E_ALL);
    ini_set('ignore_repeated_errors',TRUE); // 1=repiten los errores , 0=no repiten los errores
    ini_set('display_errors',FALSE); // 1=mostrar al usuario , 0=ocultar al usuario
    ini_set('log_errors',TRUE); // 1=archivo LOG , 0=registro del servidor
    ini_set("error_log","C://xampp//htdocs//TecnologyServices//php-errors.log");
    /* ini_set("error_log","//TecnologyServices//php-errors.log"); */

    require_once 'libs/database.php';
    require_once 'classes/errormessages.php';
    require_once 'classes/successmessages.php';
    require_once 'libs/controller.php';
    require_once 'libs/model.php';
    require_once 'libs/view.php';
    require_once 'classes/session.php';
    require_once 'classes/sessioncontroller.php';
    require_once 'libs/app.php';

    require_once 'config/config.php';

    $app = new App();
?>
