<?
//if ($type==""){$type="users";include "bd.php";}
$file_name="csv/".$type.".csv";

if (file_exists($file_name)){

$fp = fopen($file_name, "r");
//echo $file_name."<br>";
$mc=array();

$columns = fgets($fp, 999);
$columns = rtrim($columns);
$mc=explode(';',$columns);
$j=count($mc);
$rt="";
for($i=0;$i<$j;$i++){
	if ($i<$j-1){$rt.=$mc[$i].",";}else{$rt.=$mc[$i];}
}

$columns =$rt;

$ma=array();

$kk=-1;
while (!feof($fp))
{
$kk++;

$mt = fgets($fp, 999);
$mt = rtrim($mt);
if ($mt!=""){
$ma=explode(';',$mt);


$rt="";
for($i=0;$i<$j;$i++){
	if ($i<$j-1){$rt.="'".$ma[$i]."',";}else{$rt.="'".$ma[$i]."'";}
}

      $sql = "INSERT INTO $bd ( $columns ) VALUES ( ".$rt." )";
	  $result = @mysql_query("$sql",$db);
	  echo ($result*1)." - ".$sql."<br>";

}//mt
}

 fclose($fp);
}else{echo "Файла нет, не гружу - ".$file_name;}
?>