function pegaID(id) {
	var arg = Number(id);
	
	var lista = <?php echo select(arg); ?>
	alert(lista);
 
}
//https://stackoverflow.com/questions/15757750/how-can-i-call-php-functions-by-javascript