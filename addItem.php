<?php

/* 
Script to add an equipment in GLPI
 */

//Replace with a IP of the GLPI server
$url = 'http://10.0.0.1/glpi/apirest.php/initSession';
$ch = curl_init($url);
//Login of the monitoring user
$login='login';
//Token of the monitoring user
$usertoken='11aazzeeeqlmsmef65asdg4j5ffd62dlmsawjkb8';
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$args='login='.$login.'&user_token='.$usertoken;
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
$result = json_decode(curl_exec($ch),true);
$session=$result['session_token'];
curl_close($ch);

//Replace with a IP of the GLPI server
$url =  'http://10.0.0.1/glpi/apirest.php/NetworkEquipment/?session_token='.$session;
$ch = curl_init($url);
$args=[];
$args['input']=array();

//example adding a network equipment
array_push($args['input'],array(
'serial'=>'aSerialNumber',
'networkequipmenttypes_id'=>1,
'states_id'=>2));

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($args));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$rec = (curl_exec($ch));
curl_close($ch);