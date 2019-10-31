<?
session_start();
$ssid=$_SESSION["ssid"];
include "bd.php";

$id=$_GET['id'];

if ($id!="-1"){
	$sql = "DELETE FROM cart WHERE ssid LIKE '$ssid' AND id LIKE '".$id."'";
	$result = @mysql_query("$sql",$db);
}else{
	$sql = "DELETE FROM cart WHERE ssid LIKE '$ssid'";
	$result = @mysql_query("$sql",$db);
}	
HEADER("LOCATION: index.php?str=cart");

?>