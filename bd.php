<?

$databasename = "boewic_all";
$databaseuser = "boewic_all";
$databasepasswd = "QWE123qwe123qwe";

$sqllocal = "localhost";
//echo "111";
   
$db = @mysql_connect("$sqllocal", "$databaseuser", "$databasepasswd");// or die("Ошибка соединения с БД ;(");;
@mysql_select_db("$databasename",$db);
   
//	$db = @mysqli_connect("$sqllocal", "$databaseuser", "$databasepasswd","$databasename");
//	mysqli_query($cone, "SET NAMES utf8");
   
//echo "222";

//$rr=@mysql_set_charset("utf8",$db);
 //@mysql_query('SET NAMES ',$db);

 //$sql = "CHARACTER SET cp1251 COLLATE cp2151_general_ci;";
//$result = @mysql_query("$sql",$db);

$mip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR')); 

$host="http://korean-salads.ru";

//echo "333";

//86400
?>