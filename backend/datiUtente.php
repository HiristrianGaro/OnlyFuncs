<?php


function visualizzaErrore($chiave)
{
    global $errore,$tipoErrore;
    if (isset($errore[$chiave])) echo "<span class=\"errore\">" . $tipoErrore[$errore[$chiave]] . "</span>"; 
}

function toBeSelected($chiave, $valore)
{
    echo $chiave==$valore?"selected='selected'":"";
}

function toBeChecked($attivita,$chiave)
{
    if (is_array($attivita))
        echo isset($attivita) &&in_array($chiave,$attivita)?"checked":"";
    else
        echo $attivita==$chiave?"checked":"";
}

$tipoErrore = array("1"=>"cognome non valido",
                    "2" =>"nome non valido",
					"3" =>"data non valida",
					"4" => "Bisogna specificare almeno una attivit&agrave;",
					"5" => "Bisogna accettare le condizioni di utilizzo");
$errore = array();
$dati = array();

if (isset($_GET["status"]))
{
	if ($_GET["status"]=='ko') $errore=unserialize($_GET["errore"]);
	$dati=unserialize($_GET["dati"]);
    // print_r($dati);
    // print_r($errore);
}
else
{
	$dati["nome"]="";
	$dati["cognome"]="";
	$dati["giorno"]="";
	$dati["mese"]="";
	$dati["anno"]="";
	$dati["sex"]="m";
	$dati["attivita"]=array();
	$dati["condizioni"]="ko";
}

?>
<!DOCTYPE html>
<html lang="it">

	<head>
		<title>dati utente</title>
		<link rel="stylesheet" type="text/css" href="sito.css">
	</head>
	
	<body>

        <?php 
		
		if (isset($_GET["login"]))
		{
			echo "<p class=\"titolo\">Benvenuto $_GET[login]</p>";
		}
        else
        {
            echo "<p class=\"titolo\">Non dovresti accedere a questa pagina. Non sei loggato</p>";
        }
		
		?>
        <p class="form">
		<form method="GET" action="checkData.php">
		  <?php if (isset($_GET["login"]))
                {
                    $login = $_GET["login"];
                    echo "<input type = \"hidden\" name = \"login\" value=\"$login\">";
                }
                
          ?>
		  <table class="insert"> 
				<tr>
					<td>Nome: </td><td><input type = "text" name = "nome" value="<?php  echo $dati["nome"];?>"/> 
                     <?php visualizzaErrore("nome"); ?>
</td>
				</tr>
				<tr>
					<td>Cognome: </td>
					<td><input type = "text" name = "cognome" value="<?php  echo $dati["cognome"];?>"/>
                    <?php visualizzaErrore("cognome")  ?>
</td>
				</tr>
				<tr>
					<td>Data nascita: </td><td>
					giorno:
					<select name="giorno">
						<option value="1" <?php toBeSelected($dati["giorno"], 1);?>>1</option>
						<option value="2" <?php toBeSelected($dati["giorno"], 2);?>>2</option>
						<option value="3" <?php toBeSelected($dati["giorno"], 3);?>>3</option>	
						<option value="4" <?php toBeSelected($dati["giorno"], 4);?>>4</option>
					</select>
					mese:
					<select name="mese">
						<option value="1" <?php toBeSelected($dati["mese"], 1);?>>1</option>
						<option value="2" <?php toBeSelected($dati["mese"], 2);?>>2</option>
						<option value="3" <?php toBeSelected($dati["mese"], 3);?>>3</option>	
						<option value="4" <?php toBeSelected($dati["mese"], 4);?>>4</option>
					</select>
					anno:
					<select name="anno">
						<option value="1970" <?php toBeSelected($dati["anno"], 1970);?>>1970</option>
						<option value="1971" <?php toBeSelected($dati["anno"], 1971);?>>1971</option>
						<option value="1972" <?php toBeSelected($dati["anno"], 1972);?>>1972</option>
						<option value="1973" <?php toBeSelected($dati["anno"], 1973);?>>1973</option>	
						<option value="1974" <?php toBeSelected($dati["anno"], 1974);?>>1974</option>
					</select>
					<?php visualizzaErrore("giorno"); ?>
					
					</td>
				</tr>
				
				<tr>
					<td>Sesso: </td><td>
					     <input type="radio" name="sex" value="m" <?php toBeChecked( $dati["sex"],"m");?>/>Maschio
						 <input type="radio" name="sex" value="f" <?php toBeChecked( $dati["sex"],"f");?>/>Femmina
					</td>
				</tr>
				<tr>
					<td>Attivit&agrave;: </td><td>
				
						<input type="checkbox" name="attivita[]" value="scii" <?php toBeChecked($dati["attivita"],"scii");?>/>Sci<br/>
						<input type="checkbox" name="attivita[]" value="tennis" <?php toBeChecked($dati["attivita"],"tennis");?>/>Tennis<br/>
						<input type="checkbox" name="attivita[]" value="golf" <?php toBeChecked($dati["attivita"],"golf");?>/>Golf<br/>
						<input type="checkbox" name="attivita[]" value="canoa" <?php toBeChecked($dati["attivita"],"canoa"); ?>/>Canoa<br/>
						<input type="checkbox" name="attivita[]" value="altro" <?php toBeChecked($dati["attivita"],"altro"); ?>/>Altro<br/>
						<?php visualizzaErrore("attivita"); ?>
					</td>
				</tr>
				
				<tr>
					<td>Condizioni di utilizzo </td><td>
				
				         <table border="1">
						 <tr><td>bla bla bla bla bla bla bla bla bla bla bla bla 
						         bla bla bla bla bla bla bla bla bla bla bla bla 
								 bla bla bla bla bla bla bla bla bla bla bla bla </td></tr>
						</table>						 
						<input type="checkbox" name="condizioni" value="ok" 
                        
                        <?php toBeChecked($dati["condizioni"],"ok");?>/>Accetto<br/>
						<?php visualizzaErrore("condizioni");  ?>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type= "submit" value= "OK"/>
					    <input type = "reset" value = "Cancella"/>
						
					</td>
				</tr>
			</table>
				</form>
            </p>		
		
</body>
</html>