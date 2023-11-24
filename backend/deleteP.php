 <?php
 session_start();
 include_once "../common/connection.php";
 include_once "../common/funzioni.php";
 
 if (isset($_SESSION["logged"]))
{
    $ris=cancellaPartita($cid, $_GET["casa"], $_GET["ospite"]);

    if ($ris["status"]=='ok')
    {
        header("location: ../index.php?op=visualizzaP&status=ok&msg=" . urlencode($ris["msg"]));
    }
    else
    {	header('location: ../index.php?status=ko&msg='.  urlencode($ris["msg"]));}
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}   

 
 
 ?>