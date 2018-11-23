function is_fone2(id,color,bt){
	var fone = document.getElementById(''+id+'').value;
	var regex = /^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	if(regex.test(fone)){
		document.getElementById(''+color+'').style.color = "green";
		document.getElementById(''+bt+'').disabled = false;
	}else{
		document.getElementById(''+color+'').style.color = "red";
		document.getElementById(''+bt+'').disabled = true;
	}
}