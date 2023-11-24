<?php

$parameter="";
if (isset($_POST["nome"]) && isset($_POST["pwd"]))
{
	echo "ciao";	
    $nome = $_POST["nome"];
    $password = $_POST["pwd"];
	if ($nome=="marco" && $password=="123")
	{
		$parameter= "Location: datiUtente.php?login=$nome";
		echo "<h1>Hai eseguito l'accesso con successo!</h1>";
	}
	elseif ($nome!="marco")
	{
		  $parameter= "Location: login.php?errore=login&login=$nome";
		  echo "<h1>fail1</h1>";
    }
	elseif ($password!="123")
	{
       $parameter= "Location: login.php?errore=password&login=$nome";
	   echo "<h1>fail2</h1>";
	}
	echo $parameter;
	header($parameter);
}
?>