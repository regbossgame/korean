<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="cat";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id varchar(30) not null,
	name varchar(80) not null,
	txt text not null,
	sort int not null
	
)";

   $result = @mysql_query("$sql",$db);
	echo $sql."_rez($bd)=".$result."<br>";	

	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`id`)";
$result = @mysql_query("$sql",$db);
echo $bd."_KEY_rez($bd)=".$result."<br>";	

$type=$bd;
include "reader.php";


}else{echo "Ошибка доступа Error 3312";}
/*
user varchar(15) not null,
	game varchar(50) not null,
	game_id int not null,
	slots int not null,
	srok int not null,
	stat int not null,
	zen int not null,
	ip varchar(20) not null,
	port int not null,
	com int not null,
	inf int not null,
	tick int not null,
	entick int not null,
	mykey varchar(40) not null,
	pars text not null,
	hostname varchar(50) not null,
	mode int not null,
	pass varchar(50) not null,
	gpass varchar(50) not null,
	map varchar(50) not null,
	treg varchar(30) not null
*/

?>