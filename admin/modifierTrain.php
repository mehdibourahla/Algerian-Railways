<?php 

	include "../includes/dbh.inc.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Algerian Railways | Modifier</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark navbar fixed-top">
	  <a class="navbar-brand" href="admin.php" style="font-family: 'Gloria Hallelujah', cursive; padding-right: 20px"><img id="logo" src="../res/logo.png" style="height: 60px">Algerian Railways</a>
	 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li class="nav-item">
	        <a class="nav-link" href="#">Profil <i class="fas fa-user"></i></a>
	      </li>
	      
	      <li class="nav-item">
	        <a class="nav-link" href="../accueil.php">Se déconnecter <i class="fas fa-sign-out-alt"></i></a>
	      </li>
	    </ul>
	    
	  </div>
	</nav>
	<?php
		$IDTrain = $_SESSION['ID'];
		$query = "SELECT * FROM `train` WHERE `trainID`=$IDTrain; ";
		$result = mysqli_query($connect,$query);
		if($row = mysqli_fetch_assoc($result))
		{
			$type = $row['train_type'];
			$capaciteP = $row['capaciteP'];
			$capaciteS = $row['capaciteS'];
			$gare_depart = $row['gare_depart'];
			$gare_arrivee = $row['gare_arrivee'];
			$date_depart = $row['date_depart'];
			$heure_depart = $row['heure_depart'];
			$prix = $row['prix'];
			
			
		}

	?>
	<div class="container">
		<div class="jumbotron">
			<form method="POST">
				<h1>Modifier un Train :</h1>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<h4>Type : 
							<select class="form-control" id="type" name="type" required>
								<option value="">--</option>
								<option>Grande ligne</option>
								<option>Régional</option>
								<option>Banlieu</option>
								<?php echo '<script language ="JavaScript">
								var i =0;
								var e = document.getElementById("type");
								while(e.options[i].innerText!="'.$type.'")
								{
									i++;
								}
								e.selectedIndex = i;
								</script>'; ?>
							</select>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Capacité première classe : <input type="number" min=1 class="form-control" name="capaciteP" id="capaciteP" value="<?php echo $capaciteP; ?>" ></h4>
					</div>
					<div class="col-md-6">
						<h4>Capacité deuxième classe : <input type="number" min=1 class="form-control" name="capaciteS" id="capaciteS" value="<?php echo $capaciteS; ?>" ></h4>
					</div>
					<div class="col-md-6">
						<h4>Gare de départ :
							<select class="form-control" name="gare_depart" id = "gare_depart" required>
								<?php 
									include "../includes/gares.php";
								
								 echo '<script language ="JavaScript">
								var i =0;
								var e = document.getElementById("gare_depart");
								while(e.options[i].innerText!="'.$gare_depart.'")
								{
									i++;
								}
								e.selectedIndex = i;
								</script>'; ?>
							</select>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Gare d' arrivée :
							<select  class="form-control" name="gare_arrivee" id ="gare_arrivee" required>
								<?php 
									include "../includes/gares.php";
									 echo '<script language ="JavaScript">
								var i =0;
								var e = document.getElementById("gare_arrivee");
								while(e.options[i].innerText!="'.$gare_arrivee.'")
								{
									i++;
								}
								e.selectedIndex = i;
								</script>'; 
								?>
							</select>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Date de départ :
							<input type="Date" name="date" min = <?php echo date('Y-m-d'); ?> id="date" class="form-control" value="<?php echo $date_depart ?>" required>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Heure de départ :
							<input type="time" name="time" id="time" class="form-control" value="<?php echo $heure_depart ?>" required>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Prix :
							<input type="number" min="1" step="any" name="prix" id="prix" class="form-control" value="<?php echo $prix ?>" required>
						</h4>
					</div>
				</div>
				<div class="wrapper">
						<button type="submit" name="btnMfd" id="btnMfd" class="btn btn-primary btn-lg">Modifier</button>
						<a href="#" id="btnSup" class="btn btn-primary btn-lg" style="margin-left: 30px;" onclick="Confirmation()">Supprimer</a>
						<script type="text/javascript">
							function Confirmation()
							{
								var conf = confirm("Êtes vous sur de vouloir supprimer ce train ?");
								if(conf)
								{
									<?php 
										$query = "DELETE FROM `train` WHERE `trainID`=$IDTrain;";
										mysqli_query($connect,$query);
									?>
									document.location.replace("GestionTrains.php");
								}
								

							}
						</script>
					</div>
			</form>
			<?php
			if($capaciteP != $row['NbPClasse'] || $capaciteS != $row['NbSClasse'] )
			{
				echo '<script language="JavaScript">
				document.getElementById("type").disabled = true;
				document.getElementById("capaciteP").disabled= true;
				document.getElementById("capaciteS").disabled= true;
				document.getElementById("gare_depart").disabled= true;
				document.getElementById("gare_arrivee").disabled= true;
				document.getElementById("date").disabled= true;
				document.getElementById("time").disabled= true;
				document.getElementById("prix").disabled= true;
				document.getElementById("btnMfd").disabled= true;
				</script>';
				echo '<h3>Modification impossible car des places sont déja réservés</h3>';
			}
			if(isset($_POST['btnMfd'])){
				$gare_depart = $_POST['gare_depart'];
				$gare_arrivee = $_POST['gare_arrivee'];
				if($gare_depart == $gare_arrivee)
				{
					echo "ATTENTION : La Gare de départ doit être différente de la gare d'arrivée";
				}
				else
				{
					$type = $_POST['type'];
					$capaciteP = $_POST['capaciteP'];
					$capaciteS = $_POST['capaciteS'];
					$capacite =$capaciteP + $capaciteS;
					$date_depart = $_POST['date'];
					$heure_depart = $_POST['time'];
					$prix = $_POST['prix'];
					$query = "UPDATE `train` SET `train_type`='$type',`capacite`=$capacite,`capaciteP`=$capaciteP,`capaciteS`=$capaciteS,`NbPClasse`=$capaciteP,`NbSClasse`=$capaciteS,`gare_depart`='$gare_depart',`gare_arrivee`='$gare_arrivee',`date_depart`='$date_depart',`heure_depart`='$heure_depart',`prix`=$prix WHERE trainID = $IDTrain;";
						mysqli_query($connect,$query);

					}
				}


			?>
					</div>
	</div>

</body>		
</html>