<?php 

	include "../includes/dbh.inc.php"
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Ajout Train</title>
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
	<div class="container">
		<div class="jumbotron">
			<form method="POST">
				<h1>Ajout de Train :</h1>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<h4>Type : 
							<select class="form-control" name="type" required >
								<option value="">--</option>
								<option>Grande ligne</option>
								<option>Régional</option>
								<option>Banlieu</option>
							</select>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Capacité première classe : <input type="number" min=1 class="form-control" name="capaciteP" required ></h4>
					</div>
					<div class="col-md-6">
						<h4>Capacité deuxième classe : <input type="number" min=1 class="form-control" name="capaciteS" required ></h4>
					</div>
					<div class="col-md-6">
						<h4>Gare de départ :
							<select class="form-control" name="gare_depart" required>
								<?php 
									include "../includes/gares.php";
								?>
							</select>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Gare d' arrivée :
							<select  class="form-control" name="gare_arrivee" required>
								<?php 
									include "../includes/gares.php";
								?>
							</select>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Date de départ :
							<input type="Date" name="date" min = <?php echo date('Y-m-d'); ?> class="form-control" required>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Train disponible jusqu'au :
							<input type="Date" name="dateL" min = <?php echo date('Y-m-d'); ?> class="form-control" required>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Heure de départ :
							<input type="time" name="time" class="form-control" required>
						</h4>
					</div>
					<div class="col-md-6">
						<h4>Prix :
							<input type="number" min="1" step="any" name="prix" class="form-control" required>
						</h4>
					</div>
				</div>
				<div class="wrapper">
						<button type="submit" name="btnSub" id="btnSub" class="btn btn-primary btn-lg">Ajouter Train</button>
					</div>
			</form>
			<?php
			
			if(isset($_POST['btnSub'])){
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
					$dateDepart = date_create($_POST['date']);
					$dateFin = date_create($_POST['dateL']);
					$interval = date_diff($dateDepart,$dateFin);
					$max = $interval->format('%a');
					for($i = 0;$i<=$max;$i++)
					{
						$date_depart = date_format($dateDepart, 'Y-m-d');
						$query = "INSERT INTO `train`(`train_type`, `capacite`, `capaciteP`, `capaciteS`, `NbPClasse`, `NbSClasse`, `gare_depart`, `gare_arrivee`, `date_depart`, `heure_depart`, `prix`) VALUES ('$type','$capacite','$capaciteP','$capaciteS','$capaciteP','$capaciteS','$gare_depart','$gare_arrivee','$date_depart','$heure_depart','$prix')";
						mysqli_query($connect,$query);
						date_add($dateDepart, date_interval_create_from_date_string('1 days'));
						
					}
				}
				
				
			}
				
			?>
		</div>
	</div>

</body>
</html>