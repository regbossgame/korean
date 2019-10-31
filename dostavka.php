<h1>Доставка</h1>
<p>Мы предоставляем <strong>два вида доставки</strong> по городу Таганрогу:</p>
<table border=0 width=930px align='left' cellspacing=0 cellpadding=0><tr align='center' valign='top' height=265px>
<td width=460px>
<h2>Экспресс</h2>(около часа) <strong>120</strong> руб <br> Бесплатно от <strong><? echo $dos1; ?></strong> руб
<p></p>
<img src="images/express.png" height=150px/></td>
<td width=9px style="background:url(images/vert1.png);">
</td>
<td>
<h2>Обычная</h2> (c 18-00 до 21-00) <strong>60</strong> руб <br> Бесплатно от <strong><? echo $dos2; ?></strong> руб
<br>
<img src="images/dostavka.png" height=170px/>
</td>
</tr>
<tr height=25px>
<td colspan=3>
</td>
</tr>
</table>

<h3>Стоимость доставки в другие населенный пункты (около 2 часов) <br> Бесплатно от <strong><? echo $dos3; ?></strong> руб:</h3>
<div style="height:270px;">
<?

	$sql="SELECT * FROM city ORDER BY name,zen ASC";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

for($i=0;$i<=$k;$i++){
	
	$id=@mysql_result($result, $i,"id");
	$name=@mysql_result($result, $i,"name");
	$zen=@mysql_result($result, $i,"zen");
	
	$zen="<strong>".$zen."</strong> руб.";
	
	if ($i==$k){$name="Другие н. пункты";$zen="<strong>Договорная</strong>";}
	
	echo "<div class='pynkt1'>".$name." - ".$zen."</div>";

}

?>
</div>