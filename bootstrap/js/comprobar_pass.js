$(document).ready(function() {
	//variables
	var pass1 = $('[name=password]');
    var pass2 = $('[name=confirm_password]');
	var negacion = "Las contraseñas no coinciden";
	//oculto por defecto el elemento span
    var span = $("#resultado").html('<span></span>');
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion');	
	}
	if(valor2.length==0 || valor2==""){
        span.hide();	
	}
	if(valor1.length!=0 && valor1==valor2){
        span.hide();
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
    });
    pass1.keyup(function(){
        coincidePassword();
        });
});