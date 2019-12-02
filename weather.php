<?php
$key="APPID=744128119f1ba4097bd9904b7f56efeb";
echo "Here comes the weather: </br>";
$city=$_GET["city"];
$country=$_GET["country"];
$target=$city.",".$country;
echo "the target is ".$city.", ".$country.":</br></br>";
$url="https://api.openweathermap.org/data/2.5/forecast?q=".$target."&units=metric&".$key;
$api=file_get_contents($url);
$json=json_decode($api);
$list=$json->list;
foreach($list as $data){
    $arrDate=explode(" ",$data->dt_txt);
    $day=explode("-",$arrDate[0]);
    $time=explode(":",$arrDate[1]);
    if ($time[0]=="00"){
        echo "------------------</br>"; $date=$day[2]." ".$day[1]." ".$time[0].":00"; 
    }
    else{
        $date="______".$time[0].":00";
    }
    echo $date." Temp: ".$data->main->temp." Humidity: ".$data->main->humidity." ".$data->weather[0]->description."</br>";
}
