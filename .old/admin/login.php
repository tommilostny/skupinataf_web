<?php

Define('expiration_time', 60*60*1000);
		//minuty * sekundy * milisekundy
//Hodnota určuje dobu platnosti přihláąení

function checkLogin(){
	if(	isset($_SESSION["login"]) &&
		isset($_SESSION["id"]) &&
		isset($_SESSION["last_ip"]) &&
		isset($_SESSION["last_time"]) &&
		($_SESSION["last_time"] + expiration_time > time()) &&
		$_SESSION["last_ip"] == $_SERVER['REMOTE_ADDR'])
	//kontrola existence proměných, IP adresy a času
	{
		//zapíše aktuální čas a vrátí true
		$_SESSION["last_time"] = time();
		return true;
	}
	else
	{
		//pokud neplatí jedna z podmínek vrátí false
		return false;
	}
}
?>