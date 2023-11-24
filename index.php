<?php 
session_start();
include "common/connection.php";
include "common/funzioni.php";
?>


<!DOCTYPE html>
<html lang="en">
  <?php require "./common/header.php";?>

  <body>
   
      <?php require "./common/navbar.php";?>

    <div class="container">

      <div class="well">
        
		    <?php
			   if (isset($_SESSION["logged"])){
			
					  if (isset($_GET["op"]))
					  {
						  include "frontend/". $_GET["op"] . ".php";
					  }
			   }			  
			   else
			   {
			     echo "<h1>Welcome to OnlyFuncs</h1>";
                 echo "<h2>Please login to use our platform!</h2>";
                 include "./common/login.php";
			   }
			?>
      </div>
	  <div class="container">
	<?php
	
	  if (isset($_GET["status"]))
      {
		  if ($_GET["status"]=='ok')
			  echo "<div class=\"alert alert-success\"><strong>" . urldecode($_GET["msg"]) . "</strong></div>";
				  else 
			  echo "<div class=\"alert alert-danger\"><strong>Errore!</strong>" . urldecode($_GET["msg"]) . "</div>";
	  }  
			  
	
	?>
	 </div> <!-- /container -->
	 

    </div> <!-- /container -->

	<?php include "common/footer.php";?>
    
  </body>
</html>
