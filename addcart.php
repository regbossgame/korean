<?
session_start();
$ssid=$_SESSION["ssid"];
include "bd.php";

$id=$_GET['id'];
$kol=$_GET['kol'];



$sql="SELECT * FROM cart WHERE ssid LIKE '$ssid' AND lot LIKE '".$id."'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);

if ($k>0){
	$sql="UPDATE cart SET kol=kol+'".$kol."' WHERE ssid LIKE '$ssid' AND lot LIKE '".$id."'";
	$result = @mysql_query("$sql",$db);
	
}else{
	
	$sql="SELECT * FROM lots WHERE id LIKE '".$id."'";
    $result = @mysql_query($sql,$db);
	$k=@mysql_num_rows($result);
	
	$i=0;
	$id=@mysql_result($result, $i,"id");
	$cat=@mysql_result($result, $i,"cat");
	$name=@mysql_result($result, $i,"name");
	$catname=@mysql_result($result, $i,"catname");
	$zen=@mysql_result($result, $i,"zen");
	$typ=@mysql_result($result, $i,"typ");
	
	
	
	$type="cart";
	include "gen_id.php";
	

	
 $sql = "INSERT INTO cart ( id,lot,cat,name,catname,zen,typ,kol,ssid,treg ) VALUES ('$nid','$id','$cat','$name','$catname','$zen','$typ','$kol','$ssid','".time()."')";
 $result = @mysql_query("$sql",$db);

 	
	
}



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
	
	include "calcst.php";
	
	$sum+=$zen*($kol/$st);
	
	
}

echo $sum."|".$gram;

?>