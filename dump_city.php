<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="city";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id int not null,
	name varchar(30) not null,
	zen int not null
	
)";//DECIMAL(6,2) not null,

   $result = @mysql_query("$sql",$db);
	echo $sql."_rez($bd)=".$result."<br>";	

	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`id`)";
$result = @mysql_query("$sql",$db);
echo $bd."_KEY_rez($bd)=".$result."<br>";	

$type=$bd;
include "reader.php";


}else{echo "������ ������� Error 3312";}

?>