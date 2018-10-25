function is_email(){     
	var email = document.getElementById("email").value; 
	var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if(emailReg.test(email)){
		document.getElementById('email1').style.color = "green";
	}else{
		document.getElementById('email1').style.color = "red";
	}
	return emailReg.test(email); 
} 

function is_pass_equal(){
	var pass1 = document.getElementById('pass1').value;
	var pass2 = document.getElementById('pass2').value;
	var valido = false;
	if(pass1 == pass2){
		valido = true;
		document.getElementById('pass').style.color = "green";
		document.getElementById('passC').style.color = "green";
	}else{
		document.getElementById('pass').style.color = "red";
		document.getElementById('passC').style.color = "red";
	}
	return valido;
}

//AINDA TEM QUE COLOCAR MAIS VERIFICAÇÕES
function valida_registro(){
	if(is_pass_equal() && is_email){
		alert("dados salvos");
	}else{
		alert("campos obrigatórios falhos!");
	}
}