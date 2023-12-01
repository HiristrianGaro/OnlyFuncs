<?php 
session_start();
include "common/connection.php";
include "common/funzioni.php";
?>


<!DOCTYPE html>
<html lang="en">
  <?php require "./common/header.php";?>

  <body>
  <?php include "common/w3.php"; ?>
   
      <?php require "./common/navbar.php";?>

        
		    <?php
			   if (isset($_SESSION["logged"])){
			
					  if (isset($_GET["op"]))
					  {
						  include "frontend/". $_GET["op"] . ".php";
					  }
			   }			  
			   else
			   {
                 include "./common/login2.php";
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
