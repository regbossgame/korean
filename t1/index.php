<?

$str=$_GET["cat"];

if ($str==""){$str="main";}

$tit=array();
$tmen=array();
$link=array();

$i=0;
$tmen[$i]="Главная";
$link[$i]="main";
$tit[$link[$i]]="Корейские салаты в Таганроге, заказать доставку. Бесплатная доставка!";
$i++;

$tmen[$i]="Каталог";
$link[$i]="cataloge";
$tit[$link[$i]]="Каталог корейских салатов в Таганроге";
$i++;

$tmen[$i]="О нас";
$link[$i]="about-us";
$tit[$link[$i]]="О нас - Корейские салаты в Таганроге";
$i++;

$tmen[$i]="Корзина";
$link[$i]="cart";
$tit[$link[$i]]="Корзина - Корейские салаты в Таганроге";
$i++;


include "top.php";

//if ($str=="main"){
	include "slider.php";

include "men.php";

if ($str=="main"){
	echo '<div class="sme"></div>';}else{echo '<div class="sme2"></div>';}

?>

<div class='content'>
<table border=0 width=1300px><tr valign=top align=center>
<td>
<?
include $str.".php";

?>
</td><td width=300px>

<?
include "left.php";
?>

</td></tr></table>
</div>

</center>
</body>
</html>