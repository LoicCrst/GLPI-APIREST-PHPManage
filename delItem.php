<?php

/* 
Script to delete an equipment in GLPI
 */

//Replace with the id of the item
$id=1;
//Change withthe ip of the GLPI server
$url = 'http://10.0.0.1/glpi/apirest.php/initSession';
$ch = curl_init($url);

$id=1; //Replace with the ID of the item
//Login of the monitoring user
$login='glpi';
//Token of the monitoring user
$usertoken='11aazzeeeqlmsmef65asdg4j5ffd62dlmsawed8f';

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$args='login='.$login.'&user_token='.$usertoken;
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
$result = json_decode(curl_exec($ch),true);
$session=$result['session_token'];
curl_close($ch);


//Change withthe ip of the GLPI server
$url =  'http://10.0.0.1/glpi/apirest.php/NetworkEquipment/'.$id.'?session_token='.$session.'&force_purge=1';
$ch = curl_init($url);


//var_dump($session);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$rec = (curl_exec($ch));
