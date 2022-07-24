<?php

if (isset($_POST['login']) && isset($_POST['password']))
//Kontrola, zda jsou nastaveny vąechny poľadované proměné
{
	$login		= $_POST['login'];
	$password	= $_POST['password'];
	$ip		= $_SERVER['REMOTE_ADDR'];
	
	require_once('../connect/db_connect.php'); //připojení k databázi
    
    $query = 'SELECT * FROM `taf_users` WHERE `username` = "'.$login.'" AND `password` = "'.$password.'"';
    $login_result = Db::query($query);
    
	if ($login_result == 1)
	//kontrola jestli byl nalezen odpovídající záznam
	{
		$user = Db::queryAll($query)[0]; 
		//načtení jednoho řádku vráceného záznamu,
		//nepočítá se s moľností, ľe by jich bylo více,
		//sloupec login je v databázi unikátní
		SESSION_START();
		//vytvoření session a registrace proměných do session
		
		$_SESSION["id"] = $user["id"];
		$_SESSION["login"] = $user["username"];
		$_SESSION["last_ip"] = $ip;
		$_SESSION["last_time"] = time();
		$_SESSION["message"] = NULL;
	}
	else if($login_result == 0)
	{
		//Nebyl nalezen odpovídající záznam -> špatný login
		$_SESSION["message"] = "Špatný login!";
		//Přesměrování na znovupřihláąení se zprávou WrongLogin
	}
	else
	{
		//Počet nalezených záznamů není 1 ani 0 tudíľ je někde error
		//Tady by mělo být zalogování chyby
		$_SESSION["message"] = "FatalError!";
	}
}
else
{	
	$_SESSION["message"] = "Fatal&nbsp;login&nbsp;error";
	//Vyhozeni + message pokuf je správně napsán formulář
	//a nikdo se nepokouąí udělat něco přes POST request
	//tak by tato moľnost neměla nastat, tudíľ by výskyt
	//této události měl být opět logován
}
Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>