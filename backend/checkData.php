<?php 

$dati=array();
$errore=array();
$nome=$_POST["nome"];
$cognome=$_POST["pwd"];
// $giorno=$_POST["giorno"];
// $mese=$_POST["mese"];
// $anno=$_POST["anno"];
// $sex=$_POST["sex"];
//$attivita=$_POST["attivita"];
//$condizioni=$_POST["condizioni"];


if (isset($_POST["login"])) $dati["login"]=$_POST["login"];

if (empty($nome))
{
	$errore["nome"]="2";
	$dati["nome"]="";
}
else
{
	$dati["nome"]=$nome;
}

if (empty($cognome))
{
	$errore["cognome"]="1";
	$dati["cognome"]="";
}		
else
	$dati["cognome"]=$cognome;

if (empty($giorno) || empty($mese) || empty($anno) || !checkdate( $mese, $giorno, $anno))
{
	$errore["giorno"]="3";
}		
$dati["giorno"]=$giorno;
$dati["mese"]=$mese;
$dati["anno"]=$anno;

$dati["sex"]=$sex;


if (!isset($_POST["attivita"]) || count($_POST["attivita"])==0)
{
	$errore["attivita"]="4";
	$dati["attivita"]=array();
}		
else
	$dati["attivita"]=$_POST["attivita"];

if (!isset($_POST["condizioni"]))
{
	$errore["condizioni"]="5";
	$dati["condizioni"]="ko";
}		
else
	$dati["condizioni"]="ok";



if (count($errore)>0)
{
	header('location:datiUtente.php?status=ko&errore=' . serialize($errore). '&dati=' . serialize($dati));
}
else
{
	header('location:datiUtente.php?status=ok&dati=' . serialize($dati));
}


?>