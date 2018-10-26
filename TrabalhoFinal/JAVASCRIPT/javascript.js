function is_email(){     
	var email = document.getElementById("email").value; 
	var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if(emailReg.test(email)){
		document.getElementById('email1').style.color = "green";
		document.getElementById("btConfirmar").disabled = false;
	}else{
		document.getElementById('email1').style.color = "red";
		document.getElementById("btConfirmar").disabled = true;
	}
	return emailReg.test(email); 
} 

function is_email_2(email){     
	var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
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
		document.getElementById("btConfirmar").disabled = false;
	}else{
		document.getElementById('pass').style.color = "red";
		document.getElementById('passC').style.color = "red";
		document.getElementById("btConfirmar").disabled = true;
	}
	return valido;
}

//AINDA TEM QUE COLOCAR MAIS VERIFICAÇÕES
function valida_registro(){
	var email = document.getElementById('email').value;
	var pass1 = document.getElementById('pass1').value;
	var pass2 = document.getElementById('pass2').value;
	var fone = document.getElementsByName('fone')[0].value;
	var nome = document.getElementsByName('nome')[0].value;
	var ender = document.getElementsByName('ender')[0].value;
	if(is_pass_equal() && is_email && email != null && pass1 != null && pass2 != null && nome != "" && ender != "" & fone != ""){
		alert("dados salvos");
	}else{
		alert("campos obrigatórios falhos!");
	}
}

function nova_senha(){
	var email = prompt("Informe seu email:", "");
	var valido = is_email_2(email);
	if(valido){
		var texto = "Foi enviado um email de recuperação de senha para: " + email;
		alert(texto);
	}else{
		alert("Email invalido!");
	}
}