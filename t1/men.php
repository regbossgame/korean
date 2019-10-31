<div class="menu">
<img src="images/logo.png" height=58px style="float:left;">

<table border=0 style="float:right;" align=center><tr align=center>
<?
for($i=0;$i<count($tmen);$i++){
$tt="<a href='/?cat=".$link[$i]."' title='".$tit[$link[$i]]."'><div class='mbtn'>".$tmen[$i]."</div></a>";
if ($str==$link[$i]){$tt="<div class='mbtna'>".$tmen[$i]."</div>";}
echo "<td>
<h4>
".$tt."
</h4>
</td>
<td width=10px>
</td>

";
}
?>

<td width=10px>
</td>


<td width=85px align=left>
<div style="color:#00FF00">
1350 руб.<br>
820 гр.
</div>
</td>


<td>
<a href="/?cat=cart"><img src="images/cart.png" height=58px/></a>
</td>


<td width=10px>
</td>

</tr>
</table>


</div>