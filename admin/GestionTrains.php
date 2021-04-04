<?php
	
	include "../includes/dbh.inc.php";
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Gestion des Trains</title>
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
			<h1>Gestion des Trains</h1>
			<p>Bienvenue dans la page de gestion des trains.
			A partir de cette page, vous avez l'accés total à la table des trains,
			 vous aurez la possibilité de modifier ou supprimer le profil d'un train en séléctionnant le bouton modifier ou bien ajouter un nouveau train à votre base de données, tout cela en quelques clicks seulement.</p>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="jumbotron">
					<h1 style="margin-top: -30px;"><i class="fas fa-plus-square"></i></h1>
					<h5>Ici, vous pouvez ajouter un train à la base de données en remplissant le formulaire d'ajout :</h5>
					<div class="wrapper"><a href="ajoutTrain.php" class="btn btn-primary btn-lg" style="margin-top: 30px; margin-bottom: -10px;">Ajouter un train</a></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="jumbotron">
					<h1 style="margin-top: -30px;"><i class="fas fa-search"></i></h1>
					<h5>Rechercher un train dans la base de données :</h5>
      				<form method="POST">
        				<div class="row">
          					<div class="col-lg-6">
          						<p>Gare de départ :</p>
						            <?php
						              $query = "SELECT DISTINCT gare_depart FROM train WHERE `date_depart`>= CURDATE() AND (`NbPClasse` = `capaciteP` AND `NbSClasse` =`capaciteS`)";
						              $res = mysqli_query($connect,$query);
						              echo "<select class="."form-control "."style="."margin-top:-10px; " ."id="."exampleFormControlSelect1 " ."name="."gare_depart "."required>";
						              echo "<option value="."".">--</option>";
						              while (($row = mysqli_fetch_assoc($res)) != null)
						              { 
						                
						                  echo "<option value = '{$row['gare_depart']}'>{$row['gare_depart']}</option>";     
						              }
						              echo "</select>";
						            ?>
							</div>
							<div class="col-lg-6">
          						<p>Gare d'arrivée :</p>
					            <?php
					              $query = "SELECT DISTINCT gare_arrivee FROM train WHERE `date_depart`>= CURDATE() AND (`NbPClasse` = capaciteP AND `NbSClasse` = capaciteS)";
					              $res = mysqli_query($connect,$query);           
					              echo "<select class="."form-control "."style="."margin-top:-10px; "."id="."exampleFormControlSelect2 "."name="."gare_arrivee "."required>";
					              echo "<option value="."".">--</option>";
					              while (($row = mysqli_fetch_assoc($res)) != null)
					              { 
					                
					                  echo "<option value = '{$row['gare_arrivee']}'>{$row['gare_arrivee']}</option>";        
					              }
					              echo "</select>";
					            ?>
							</div>
							<div class="col-lg-6">
								<p>Date de départ :</p>
								<input type="date" class="form-control" min = <?php echo date('Y-m-d'); ?> name="date" style="margin-top: -15px;margin-bottom: -15px;" required>
							</div>
							<div class="col-lg-6">
          						<button type="submit" id="btnRech" class="btn btn-primary btn-lg" name="btnRech" style="margin-top: 20px;margin-bottom: -15px;margin-left: 40px;">Rechercher</button>
        					</div>
        				</div>
     				 </form>
				</div>
			</div>
		</div>
	</div>

	<?php 
		if(isset($_POST['btnRech']))
		{
			echo '<script language="Javascript"> document.location.replace("RechTrainAdmin.php");</script>';
			$_SESSION['gare_depart'] = $_POST['gare_depart'] ;
			$_SESSION['gare_arrivee'] =$_POST['gare_arrivee'] ;
			$_SESSION['date'] =$_POST['date'] ;
		}
	?>
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>