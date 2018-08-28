function bemvindo(){
	var pessoa = prompt("Informe seu nome:", "");
	if(pessoa != null){
		var d = new Date();
		var h = d.getHours();
		var str = "";
		if(h < 12){
			str = "Bom dia!";
		}else if(h >= 12 && h < 18){
			str = "Boa tarde!";
		}else{
			str = "Boa noite!";
		}
		str = str + ", " + pessoa + ", hoje é: " + diaSemana(d.getDay()) + " " + d.getDate().toString() + "/" + (d.getMonth() + 1).toString() + "/" + d.getFullYear().toString();
		alert(str);
	}
}
function verificar(){
	var x1 = document.getElementById('t3').value;
	var x2 = document.getElementById('t4').value;
	if(x1 == "" || x2 == ""){
		alert("Campos obrigatórios 3 e 4 não foram preenchidos!");
	}else{
		alert("Dados salvos!");
	}
}
function diaSemana(d){
	switch (d) {
		case 1:
			return "Segunda-feira";
			break;
		case 2:
			return "Terça-feira";
			break;
		case 3:
			return "Quarta-feira";
			break;
		case 4:
			return "Quinta-feira";
			break;
		case 5:
			return "Sexta-feira";
			break;
		case 6:
			return "Sabado";
			break;
		case 0:
			return "Domingo";
			break;
		default:
			break;
	}
}
function mini(){
	var x1 = document.getElementById('t1').value;
	var x2 = document.getElementById('t2').value;
	var x3 = document.getElementById('t3').value;
	x1 = x1.toLowerCase();
	x2 = x2.toLowerCase();
	x3 = x3.toLowerCase();
	document.getElementById('t1').value = x1;
	document.getElementById('t2').value = x2;
	document.getElementById('t3').value = x3;
}
function mai(){
	var x1 = document.getElementById('t1').value;
	var x2 = document.getElementById('t2').value;
	var x3 = document.getElementById('t3').value;
	x1 = x1.toUpperCase();
	x2 = x2.toUpperCase();
	x3 = x3.toUpperCase();
	document.getElementById('t1').value = x1;
	document.getElementById('t2').value = x2;
	document.getElementById('t3').value = x3;
}
function spam(){
	var s = 0;
	for(s = 0; s <= 10; s++){
		alert('YOU SHALL NOT PASS!');
	}
}
function data(){
	document.getElementById('paragrafo').innerHTML=Date();
}
var x = 1;
function loopTexto1() {
	if(x == 1){
		document.getElementById("texto1").innerHTML = "TEXTO ALTERADO!";
		x = 2;
	}else{
		document.getElementById("texto1").innerHTML = "Esse texto será mudado! Ao precionar o botão!";
		x = 1;
	}
}
var y = 1;
function loopTexto2(){
	if(y == 1){
		document.getElementById('texto2').style.fontSize='35px';
		y = 2;
	}else{
		document.getElementById('texto2').style.fontSize='16px';
		y = 1;
	}
}
var z = 1;
function loopLampada(){
	if(z == 1){
		document.getElementById('myImage').src='../IMAGENS/pic_bulbon.gif';
		z = 2;
	}else{
		document.getElementById('myImage').src='../IMAGENS/pic_bulboff.gif';
		z = 1;
	}
}
function popup() {
	alert('VOCE PRECIONOU ESSE BOTÃO');
}
