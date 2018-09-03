/**
 *
 *
 * EXERCICIO 6
 *
 *
 */

function somaNumeros(){
  var n1 = parseInt(document.getElementById("n1").value);
  var n2 = parseInt(prompt("2) Numero", ""));
  alert("Resultado: " + (n1+n2));
}

function mudaFonte(){
  var texto = "";
  for(i = 0; i <= 6; i++){
    texto += "<p><font size=" + i + ">" + "Teste" + "</p>" + "<br>";
  }
  document.getElementById("muf").innerHTML = texto;
}

function matematica(){
  var fat = [];
  var quad = [];
  var cubo = [];
  for(i = 0; i <= 10; i++){
    fat.push(factorial(i));
    quad.push(Math.pow(i,2));
    cubo.push(Math.pow(i,3));
  }
  document.getElementById("mat").innerHTML = "Fatorial: " + fat + "<br>" +
  "Quadrado: " + quad + "<br>" +
  "Cubo: " + cubo + "<br>";
}

function factorial(num)
{
    // If the number is less than 0, reject it.
    if (num < 0) {
        return -1;
    }
    // If the number is 0, its factorial is 1.
    else if (num == 0) {
        return 1;
    }
    var tmp = num;
    while (num-- > 2) {
        tmp *= num;
    }
    return tmp;
}


function CheckDate() {
  var pObj = document.getElementById('t3');
  var expReg = /^((0[1-9]|[12]\d)\/(0[1-9]|1[0-2])|30\/(0[13-9]|1[0-2])|31\/(0[13578]|1[02]))\/(19|20)?\d{2}$/;
  var aRet = true;
  if ((pObj) && (pObj.value.match(expReg)) && (pObj.value != '')) {
	var dia = pObj.value.substring(0,2);
	var mes = pObj.value.substring(3,5);
	var ano = pObj.value.substring(6,10);
	if (mes == 4 || mes == 6 || mes == 9 || mes == 11 && dia > 30){
    aRet = false;
  }
	else{
	  if ((ano % 4) != 0 && mes == 2 && dia > 28){
      aRet = false;
    } else {
		    if ((ano%4) == 0 && mes == 2 && dia > 29){
          aRet = false;
        }
      }
    }
  } else {
    aRet = false;
  }

  if(aRet){
    alert('Data Valida');
  }else{
    alert('Data Invalida');
  }
}

function checkMail(){
  var mail = document.getElementById('t2').value;
  var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
  if(typeof(mail) == "string"){
    if(er.test(mail)){
      alert('Email Valido');
      return;
    }else{
      alert('Email Invalido');
      return;
    }
  }else if(typeof(mail) == "object"){
    if(er.test(mail.value)){
      alert('Email Valido');
      return;
    }else{
      alert('Email Invalido');
      return;
    }
  }else{
    alert('Email Invalido');
    return;
  }
}

function TestaCPF() {
  var strCPF = document.getElementById('t1').value;
  var Soma;
  var Resto;
  Soma = 0;
if (strCPF == "00000000000")  {
  alert('CPF invalido');
  return;
}

for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(9, 10)) ) {
    alert('CPF invalido');
    return;
  }

Soma = 0;
  for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(10, 11) ) ) {
    alert('CPF invalido');
    return;
  }
  alert('CPF Valido');
}


/**
 *
 *
 * EXERCICIO 5
 *
 *
 */


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
    document.getElementById('myImage').src='pic_bulbon.gif';
    z = 2;
  }else{
    document.getElementById('myImage').src='pic_bulboff.gif';
    z = 1;
  }
}

function popup() {
    alert('VOCE PRECIONOU ESSE BOTÃO');
}
