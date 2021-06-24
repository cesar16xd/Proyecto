function init(){
    submitLogin();
    changeEyePass();
}
function changeEyePass(){
    $("#eye").click(function(){
        var color = $(this).css('color');
        if(color == "rgb(17, 14, 14)"){
            $(this).css('color','rgb(93, 173, 226)');
            $("#txtContraseña").attr('type','text');
        }else{
            $(this).css('color','rgb(17, 14, 14)');
            $("#txtContraseña").attr('type','password');
        }
    });
}

function Validate(){
    var validate = new Object();
    validate.boolean = true;
    validate.text="exito";
    var email = $("#txtEmail");
    var contraseña = $("#txtContraseña");
    var perfil = $("input:radio[name=perfilCuenta]:checked");
    console.log("email : " + email.val().length);
    console.log("contraseña : " + contraseña.val().length);
    console.log("perfil : " + perfil.val());
    if(email.val().length == 0) {
        validate.boolean=false;
        validate.text="Campo email";
    }
    else if(contraseña.val().length == 0) {
        validate.boolean=false;
        validate.text="Campo contraseña";
    }
    else if(perfil.val() == undefined){
        validate.boolean=false;
        validate.text="tipo de usuario";
    } 
    return validate;
}

function submitLogin(){
    $("#btnSubmit").click(function(){
        var validate = Validate();
        if(validate.boolean){
            $("#formAccess").submit();
        }else{
            toastr.options.positionClass = "toast-top-left";
            toastr.warning(validate.text, "FALTAN DATOS");
        }
    });
}