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
	var email_usu = document.getElementById('email').value;
	var pass1 = document.getElementById('pass1').value;
	var pass2 = document.getElementById('pass2').value;
	var fone_usu = document.getElementsByName('fone')[0].value;
	var nome_usu = document.getElementsByName('nome')[0].value;
	var ender_usu = document.getElementsByName('ender')[0].value;
	var idade_usu = document.getElementsByName('idade')[0].value;
	var sexo_uso = "";
	var radios = document.getElementsByName('sexo');
	if(radios[0].value != ""){
		sexo_uso = "M";
	}
	if(radios[1].value != ""){
		sexo_uso = "F";
	}
	if(radios[2].value != ""){
		sexo_uso = "O";
	}
	if(is_pass_equal() && is_email && email != null && pass1 != null && pass2 != null && nome != "" && ender != "" & fone != ""){
		 $('.button').click(function() {
			 $.ajax({
				  type: "POST",
				  url: "../PHP_HTML/operacoes_banco.php",
				  data: { name: nome_usu, idade: idade_usu, end: ender_usu, pass: pass1, email: email_usu, fone: fone_usu, sexo: sexo_uso }
				}).done(function( msg ) {
					alert("dados salvos");
				});    
		});
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