var a700=700;
var a500=500;
var a1000=1000;

function chinp(e,k){
	if (e.value.length<k){e.style="border:1px solid #FF0000;";}else{e.style="border:1px solid #BEBEBE;";}
}

function chnum(obj,typ){
	var i=0;
	i=obj.value;
	
	var a100=100;
	if (typ==1){a100=500;}
	if (typ==2){a100=200;}
	if (typ==3){a100=1000;}
	if (typ==10){a100=1;}
	if (typ==11){a100=1;}
	
	if ((i%a100)!=0){obj.value=Math.round(i/a100)*a100;}
	if (obj.value>9000){obj.value=9000;}
	if (obj.value<a100){obj.value=a100;}
}

var cart1;
var cart2;

function animcart(){
	cart1=document.getElementById("cart1");
	cart2=document.getElementById("cart2");
	
	cart1.style.opacity=0;
	cart2.style.opacity=0;
	
	for (i=1;i<=5;i++){
		setTimeout('cart1.style.opacity='+((i*2)/10.0),40*i);
		setTimeout('cart2.style.opacity='+((i*2)/10.0),40*i);
	}
		
	
}


function editcart(id){
var kol;

if (id!=-1){
var num=document.getElementById("num"+id);
	kol=num.value;
}else{kol=0;}
	makeRequest("editcart.php?id="+id+"&kol="+kol,2,"-");
	animcart();
}

function addcart(id){
	
	var num=document.getElementById("num"+id);
	var kol=num.value;
	
	makeRequest("addcart.php?id="+id+"&kol="+kol,1,"-");
	animcart();
}

function makeRequest(url,type,params)
{
var http_request = false;
if (window.XMLHttpRequest) 
{ // Mozilla, Safari, ...
http_request = new XMLHttpRequest();
if (http_request.overrideMimeType) 
{
http_request.overrideMimeType('text/xml');
}
} 
else if (window.ActiveXObject) 
{ // IE
try 
{
http_request = new ActiveXObject("Msxml2.XMLHTTP");
} 
catch (e) 
{
try 
{
http_request = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}
}
}

if (!http_request) 
{
//alert('Невозможно отобразить данные на странице');
return false;
}

http_request.onreadystatechange = function() { alertContents(http_request,type,params); };
http_request.open('POST', url, true);
http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http_request.setRequestHeader("Content-length", params.length);
http_request.setRequestHeader("Connection", "close");
http_request.send(params);
}

function alertContents(http_request,type,params) 
{
if (http_request.readyState == 4) 
{
if (http_request.status == 200) 
{

rt=http_request.responseText;
var res=rt.split('|');
var sum=document.getElementById('suma');
var kols=document.getElementById('kols');

sum.innerHTML=res[0]+" руб";
kols.innerHTML=res[1]+" гр";

if (type==2){
var sum2=document.getElementById('suma2');
var kols2=document.getElementById('kols2');
var szen=document.getElementById('szen'+res[3]);

if (res[3]!='-1'){
sum2.innerHTML=res[0];
kols2.innerHTML=res[1];
szen.innerHTML=res[2];
}

var city=document.getElementById('city');
var inf1=document.getElementById('inf1');
var dosta=document.getElementById('dosta');
var intotal=document.getElementById('intotal');
var btno=document.getElementById('btno');
//var tel=document.getElementById('tel');
	
rt=city.value;
	
if (rt=='-'){
	intotal.innerHTML='Не выбран способ доставки';
	dosta.innerHTML='-';
	inf1.innerHTML='Стоимость доставки зависит от суммы и города';
	btno.disabled=true;
	btno.style.cursor='no-drop';
}else{
		btno.style.cursor='pointer';
		btno.disabled=false;
	}

if (rt=='-1'){
	inf1.innerHTML='<strong>Экспресс</strong>(около часа) <strong>120</strong> руб. Бесплатно от <strong>'+a700+'</strong> руб';
	if ((res[0]*1)<a700){
	intotal.innerHTML='К оплате: '+((res[0]*1)+120)+'руб';
	dosta.innerHTML='120 руб';
	}else{
	intotal.innerHTML='К оплате: '+((res[0]*1))+'руб';
	dosta.innerHTML='Бесплатно';
	}
}

if (rt=='-2'){
	inf1.innerHTML='<strong>Обычная</strong> (c 18-00 до 21-00) <strong>60</strong> руб. Бесплатно от <strong>'+a500+'</strong> руб';
	if ((res[0]*1)<a500){
	intotal.innerHTML='К оплате: '+((res[0]*1)+60)+'руб';
	dosta.innerHTML='60 руб';
	}else{
	intotal.innerHTML='К оплате: '+((res[0]*1))+'руб';
	dosta.innerHTML='Бесплатно';
	}
}
var zz=0;

if (rt.indexOf("*")>0){
	zz=(res[0]*1);
	inf1.innerHTML='За город (около 2 часов). Бесплатно от <strong>'+a1000+'</strong> руб';
	res=rt.split('*');
	
	
	if (zz<a1000){
	intotal.innerHTML='К оплате: '+(zz+(res[1]*1))+'руб';
	dosta.innerHTML=res[1]+' руб';
	}else{
	intotal.innerHTML='К оплате: '+(zz)+'руб';
	dosta.innerHTML='Бесплатно';
	}
	
	//intotal.innerHTML='К оплате: '+(zz+(res[1]*1))+'руб';
	//dosta.innerHTML=res[1]+' руб';
	
}


	
}

//document.write(rt);
//alert(rt);
//document.getElementById('slider').innerHTML=rt;



}



}else{}//ещё разок если что
}