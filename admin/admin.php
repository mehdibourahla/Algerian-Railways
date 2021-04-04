<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Administrateur</title>
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
		<div class="jumbotron" style="background-color: #ecf0f1">
				<h1>Bonjour,</h1>
				<h3>Vous êtes sur la page administrateur.</h3>

		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="jumbotron">
					<h1><i class="fas fa-subway"></i></h1>
					<h5>Modifier, ajouter ou supprimer un train :</h5>
					<div class="wrapper"><a href="GestionTrains.php" class="btn btn-primary">Gestion des Trains</a></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="jumbotron">
					<h1><i class="fas fa-users"></i></h1>
					<h5>Modifier ou supprimer un utilisateur :</h5>
					<div class="wrapper"><a href="#" class="btn btn-primary">Gestion des Utilisateurs</a></div>
				</div>
			</div>
		</div>
	</div>

	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>