<?php
 session_start();
include_once "../common/connection.php";
include_once "../common/funzioni.php";

if (isset($_SESSION["logged"]))
{

	$ris1=leggiSquadre($cid);

	if ($ris1["status"]=='ko')	
		header('location: ../index.php?status=ko&msg='. urlencode($ris1["msg"]));

	$squadre=$ris1["contenuto"];

	$ris2= scriviPartita($cid,$squadre,$_GET["squadra1"],$_GET["squadra2"],$_GET["ris1"],$_GET["ris2"]);

	//print_r($ris2);


	if ($ris2["status"]=='ok')
	{
		header("location: ../index.php?op=visualizzaP&status=ok&msg=" . urlencode($ris2["msg"]));
	}
	else
	{	header('location: ../index.php?status=ko&msg='.  urlencode($ris1["msg"].$ris2["msg"]));}
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}   


// header("location: ../index.php?op=visualizzaP&status=ok&msg=" . urlencode("aaa" .$ris1["msg"].$ris2["msg"]));


?>