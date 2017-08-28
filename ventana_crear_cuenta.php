<?php
	include 'head.php';
?>
<html>
<body>

	<div class="form-crear-cuenta">
	<p id="error-form" class="error">El formulario esta incompleto</p>
		<form action="crear_cuenta.php" method="post" id="form_step1">
			<fieldset>
				<legend>Formulario para registrarse</legend>
				<label>Nombre</label><input  type="text" maxlength="30" name="name" id="name" placeholder="Ingresa Nombre">
					<p id="error-name" class="error"> Ingrese nombre</p>
				<label>Apellido</label><input  type="text" maxlength="30" date-tipo='argentino' name="last_name" id="last_name" placeholder="Ingresa Apellido">
					<p id="error-ln" class="error">Ingrese apellido</p>
				<label>Fecha de nacimiento:</label>
				<input  type="text" placeholder="Ej. 12/09/1994" maxlength="30" name="bdate" id="bdate">
					<p id="error-date" class="error">Seleccione fecha de nacimiento </p>
				<label>Telefono:</label><input  type="numbrer" placeholder="2214508022" maxlength="16" name="phone" id="phone">
					<p id="error-phon" class="error">Ingrese numero de telefono</p>
				<label>Email:</label><input  type="email" maxlength="30" name="email" id="email" placeholder="Ingresa Email">
				<p id="error-mail" class="error">Ingrese email</p>
				<label>Clave:</label><input  type="password" maxlength="30" name="password1" id="password1" placeholder="Ingresa Una Clave">
					<p id="error-pas1" class="error">Ingrese contraseña</p>
				<label>Confirmar clave:</label><input  type="password" maxlength="30" name="password2" id="password2" placeholder="Ingresa Nuevamente una Clave">
					<p class="error" id="error-pas2" class="error">Repita la contraseña</p>
				
				<input type="submit" value="Crear cuenta" />
				<a href="index.php">Cancelar</a>
			</fieldset>
		</form>
	</div>
	
	
	
</body>
<script>
	
$(document).ready(function(){
    jQuery("#bdate").datepicker();

    jQuery("#bdate").keydown(function(){
    	return false;
    });
    jQuery('#bdate').change(function(){
    	jQuery('.error').hide();


    });
	// Contenido de jQuery
	function validarEmail(email){
   	var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
	    return (emailRegex.test(email));/* {
	     jQuery('#').hide();
	    } else {
	      jQuery('#comentario').show();

    	}
*/
	}

	jQuery('#name,#last_name').keydown(function(key){
		jQuery('.error').hide();
		if( ((key.keyCode<65) || (key.keyCode>90)) //key code letras minusculas
			&&(key.keyCode!=8)&&(key.keyCode!=32)) //key code retroceso y espacio
			return false;	
	});

	jQuery('#phone').keydown(function(pho){
		jQuery('.error').hide();
		if(((pho.keyCode<48)||(pho.keyCode>59))//key code  numeros 0-9
			&&(pho.keyCode!=8)&&(pho.keyCode!=32))//
			return false;

	});

	function validar(){

		var name= jQuery('#name').val(); var lname= jQuery('#last_name').val();
		var phon= jQuery('#phone').val(); var date=  jQuery('#bdate').val(); var email=jQuery('#email').val();
		var pas1= jQuery('#password1').val(); var pas2=jQuery('#password2').val();

		if(name === ''){        


			jQuery('#error-name').show();
			return false;
			
		}
		else
			jQuery('#error-name').hide();
		if(lname===''){
			jQuery('#error-ln').show();
			return false;
			
		}
		else
			jQuery('#error-ln').hide();
		if(date ===''){
			jQuery('#error-date').show();
			return false;
		}
		else
			jQuery('#error-date').hide();

		if(phon === ''){
			jQuery ('#error-phon').show();
			return false;
		}
		else
			jQuery ('#error-phon').hide();
		if(email===''){

			jQuery('#error-mail').show();
			return false;
		}
		else
		{
			if(validarEmail(email)==false)
			{
				jQuery('#error-mail').show();
				return false;
			}
			else
			{
				jQuery('#error-mail').hide();
			}
		}
		if(pas1=='')
		{
			jQuery('#error-pas1').show();
			return false;

		}
		else
			{
				jQuery('#error-pas1').hide();
			}	
		if((pas2==='')||(pas2!=pas1))
		{
			jQuery('#error-pas2').show();
			return false;

		}
		else
		{
			jQuery('#error-pas2').hide();
		}

	return true;

	}

	jQuery('input[type="submit"]').click(function(event){
		console.log(jQuery('#last_name').attr('date-tipo'));
		event.preventDefault();
		jQuery('.error').hide();
		//console.log(jQuery('#form_step1').serialize());
		//jQuery('input[type="submit"]').css("background","green");
		if(validar())
		{
			jQuery('#form_step1').hide();
			jQuery('#form_step1').submit();

		}
		else
		{
			jQuery('#form_step1').show();


		}


	});






  // jQuery('#email').keyup(function(email){
  	
  /*  jQuery('#password1,#password2').keydown(function(pas){

    	if(((pas.keyCode<65)||(pas.keyCode>90))//lestras minusculas
    		&&((pas.keyCode<48)||(pas.keyCode>59))//numeros
    		&&(pas.keyCode!=8)&&(pas.keyCode!=32))// retroceso y espacio

    		return false;


    })

*/

     /*jQuery("#fecha_nac").keydown(function (e) { e.preventDefault(); });
           jQuery("#fecha_nac").keyup(function (e) { e.preventDefault(); console.log(  jQuery("#fecha_nac").val() ); });
        // PERMITE QUE SOLO SE INGRESEN LETRAS
		jQuery("#apellido_comerciante,#nombre_comerciante,#nombre,#apellido,#estado_civil,#nota_part,#nombre_ref,#apellido_ref,#vinculacion_ref,#nota_part").keypress(function (key) {
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                //&& (key.charCode != 45) //retroceso
                && (key.charCode != 0) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
            return false;
        });*/
        // PERMITE QUE SOLO SE INGRESEN LETRAS Y NUMEROS
		jQuery("#password1,#password2").keypress(function (key) {
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                //&& (key.charCode != 45) //retroceso
                && (key.charCode != 0) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 				 && (key.charCode < 48 || key.charCode > 57) // numeros
                )
            return false;
        });
/*
        // PERMITE QUE SOLO SE INGRESEN NUMEROS
		jQuery('#nro_comerciante,#dni,#cbu,#area_part,#tel_part,#area_ref,#tel_ref,#plazo,#id-linea-cre,#id-nuevo-formulario,#cuil,#importe,#cuota').keypress(function (key){
           // this.value = (this.value + '').replace(/[^0-9]/g, '');
           //console.log(key.charCode);
           if ((key.charCode < 48 || key.charCode > 57) && (key.charCode != 0)) return false;
        });
*/
});
</script>