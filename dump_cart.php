<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="cart";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id int not null,
	lot int not null,
	cat varchar(30) not null,
	name varchar(80) not null,
	catname varchar(50) not null,
	zen int not null,
	typ int not null,
	kol int not null,
	ssid varchar(50) not null,
	treg varchar(12) not null
	
)";//zen DECIMAL(6,2) not null,

   $result = @mysql_query("$sql",$db);
	echo $sql."_rez($bd)=".$result."<br>";	

	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`id`)";
$result = @mysql_query("$sql",$db);
echo $bd."_KEY_rez($bd)=".$result."<br>";	

$type=$bd;
include "reader.php";


}else{echo "������ ������� Error 3312";}

?>