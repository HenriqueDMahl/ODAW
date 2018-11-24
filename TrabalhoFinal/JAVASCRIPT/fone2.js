function is_fone2(id){
	var str = id.toString();
	var fone = document.getElementById("fone"+str).value;
	var regex = /^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	if(regex.test(fone)){
		document.getElementById('foneLb'+str).style.color = "green";
		document.getElementById('btConf'+str).disabled = false;
	}else{
		document.getElementById('foneLb'+str).style.color = "red";
		document.getElementById('btConfirmar'+str).disabled = true;
	}
}

function is_email_table(id){     
	var str = id.toString();
	var email = document.getElementById("email"+str).value; 
	var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if(emailReg.test(email)){
		document.getElementById('emailLb'+str).style.color = "green";
		document.getElementById("btConfirmar"+str).disabled = false;
	}else{
		document.getElementById('emailLb'+str).style.color = "red";
		document.getElementById("btConfirmar"+str).disabled = true;
	}
	return emailReg.test(email); 
} 


function is_idade_table(id){ 
	var str = id.toString();
	var idade = document.getElementById("idade"+str).value;
	var regex = /^[1-9][0-9]$/;
	var regex2 = /^[5-9]$/;
	if(regex.test(idade) || regex2.test(idade)){
		document.getElementById('idadeLb'+str).style.color = "green";
		document.getElementById("btConfirmar"+str).disabled = false;
	}else{
		document.getElementById('idadeLb'+str).style.color = "red";
		document.getElementById("btConfirmar"+str).disabled = true;
	}
}