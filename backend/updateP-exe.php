<?php
 session_start();
include_once "../common/connection.php";
include_once "../common/funzioni.php";

if (isset($_SESSION["logged"]))
{	
  $ris= modificaPartita($cid,$_GET["oldsquadra1"],$_GET["oldsquadra2"],$_GET["squadra1"],$_GET["squadra2"],$_GET["ris1"],$_GET["ris2"]);
  //print_r($ris2);
  if ($ris["status"]=='ok')
  {
	header("location: ../index.php?op=visualizzaP&status=ok&msg=" . urlencode($ris["msg"]));
  }
  else
  {	header('location: ../index.php?status=ko&msg='. urlencode($ris["msg"]));}
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}


?>