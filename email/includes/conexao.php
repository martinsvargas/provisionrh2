<?php

	$site = $_SERVER['HTTP_HOST'];
	$nomeDominio = $site;
	$ip=gethostbyname($nomeDominio);


switch($ip){

case '187.45.210.111': 
	
		$hostname_Conn = "localhost";
		$database_Conn = "nacionalnet_mailer";
		$username_Conn = "plesk77";
		$password_Conn = "naci1973";
		break;

case '187.45.210.75':

		$hostname_Conn = "localhost";
		$database_Conn = "nacionalnet2_mailer";
		$username_Conn = "plesk48";
		$password_Conn = "naci1973";
		break;
		
case '187.45.210.99':

		$hostname_Conn = "localhost";
		$database_Conn = "mundial-idc_mailer";
		$username_Conn = "plesk67";
		$password_Conn = "naci1973";
		break;
		
case '187.45.210.25':

		$hostname_Conn = "localhost";
		$database_Conn = "nacionalnet1_mailer";
		$username_Conn = "nacio_pleskwin75";
		$password_Conn = "naci1973";
		break;
		
}

if (left($ip, 11) == '108.179.216'){

		$hostname_Conn = "localhost";
		$database_Conn = "sitestmp_mailer";
		$username_Conn = "sitestmp_hgator";
		$password_Conn = "naci1973";
}

		
		$conexao = mysql_connect($hostname_Conn, $username_Conn, $password_Conn) or die(mysql_error());
		mysql_select_db($database_Conn,$conexao);


function left($str, $length) {
     return substr($str, 0, $length);
}		
		
?>

