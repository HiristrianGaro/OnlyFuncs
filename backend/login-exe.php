<?php
session_start();
include_once "../common/connection.php";
include_once "../common/funzioni.php";

	$login = $_POST["user"];
	$pwd = $_POST["pass"];

	$ris = isUser($cid,$login,$pwd);

	if ($ris["status"]=='ko')
	{
		session_destroy();
		header('location: ../index.php?status=ko&msg='. urlencode($ris["msg"]));
	}
	else
	{
		$_SESSION["utente"]=$login;
		$_SESSION["logged"]=true;
		header("location: ../index.php?status=ok&msg=". urlencode($ris["msg"]));	
	}

?>