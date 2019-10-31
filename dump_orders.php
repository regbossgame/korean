<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="orders";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id int not null,
	txt text not null,
	zen int not null,
	gram int not null,
	name varchar(50) not null,
	city varchar(50) not null,
	street varchar(50) not null,
	hous varchar(50) not null,
	pod varchar(50) not null,
	kv varchar(50) not null,
	tel varchar(50) not null,
	dost varchar(50) not null,
	intotal int not null,
	com text not null,
	treg varchar(20) not null
	
)";//DECIMAL(6,2) not null,

   $result = @mysql_query("$sql",$db);
	echo $sql."_rez($bd)=".$result."<br>";	

	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`id`)";
$result = @mysql_query("$sql",$db);
echo $bd."_KEY_rez($bd)=".$result."<br>";	

$type=$bd;
include "reader.php";


}else{echo "Ошибка доступа Error 3312";}

?>