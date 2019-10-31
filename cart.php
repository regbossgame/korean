<h1 style='color:#FF0000;'><i>Корзина временно не работает, Вы можете совершить заказ по телефону сайта 8(928)120-82-68 / Попробуй лучшее!</i></h1>

<h1>Корзина</h1>
<table border=0 width=945px cellspacing=0 cellpadding=0>
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
<?

$sql = "DELETE FROM cart WHERE treg<".(time()-86400);
$result = @mysql_query("$sql",$db);



$sql="SELECT * FROM cart WHERE ssid LIKE '$ssid'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);
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
	
	
	echo "<tr>
	<td width=110px>
	<a class='rim' href='".$imgmax."' rel='lightbox[plants]' title='".$name." (".$catname.")"."'>
	 <img src='".$img."' width=96px style='border:1px solid #999999;' title='".$name." (".$catname.")"."'>
	</a>
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
	 <input type='number' maxlength='4' min='".$st."' step='".$st."' max='9000' value='".$kol."' class='inp' id='num".$lot."' onblur='chnum(this,".$typ.");editcart(".$lot.");' onclick='chnum(this,".$typ.");' onchange='chnum(this,".$typ.");editcart(".$lot.");'/> ".$ngr."
	</td>
	
	<td>
	 <span id='szen".$lot."'>".($zen*($kol/$st))."</span> руб
	</td>
	<td>
	 <a href='delcart.php?id=".$id."'>X</a>
	</td>
	</tr>
	<tr>
	<td colspan=7>
	<hr>
	</td>
	</tr>
	";
	
}

	echo "<tr height=48px>
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
	
echo "<tr height=48px>
	<td colspan=4>

	</td>
	<td>
	Доставка
	<br>
	<br>
	<br>
	</td>
	<td colspan=2>
	<span id='dosta'>-</span>
	<br>
	<br>
	<a href='delcart.php?id=-1'>Отчистить корзину</a>	
	</td>
	</tr>";	

echo "</table>
<br>
<br>";
if ($k>0){
//include "form1.php";
}else{echo "<p>Ваша корзина пуста, что бы сделать заказ, сначало заполните её из <a class='aa' href='/?str=cataloge'>КАТАЛОГА</a></p>";}
?>
<br>
<br>