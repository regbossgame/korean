<?


$cat=$_GET["cat"];


if ($cat!=""){

  $sql="SELECT * FROM cat WHERE id LIKE '$cat'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

		$i=0;
		$nam=@mysql_result($result, $i,"name");

echo "<h1><a href='/?str=cataloge' title='Назад в каталог'>Каталог</a> / ".$nam."</h1>
";

if ($cat=="cheese-tofu"){
	include "tofu.php";
	
}

}else{echo "<h1>Каталог</h1>
";}

echo "<table border=0 valign=top cellpadding=0px cellspacing=0>
";


$a=3;

if ($cat!=""){
	
	$sql="SELECT * FROM lots WHERE cat LIKE '$cat' ORDER BY zen,name ASC";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	
	$id=@mysql_result($result, $i,"id");
	$name=@mysql_result($result, $i,"name");
	$catname=@mysql_result($result, $i,"catname");
	$zen=@mysql_result($result, $i,"zen");
	$typ=@mysql_result($result, $i,"typ");
	
	if ($i%$a==0){echo "<tr height=420px align=center valign=top>
	";}
	
	include "calcst.php";
	
	$img="lots/".($id).".jpg";
	$imgmax="lots/max/".($id).".jpg";
	include "noimg.php";
	
	include "calcngr.php";

	echo "<td width=340px>
	<div class='alot'>
	<div class='tlot'>
	<span>".($i+1)."</span>. ".$name."
	</div>
	

	<a class='rim' href='".$imgmax."' rel='lightbox[plants]' title='".$name." (".$catname.")"."'>
	<img class='lot' src='".$img."' title='".$name." (".$catname.")"."' alt='".$name." (".$catname.")"."'>
	</a>
	
	
	<strong>".$zen."</strong> руб/".$st.$ngr."
	
	
	<table border=0><tr valign=center>
	<td>
	<input type='number' maxlength='4' min='".$st."' step='".$st."' max='9000' value='".$st."' class='inp' id='num".$id."' onblur='chnum(this,".$typ.");' onclick='chnum(this,".$typ.");' onchange='chnum(this,".$typ.");'/> <strong>".$ngr."</strong>
	</td><td>
	<input type='button' class='buy_now' onclick='addcart(".$id.")' value='Добавить в корзину'/>
	</td></tr></table>
	
		</div>
		
		<br>
		
	</td>
	";
	if (($i+1)%$a==0){echo "</tr>
	";}
}

}else{

	$sql="SELECT * FROM cat ORDER BY sort ASC";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	
	$id=@mysql_result($result, $i,"id");
	$name=@mysql_result($result, $i,"name");
	$txt=@mysql_result($result, $i,"txt");
	
	
	if ($i%$a==0){echo "<tr height=425px align=center valign=top>
	";}
	echo "<td width=340px>
	<a href='/?str=cataloge&cat=".$id."' title='".$txt."'>
	<div class='alot'>
	<div class='tlot'>
	".$name."
	</div> 
	<img class='lot' src='cats/".$id.".jpg' width=300px title='".$txt."'>
	<div class='plot'>
	".$txt."
	
	</div>
	<br>
		</div>
		</a>
	</td>
	";
	if (($i+1)%$a==0){echo "</tr>
	";}
}
	
}


?>

</table>
<br>
<br>