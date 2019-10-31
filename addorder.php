<?
session_start();
$ssid=$_SESSION["ssid"];
include "bd.php";


$txt2="";


$txt="<table border=0 cellspacing=0 cellpadding=0 width=945px cellspacing=0 cellpadding=0>
<tr>
	<td>
	 Фото
	</td>
	<td>
	 Название
	</td>
	<td>
	 Категория
	</td>
	<td>
	 Цена
	</td>
	<td>
	 Кол-во
	</td>
	<td>
	 Сумма
	</td>
	<td>
	  
	</td>
</tr>
";



$sql="SELECT * FROM cart WHERE ssid LIKE '$ssid'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);
	
	if ($k<=0){HEADER("LOCATION: index.php");die("-");}
	
$sum=0;
$gram=0;
	for($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");
	$lot=@mysql_result($result, $i,"lot");
	$zen=@mysql_result($result, $i,"zen");
	$name=@mysql_result($result, $i,"name");
	$catname=@mysql_result($result, $i,"catname");
	$typ=@mysql_result($result, $i,"typ");
	$kol=@mysql_result($result, $i,"kol");
	
	include "calcngr.php";
	
	
	if ($typ<10){$gram+=$kol;}
	
	//$sum+=$zen*($kol/100);
	include "calcst.php";
	
	$sum+=$zen*($kol/$st);
	
	$img="lots/".($lot).".jpg";
	$imgmax="lots/max/".($lot).".jpg";
	
	include "noimg.php";
	
	$txt2.=($lot)."|".$name."|".$catname."|".$zen."руб / ".$st.$ngr."|".$kol." ".$ngr."|=".($zen*($kol/$st))." руб.<br>";
	
	$txt.="<tr>
	<td width=110px>
	 <img src='".$host."/".$img."' width=96px style='border:1px solid #999999;' title='".$name." (".$catname.")"."'>
	</td>
	<td>
	 ".$name."
	</td>
	<td>
	 ".$catname."
	</td>	
	<td>
	 ".$zen."руб / ".$st.$ngr."
	</td>
	<td>
	 <span>".$kol."</span> ".$ngr."
	</td>
	
	<td>
	 <span id='szen".$lot."'>".($zen*($kol/$st))."</span> руб
	</td>
	<td>
	 
	</td>
	</tr>
	<tr>
	<td colspan=7>
	<hr>
	</td>
	</tr>
	";
	
}

	$txt.="<tr height=48px>
	<td colspan=4>
	
	</td>
	<td>
	<span id='kols2'>".$gram."</span> гр
	</td>
	<td>
	<strong><span id='suma2'>".$sum."</span></strong> руб
	</td>
	<td>
	
	</td>
	</tr>";
	
$txt.= "
	</table>
	";	

	
$name=$_POST["name"];
$tel=$_POST["tel"];
$city=$_POST["city"];
$street=$_POST["street"];
$hous=$_POST["hous"];
$kv=$_POST["kv"];
//$dost=$_POST["dost"];
$pod=$_POST["pod"];
$com=$_POST["com"];

$h=$sum;

if ($city!="-1" && $city!="-2"){
$tmp=explode("*",$city);
$city=$tmp[0];
$dost=$tmp[1];
if ($sum<$dos3){$h+=$dost;$dost="За город (".$dost."р)";}else{$dost="Бесплатно";}

}



if ($city=="-1"){
	$city="Таганрог";
	if ($sum<$dos1){$h+=120;$dost="Экспресс (120р)";}else{$dost="Бесплатно";}
}

if ($city=="-2"){
	$city="Таганрог";
	if ($sum<$dos2){$h+=60;$dost="Обычная (60р)";}else{$dost="Бесплатно";}
}

//$sms="К оплате: ".$h." руб. ".$name.". ".$city.", ".$street.", д".$hous.", кв".$kv.". тел: ".$tel;
$sms="Заказ: ".$h." руб. ".$name.". ".$city.", " .$tel;

$txt.="<h3>К оплате: ".$h." руб</h3>
Имя: $name <br>
Телефон: $tel <br>
Город: $city <br>
Доставка: $dost <br>
Улица: $street <br>
Дом (Корпус): $hous <br>
Квартира: $kv <br>
Подьезд: $pod <br>
Комментарий: $com <br>
";

//$txt.=$sms;

$_SESSION["lasto"]=$txt;

//echo $txt;

	$type="order";
	include "gen_id.php";


$sql = "INSERT INTO orders ( id,zen,gram,name,city,street,hous,pod,kv,tel,dost,intotal,com,txt,treg ) VALUES ('$nid','$sum','$gram','$name','$city','$street','$hous','$pod','$kv','$tel','$dost','$h','$com','$txt2','".time()."')";
 $result = @mysql_query("$sql",$db);

// echo $result."|".$sql;
 
 if (($result*1)!=0){
	 $sql = "DELETE FROM cart WHERE ssid LIKE '$ssid'";
	$result = @mysql_query("$sql",$db);

$body2=file_get_contents("https://sms.ru/sms/send?api_id=978DD179-5B7B-BB31-C07F-0FDB57363E10&to=79508658966&text=".urlencode($sms));
	
	
$to  = "smskimsim@mail.ru";//wirtbox@mail.ru


$subject = "www.korean-salads.ru НОВЫЙ ЗАКАЗ!";


$message = ' 
<html> 
    <head> 
        <title>KOREAN-SALADS.RU SITE ORDER!</title> 
    </head> 
    <body> 
	<h2>Новый заказ №'.$nid.'</h2>
        <p>'.$txt.'</p> 
    </body> 
</html>'; 

//Content-type: text/html; charset=\"windows-1251\" \r\n Reply-To: $from \r\n", "-f$from

$headers  = 'Content-type: text/html; charset="utf-8" \r\n ';
$headers .= 'From: $to \r\n';
$headers .= 'Reply-To: $to \r\n';


$r1=mail($to, $subject, $message, $headers);
//$r1=1;



}
 //echo "|".$r1."|";
 
 if ($r1!=""){
 	HEADER("LOCATION: /?str=info&ty=good&id=".$nid);
 }else{
	HEADER("LOCATION: /?str=info&ty=fail");
 }


?>