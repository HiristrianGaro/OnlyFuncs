<?php
session_start();

include_once("../common/connection.php");
include_once("../common/funzioni.php");

	if (isset($_SESSION["logged"]))
	{	 		  
		$ris= scriviSquadra($cid, $_GET["sigla"], $_GET["nome"]);

		if ($ris["status"]=='ok')
			header("Location:../index.php?op=visualizzaS&status=ok&msg=" . urlencode($ris["msg"]));
		else
			header("Location:../index.php?status=ko&msg=". urlencode($ris["msg"]));
	}
	else
	{
		header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
	}	



?>