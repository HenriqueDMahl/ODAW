function adicionar() {
	var id_membro = document.getElementById('contatos').value;
	var ids = document.getElementById('ids').value;
	var texto = document.getElementById('txtArea').value;
	if(texto == ""){
		ids = ""+id_membro;
		texto = ""+document.getElementById('contatos').options[id_membro].text;
		var x = document.getElementById('contatos').options[id_membro].disabled = true;
	}else{
		ids += ","+id_membro;
		texto += ","+document.getElementById('contatos').options[id_membro].text;
		var y = document.getElementById('contatos').options[id_membro].disabled = true;
	}
	document.getElementById('ids').value = ids;
	document.getElementById('txtArea').value = texto;
}