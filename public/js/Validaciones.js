$("#ingresar").click(function(event){
		var error = 0;
		$('.aux').each(function(i, elem){
			if($(elem).val().trim() == ''){
				$(elem).css("border", "1px solid red");  
				error++;
				}
			else{
				$(elem).css("border", "1px solid #f2f2f2");
			}
			});
		
		if(error > 0){
			event.preventDefault();
			}
});

$( document ).ready(function() {
     $('#correoInvalido').hide();
});

$("#Registrarme").click(function(event){
		var error = 0;
		var eMail= document.getElementById('correo').value;
		var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		$('.aux').each(function(i, elem){
			if($(elem).val().trim() == ''){
				$(elem).css("border", "1px solid red");  
				error++;
				}
			else{
				$(elem).css("border", "1px solid #f2f2f2");
			}
			});
			
			
		if (eMail.length === 0)
		{
			$('#correo').css("border", "1px solid red");  
			error++;
		}   
		else
		{
			if ( !expr.test(eMail) )
			{
                $('#correo').css("border", "1px solid red");  
				error++;
				$('#correoInvalido').show(); 
			}
			else
			{
				$('#correoInvalido').hide(); 
			}
		}
		
		if(error > 0){
			event.preventDefault();
			}
});



$("#PublicarReseña").click(function(event){
		var error = 0;
		$('.datos').not('#paginas').not('#anio').each(function(i, elem){
			if($(elem).val().trim() == ''){
				$(elem).css("border", "1px solid red");  
				error++;
				}
			else{
				$(elem).css("border", "1px solid #f2f2f2");
			}
			});
		
		if(error > 0){
			event.preventDefault();
			}
});


$("#ModificarDatos").click(function(event){
		var error = 0;
		var eMail= document.getElementById('correo').value;
		var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		$('.datos').not('#biografia').each(function(i, elem){
			if($(elem).val().trim() == ''){
				$(elem).css("border", "1px solid red");  
				error++;
				}
			else{
				$(elem).css("border", "1px solid #f2f2f2");
			}
			});
			
			
		if (eMail.length === 0)
		{
			$('#correo').css("border", "1px solid red");  
			error++;
		}   
		else
		{
			if ( !expr.test(eMail) )
			{
                $('#correo').css("border", "1px solid red");  
				error++;
				$('#correoInvalido').show(); 
			}
			else
			{
				$('#correoInvalido').hide(); 
			}
		}
		
		if(error > 0){
			event.preventDefault();
			}
});


$(".btn-busqueda").click(function(event){
		var error = 0;
			if(document.getElementById('search').value === null || document.getElementById('search').value.length === 0
			|| /^\s+$/.test(document.getElementById('search').value))
				{
					error++;
				}

			if(error > 0){
				$('#search').css("border", "1px solid red");  
				event.preventDefault();
			}
});