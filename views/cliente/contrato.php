<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil Cliente</title>
  <!-- link de estilos de bootstrap -->
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/customer_contratos_section.css">
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
        <div class="title">Historial de Contratos</div>
        <div class="container content_table">
          <table class="table">
            <thead align="center">
              <tr>
                <th>Fecha</th>
                <th>Codigo de contrato</th>
                <th>Estado</th>
                <th>Detalles</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr class="table-info">
                <td>15/04/2021</td>
                <td>NC_004</td>
                <td>Aceptado</td>
                <td style="cursor: pointer;"><img src="public/img/Enmascarar grupo 2.png"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- scripts de bootstrap -->
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/popper-1.16.0.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
</body>

</html>