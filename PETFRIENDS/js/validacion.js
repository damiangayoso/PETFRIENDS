	function valida() {

			nombre=document.getElementById('register_nombre').value; 
 			apellido=document.getElementById('register_apellido').value;
 			mail=document.getElementById('register_correo').value;
 			password=document.getElementById('register_password').value;
 			password2=document.getElementById('register_repeat_password').value;
 			

 	if (nombre == "") 
 		{
        alert("Tiene que escribir su nombre");
        return false;
    	}
    var compara=/^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
	if (compara.test(document.getElementById("register_nombre").value)){
	}

	else{
	alert("El nombre no debe tener campos numericos");
	return false;
	}	

	if (apellido == "" )
	{
		alert ("El campo apellido esta vacio");
		return false;
	}
	if (compara.test(document.getElementById("register_apellido").value)){
	}

	else{
	alert("El apellido no debe tener campos numericos");
	return false;
	}	

	if (mail == "" )
	{
		alert ("El campo Correo electronico esta vacio");
		return false;
	}
	if (password == "" )
	{
		alert ("El campo contraseña esta vacio");
		return false;
	}
	else
		if (password != password2)
		{
			alert("Las contraseñas no son iguales");
			return false;
		}
	
 
 }


	


	
