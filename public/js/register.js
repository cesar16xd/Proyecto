function init(){
  changeTipoUsuario();
  onkeyPressTextNumber();
  getDataDepartamento();
  getDataProvincia();
  getDataDistrito();
}

function changeTipoUsuario(){
  let direccion = $("#direccion");
  $("input[name=perfilCuenta]:radio").change(function(){
    direccion.attr(
      "placeholder",
      $(this).val() == 100 ? "Domicilio" : "Centro de labor");
  });
}
// tipos de documentos
function onkeyPressTextNumber(){
  
  let validacion = true;
  $("#divDocument").click(function(){
    if(validacion){
      toastr.options.positionClass = "toast-top-left";
      toastr.warning("","ingrese el tipo de documento");
    }
  });
  
  $("input[name=celular]").keypress(function(){
    if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
  });

  $("#documento").change(function(){
    validacion = false;
    $("input[name=numDocumento]").attr("disabled",false);
    $("input[name=numDocumento]").val("");
    $("input[name=numDocumento]").keypress(function(){
      if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
    });
    if($("#documento").val() == 'DNI')
      $("input[name=numDocumento]").attr("maxlength",8);
    else if($("#documento").val() == 'RUC')
      $("input[name=numDocumento]").attr("maxlength",11);
    else if($("#documento").val() == 'CARNET EXT.')
    $("input[name=numDocumento]").attr("maxlength",12);
    else if($("#documento").val() == 'PASAPORTE')
    $("input[name=numDocumento]").attr("maxlength",12);
  });
  

}
// lista de departamentos
function getDataDepartamento(){
  let selectDepart = $("#selectDepart");
  selectDepart.empty();
  let option = $('<option />', { text: 'Departamento', value: 0, selected: true, hidden: true});
  selectDepart.prepend(option);
  $.ajax({
    url:'http://localhost:8080/TecnologyServices/common/getDepartamento', 
    type: "GET",
    dataType: 'json',
    success:function(result){
      console.log(result);
      for(let i=0;i<result.length;i++){
        let departamento = result[i];
        option = $('<option />', { text: departamento.nombre.charAt(0).toUpperCase() + departamento.nombre.slice(1).toLowerCase(), value: departamento.idDepartamento});
        selectDepart.prepend(option);
      }
   },
    error:function(result){
      console.log('error');
      console.log(result);
    }
 });
}

// lista de Provincias
function getDataProvincia(){
  $("#selectDepart").change(function(){
    let selectProvincia = $("#selectProvincia");
    let idDepartamento = $("#selectDepart").val();
    selectProvincia.empty();
    let option = $('<option />', {text: 'Provincia',value: 0,selected: true,hidden: true});
    selectProvincia.prepend(option);
    if(idDepartamento == 0) return;
    $.ajax({
      url:'http://localhost:8080/TecnologyServices/common/getProvincia', 
      type: "GET",
      dataType: 'json',
      data:{
        'idDepartamento' : idDepartamento
      },
      success:function(result){
        console.log(result);
        for(let i=0;i<result.length;i++){
          let provincia = result[i];
          option = $('<option />', { text: provincia.nombre.charAt(0).toUpperCase() + provincia.nombre.slice(1).toLowerCase(), value: provincia.idProvincia});
        selectProvincia.prepend(option);
        }
      },
      error:function(result){
        console.log('error');
        console.log(result);
      }
    });
  });
}

// lista de distritos
function getDataDistrito(){
  $("#selectProvincia").change(function(){
    let selectDistrito = $("#selectDistrito");
    let idProvincia = $("#selectProvincia").val();
    selectDistrito.empty();
    let option = $('<option />', {text: 'Distrito',value: 0,selected: true,hidden: true});
    selectDistrito.prepend(option);
    if(idProvincia == 0) return;
    $.ajax({
      url:'http://localhost:8080/TecnologyServices/common/getDistrito', 
      type: "GET",
      dataType: 'json',
      data:{
        'idProvincia' : idProvincia
      },
      success:function(result){
        console.log(result);
        for(let i=0;i<result.length;i++){
          let distrito = result[i];
          option = $('<option />', { text: distrito.nombre.charAt(0).toUpperCase() + distrito.nombre.slice(1).toLowerCase(), value: distrito.idDistrito});
          selectDistrito.prepend(option);
        }
      },
      error:function(result){
        console.log('error');
        console.log(result);
      }
    });
  });
}