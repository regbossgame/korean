<table border=0 valign=top cellpadding=0px cellspacing=0>
<?
$a=3;

for($i=0;$i<35;$i++){
	
	if ($i%$a==0){echo "<tr height=360px align=center valign=top>
	";}
	echo "<td width=340px>
	<div class='alot'>
	<div class='tlot'>
	<h3>".$i.". Морковь</h3>
	</div> 
	<img class='lot' src='lots/lot1.jpg'>
	<div class='dlot'>
	<h3>300руб/100гр</h3>
	</div>
	<div class='buy'>
	<h3><input type='number' maxlength='4' min='100' step='50' max='9000' value='100' class='inp'/> гр. В корзину</h3>
	</div>
		</div>
	</td>
	";
	if (($i+1)%$a==0){echo "</tr>
	";}
}



?>

</table>