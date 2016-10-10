<?php
	session_start();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selfies - serwis społecznościowy</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>  
  <script src="js/js.js"></script>  
</head>
<body>
	<div class="container" id="myContainer">
    	<div class="row">
      		<br/><br/><br/>
      		<div class="col-md-2">
      		</div>
      		<div class="col-md-8">
	        	<div class="col-md-4">
	          		<h4><i><br/>selfies</i></h4>
	        	</div>
	        	<div class="col-md-4">
	        		<form action="szukaj.php" method="post" class="form">       
	            		<div class="form-group">
	              			<div class="col-xs-8">                
	                			<input class="form-control" type="search" name="nick" placeholder="...">
	              			</div>
	            		</div>
	            		<button type="submit" class="btn btn-default">Szukaj </button>
	          		</form>
	        	</div>
	                
	        	<div class="col-md-4">
	          		<br/>
			          <a href="osczasu.php"><img src="icons/newpost.png" width="24px" height="24px" ></a>
			          <a href="wiadomosci.php"><img src="icons/messages.png" width="24px" height="24px" ></a> 
			          <a href="profil.php"><img src="icons/profile.png" width="24px" height="24px" ></a>
			          <a href="ustawienia.php"><img src="icons/settings.png" width="24px" height="24px" ></a> 
			          <a href="wyloguj.php"><img src="icons/logout.png" width="24px" height="24px" ></a>
	        	</div>
	      	</div>
	      	<div class="col-md-2">
	      	</div>
	   	</div>
    	<br/><br/>

		<div class="col-md-3">
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
	        		<div class="panel-body" >

<?php
	if(isset($_SESSION['z_nick']))
	{
		$id = $_SESSION['z_id'];
		$nick = $_SESSION['z_nick'];
		$profilowe = $_SESSION['z_profilowe'];
		$posty = $_SESSION['z_posty'];
		$zdjecia = $_SESSION['z_zdjecia'];
		$znajomi = $_SESSION['z_znajomi'];
?>
						<div class="col-md-1">
						</div>

						<div class="col-md-10">
							<h4>Wyniki zapytania:</h4><br/>
							<div class="panel panel-default" id="left">
	        					<div class="panel-body">
	        						<div class="col-md-6">
	            						<br/><img class="img-circle" src="data:image/png;base64,<?php echo base64_encode($profilowe);?>" width="60px" height="60px" >&nbsp;&nbsp;&nbsp;
	        							&nbsp;&nbsp;<a href="profilznajomego.php"><?php echo $nick; ?></a><br/><br/>    					
									</div>
									<br/>
									<div class="col-md-6" id="center">
				        				Posty: <?php echo $posty; ?><br/>
	        							Zdjęcia: <?php echo $zdjecia; ?><br/>
	        							Znajomi: <?php echo $znajomi; ?><br/>			
									</div>
	        					</div>
	        				</div>
						</div>

						<div class="col-md-1">
						</div>
<?php
	}
	else
	{
?>
						<div class="col-md-1">
						</div>
						<div class="col-md-10">
							<h4>Wyniki zapytania:</h4><br/>
							<div class="panel panel-default" id="left">
	        					<div class="panel-body">
	        						<div class="col-md-6">
	            						<br/>Nikogo nie odnaleziono.<br/><br/>
	            					</div>
	        					</div>
	        				</div>
						</div>

						<div class="col-md-1">
						</div>
<?php
	}
?>

									
					</div>
				</div>
			</div>
			<div class="col-md-3">
			</div>
		</div>
	</div>

	
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>   
  	</div>
</body>
</html>