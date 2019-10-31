<?


$sql="SELECT zen,kol,typ FROM cart WHERE ssid LIKE '$ssid'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);
$sum=0;
$gram=0;
	for($i=0;$i<$k;$i++){
	$zen=@mysql_result($result, $i,"zen");
	$kol=@mysql_result($result, $i,"kol");
	$typ=@mysql_result($result, $i,"typ");
	if ($typ<10){$gram+=$kol;}
	
	//$sum+=$zen*($kol/100);

include "calcst.php";
	
	$sum+=$zen*($kol/$st);

	
	
}

?>

<div class="menu">
<a href='/?str=cataloge'>
<div style="float:left;width:550px;height:65px;border:0px solid #FF0000;color:#FFFFFF;">
<img src="images/logo.png" height=60px style="float:left;"> <span style="text-align:left;font-size:18pt;">Попробуй лучшее!<br> <strong><? echo $tel; ?></strong> </span>
</div>
</a>

<table border=0 style="float:right;" align=center><tr align=center>
<?
for($i=0;$i<count($tmen);$i++){
$tt="<a href='/?str=".$link[$i]."' title='".$tit[$link[$i]]."'><div class='mbtn'>
<img src='images/men/".$link[$i].".png' height=24px alt='".$tmen[$i]."'/><br>
".$tmen[$i]."</div></a>";
if ($str==$link[$i]){$tt="
<a href='/?str=".$link[$i]."' title='".$tit[$link[$i]]."'>
<div class='mbtna'>
<img src='images/men/".$link[$i].".png' height=24px alt='".$tmen[$i]."'/><br>
".$tmen[$i]."</div></a>";}
echo "<td>
".$tt."
</td>
<td width=10px>
</td>

";
}

//$ru="руб";
//$gr="гр";

if (($sum*1)==0){$sum="нет";$gram="товаров";}else{$sum.=" руб";$gram.=" гр";}

?>



<td width=105px align=left>
<div class="cinf" id="cart1">
<span id="suma"><? echo $sum;?></span> <br>
<span id="kols"><? echo $gram;?></span> 
</div>
</td>


<td>
<a href="/?str=cart"><img src="images/cart.png" height=58px id="cart2" title="Перейти в корзину"/></a>
</td>


<td width=10px>
</td>

</tr>
</table>


</div>