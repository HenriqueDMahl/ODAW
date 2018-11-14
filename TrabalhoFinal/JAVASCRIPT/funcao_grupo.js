function adicionar() {
	var id_membro = document.getElementById('contatos').value;
	var texto = document.getElementById('txtArea').value;
	if(texto == ""){
		texto = ""+id_membro;
		var x = document.getElementById('contatos').options[id_membro].disabled = true;
	}else{
		texto += ","+id_membro;
		var y = document.getElementById('contatos').options[id_membro].disabled = true;
	}
	document.getElementById('txtArea').value = texto;
}