function is_fone(){
	var fone = document.getElementById("fone").value;
	var regex = /^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	if(regex.test(fone)){
		document.getElementById('fone1').style.color = "green";
		document.getElementById("btConfirmar").disabled = false;
	}else{
		document.getElementById('fone1').style.color = "red";
		document.getElementById("btConfirmar").disabled = true;
	}
}

function is_idade(){
	var idade = document.getElementById("idade").value;
	var regex = /^[1-9][0-9]$/;
	var regex2 = /^[5-9]$/;
	if(regex.test(idade) || regex2.test(idade)){
		document.getElementById('idade1').style.color = "green";
		document.getElementById("btConfirmar").disabled = false;
	}else{
		document.getElementById('idade1').style.color = "red";
		document.getElementById("btConfirmar").disabled = true;
	}
}