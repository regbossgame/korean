<?
session_start();
$ssid=$_SESSION["ssid"];
include "bd.php";

$id=$_GET['id'];
$kol=$_GET['kol'];

if ($id!="-1"){

$sql="SELECT * FROM cart WHERE ssid LIKE '$ssid' AND lot LIKE '".$id."'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);

if ($k>0){
	$sql="UPDATE cart SET kol='".$kol."' WHERE ssid LIKE '$ssid' AND lot LIKE '".$id."'";
	$result = @mysql_query("$sql",$db);
	
}	

}

$sql="SELECT lot,zen,kol,typ FROM cart WHERE ssid LIKE '$ssid'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);
$sum=0;
$gram=0;
	for($i=0;$i<$k;$i++){
	$tid=@mysql_result($result, $i,"lot");
	$zen=@mysql_result($result, $i,"zen");
	$kol=@mysql_result($result, $i,"kol");
	$typ=@mysql_result($result, $i,"typ");
	
	if ($typ<10){$gram+=$kol;}
	
	include "calcst.php";
	
	$sum+=$zen*($kol/$st);
	
	if ($id==$tid){$msum=$zen*($kol/$st);}
	
	
}

echo $sum."|".$gram."|".$msum."|".$id;

?>