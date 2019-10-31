<?

header('Content-Type: text/html; charset=utf-8');

include "bd.php";

echo "<br><br><br><br><table border=0 valign=top width=1600px cellpadding=0px cellspacing=0>
";


$a=3;

$cat=$_GET['cat'];//"salads";

	
	$sql="SELECT * FROM lots WHERE cat LIKE '$cat' ORDER BY zen,name ASC";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	
	$id=@mysql_result($result, $i,"id");
	$name=@mysql_result($result, $i,"name");
	$catname=@mysql_result($result, $i,"catname");
	$zen=@mysql_result($result, $i,"zen");
	$typ=@mysql_result($result, $i,"typ");
	
	if ($i%$a==0){echo "<tr height=500px align=center valign=top>
	";}
	
	include "calcst.php";
	
	$img="lots/".($id).".jpg";
	$imgmax="lots/max/".($id).".jpg";
	include "noimg.php";
	
	include "calcngr.php";

	$uj="46pt";
	
	$j=0;
	
	$j++;
	//$ms[$j]=2;
	//$j++;
	
	$ms[$j]=13;
	$j++;
	$ms[$j]=12;
	$j++;
	$ms[$j]=18;
	$j++;
	$ms[$j]=15;
	$j++;
	$ms[$j]=18;
	$j++;
	$ms[$j]=18;
	$j++;
	$ms[$j]=18;
	
	if (in_array(($i+1),$ms)){$uj="37pt";}
	
	/*
	$f= mb_strlen($name,'UTF-8');
	
	if ($f>6){
	$uj=45;///(strlen($name)-6);
	}
	

	if ($f>12){
	$uj=43;///(strlen($name)-6);
	}

	if ($f>=19){
	$uj=41;///(strlen($name)-6);
	}
	
	
	
	if ($f>24){
	$uj=35;///(strlen($name)-6);
	}
	
	*/
	echo "<td width=540px>
	<div class='alot'>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	
	
	<br>
	<br>
	<br>
	<div class='tlot' style='border:0px solid #000000; max-width:491px;font-size:".$uj.";font-family: Verdana;text-align:left;margin:4px;margin-left:17px;z-index:10;position:absolute;'>
	
	<span style='padding:6px;background-color:#FFFFFF;'>".($i+1)."</span><span style='padding:6px;background-color:#FFFFFF;'>. ".$name."</span>
	<br>";
	
	

	echo "<span style='font-size:42pt;padding:6px;background-color:#FFFFFF;'><strong style='font-size:50pt;color:#006500;'>".$zen."</strong> руб/".$st.$ngr."</span>
	</div>
	<img class='lot' src='".$img."' style='width:500px;border:1px solid #000000; margin-top:-250px;z-index:3;' title='".$name." (".$catname.")"."' alt='".$name." (".$catname.")"."'>
	
	
		</div>
		
		<br>
		
	</td>
	";// style='vertical-align:center;'
	if (($i+1)%$a==0){echo "</tr>
	";}
}

echo "
</table>";

?>