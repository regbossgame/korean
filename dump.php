<?
$bde=0;
if ($_GET["pas"]=="wirt"){

$bde=1;
include "bd.php";

include "dump_cat.php";

include "dump_lots.php";

include "dump_cart.php";

include "dump_city.php";

include "dump_orders.php";

}
?>