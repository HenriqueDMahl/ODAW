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