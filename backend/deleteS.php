 <?php
  session_start();
 include_once "../common/connection.php";
 include_once "../common/funzioni.php";
 
 if (isset($_SESSION["logged"]))
{
    $ris=cancellaSquadra($cid, $_GET["id"]);

    if ($ris["status"]=='ok')
    {
        header("location: ../index.php?op=visualizzaS&status=ok&msg=" . urlencode($ris["msg"]));
    }
    else
    {	header('location: ../index.php?status=ko&msg='.  urlencode($ris["msg"]));}
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}   

 
 
 ?>