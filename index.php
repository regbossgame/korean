<?
session_start();

if ($_SESSION["ssid"]==""){
	$_SESSION["ssid"]=time()."-".Rand(100000,999999);
}

$ssid=$_SESSION["ssid"];

$str=$_GET["str"];

if ($str==""){$str="main";}

include "bd.php";


$cat=$_GET["cat"];
$namc="";
if ($cat!=""){
	$sql="SELECT * FROM cat WHERE id LIKE '$cat'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

		$i=0;
		$namc=" / ".@mysql_result($result, $i,"name");
	
}

$dos1=700;
$dos2=500;
$dos3=1000;
	  
$tel="8(950)865-89-66";//"8(928)120-82-68";

$cname="&#171;Корейские салаты&#187; в Таганроге с доставкой! (Корейские салаты Таганрог доставка) купить корейские салаты";

$tit=array();
$tmen=array();
$link=array();

$i=0;
$tmen[$i]="Главная";
$link[$i]="main";
$tit[$link[$i]]="".$cname.". А так же: сыр тофу, соусы, приправы, акции в соц. сетях";
$i++;

$tmen[$i]="Каталог";
$link[$i]="cataloge";
$tit[$link[$i]]="Каталог".$namc." - ".$cname;
$i++;

$tmen[$i]="Доставка";
$link[$i]="dostavka";
$tit[$link[$i]]="Доставка - ".$cname;
$i++;


$tmen[$i]="О нас";
$link[$i]="about-us";
$tit[$link[$i]]="О нас - ".$cname;
$i++;

$tmen[$i]="Корзина";
$link[$i]="cart";
$tit[$link[$i]]="Корзина - ".$cname;
$i++;


include "top.php";

//if ($str=="main"){
	include "slider.php";

include "men.php";

if ($str=="main"){
	echo '<div class="sme"></div>';}else{echo '<div class="sme2"></div>';}

?>

<div class='content'>
<table border=0 width=1240px style="background-color:#FFFFFF;"><tr valign=top align=center>
<td width=1000px>
<?
include $str.".php";

?>
</td><td></td><td width=230px>

<?
include "left.php";
?>

</td></tr></table>
</div>

</center>
</body>
</html>