<?
$h=1100;
$street="Инициативная";
$tel="89381473216";
$hous=76;
$kv=14;
$name="Дмитрий";
$city="Таганрог";
$sms="Заказ: ".$h." руб. ".$name.". ".$city.", ".$street.", д".$hous.", кв".$kv.". тел: ".$tel;
echo $sms."<br>";
/*"<h3>К оплате: ".$h." руб</h3>
Имя: $name <br>
Телефон: $tel <br>
Город: $city <br>
Доставка: $dost <br>
Улица: $street <br>
Дом (Корпус): $hous <br>
Квартира: $kv <br>
Подьезд: $pod <br>
Комментарий: $com <br>
";
*/

//iconv("windows-1251","utf-8","??????!")
$body2=file_get_contents("https://sms.ru/sms/send?api_id=978DD179-5B7B-BB31-C07F-0FDB57363E10&to=79508658966&text=".urlencode($sms));
echo $body."|";

?>