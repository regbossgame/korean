<div style="text-align:left;width:500px;">
<form action="addorder.php" method="POST">

<input type="text" name="tel" id="tel" placeholder="Номер телефона" maxlength="50" class="inp2" onBlur="chinp(this,5);"/><br>

<input type="text" id="name" name="name" placeholder="Ваше имя" maxlength="50" class="inp2" onBlur="chinp(this,2);"/> <br>

<?


$sql="SELECT * FROM city ORDER BY name,zen ASC";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);
		
	
echo "<select name='city' id='city' class='inp2' onblur='editcart(-1);' onclick='editcart(-1);' onchange='editcart(-1);'>";
echo "<option value='-'>...Выберите город и доставку</option>/n";
echo "<option value='-1'>Таганрог - Экспресс доставка</option>/n";
echo "<option value='-2'>Таганрог - Обычная доставка</option>/n";

for($i=0;$i<$k;$i++){
	
	$id=@mysql_result($result, $i,"id");
	$name=@mysql_result($result, $i,"name");
	$zen=@mysql_result($result, $i,"zen");
	
	echo "<option value='".$name."*".$zen."'>$name - $zen руб</option>/n";
	
}
echo "</select>";

//<input type="text" id="city" name="city" placeholder="" value="г Таганрог" maxlength="50" class="inp2"/><br>
?>


<span style='font-size:11pt;' id='inf1'>Стоимость доставки зависит от суммы и города</span>
<br>
<br>


<input type="text" id="street" name="street" placeholder="Улица" maxlength="50" class="inp2"/><br>


<input type="text" id="hous" name="hous" placeholder="Дом (корпус)" maxlength="50" class="inp2"/><br>

<input type="number" min="0" max="9000" id="kv" name="kv" placeholder="Квартира" maxlength="50" class="inp2"/><br>

<input type="number" min="0" max="9000" id="pod" name="pod" placeholder="Подъезд" maxlength="50" class="inp2"/><br>

<textarea name="com" placeholder="Комментарий к заказу (не обязательно)" maxlength="300" class="inp2"></textarea><br>

<h2 id='intotal'>Не выбран способ доставки</h2>

<input type="submit" id="btno" disabled style="cursor:no-drop;" class="buy_now" value="ОФОРМИТЬ ЗАКАЗ">

</form>
</div>


<script type="text/javascript">
function gender2str(gender) {
  return gender === "MALE" ? "Мужчина" :
         gender === "FEMALE" ? "Женщина" : "";
}

// по имени
$("#name").suggestions({
  token: "2246880939520b701cb3bd3661647713c531d04d",
  type: "NAME",
  params: {
    parts: ["NAME"]
  },
  onSelect: function(suggestion) {
    $("#gender").text(gender2str(suggestion.data.gender));
  }
});


</script>

<?
/*
<table border=1><tr>
<td colspan=2>
<input type="text" id="name" name="name" placeholder="Ваше имя" maxlength="50" class="inp2"/> <br>
</td></tr>
<tr>
<td colspan=2>
<input type="text" id="city" name="city" placeholder="" maxlength="50" class="inp2"/><br>
</td></tr>
<tr>
<td colspan=2>
<input type="text" id="street" name="street" placeholder="Улица" maxlength="50" class="inp2"/><br>
</td></tr>
<tr>
<td>
<input type="text" id="hous" name="hous" placeholder="Дом (корпус)" maxlength="50" class="inp2"/><br>
</td><td>
<input type="text" id="pod" name="pod" placeholder="Подъезд" maxlength="50" class="inp2"/><br>
</td>
</tr><tr><td>
<input type="text" id="kv" name="kv" placeholder="Квартира" maxlength="50" class="inp2"/><br>
</td><td>
<input type="text" name="tel" placeholder="Номер телефона" maxlength="50" class="inp2"/><br>
</td></tr><tr>
<td colspan=2>
<input type="submit" value="Заказать">
</td></tr>
</table>
</form>
</div>

*/

?>