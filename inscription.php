<?php
	
	include "includes/dbh.inc.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Algerian Railways | Inscription</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merienda:700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="inscription.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark navbar fixed-top">
  		<a class="navbar-brand" href="accueil.php" style=" padding-right: 20px; font-family: 'Merienda', cursive;"><img id="logo" src="res/logo.png" style="height: 60px">Algerian Railways</a>
 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button> 

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="accueil.php">Accueil <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">A propos</a>
		      </li>
		      
		      <li class="nav-item">
		        <a class="nav-link" href="#">Contact</a>
		      </li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
			    <li class="nav-item">
					<a class="nav-link" onclick="document.getElementById('id01').style.display='block'">Se connecter <i class="fas fa-sign-in-alt"></i></a>
					<div id="id01" class="modal"> 
						<form class="modal-content animate" method="POST">
						    <div class="imgcontainer">
						      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
						    </div>
						    <div class="container">					    
							    <p>Email :</p>
							    <input  class="form-control" type="Email" placeholder="Entrez votre Email " name="username" required>					      
							    <p>Mot de passe :</p>
							    <input class="form-control" type="password" placeholder="Entrez votre mot de passe" name="password" required>					        
							    <button  type="submit" class="connexionbtn" name="btnCon">Connexion</button>					   
						    </div>
						    <div class="container" style="background-color:#f1f1f1">
						      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
						      <span class="psw"><a href="#">Mot de passe oublié ?</a></span>
						    </div>

						    <?php
						      	include "includes/login.php";
						    ?>
						</form>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="inscription.php">Inscription <i class="fas fa-user-plus"></i></a>
				</li>
			</ul>
			<script>						
						var modal = document.getElementById('id01');
						window.onclick = function(event) {
						    if (event.target == modal) {
						        modal.style.display = "none";
						    }
						}
			</script> 
  		</div>
	</nav>

	<div class="container">
		<div class="jumbotron" style="background-color: #ecf0f1">
			<h1>Rejoignez nous !</h1>
			<h4>Abonnez vous pour plus d'avantages !</h4>
		</div>
	
		<div class="jumbotron" style="background-color: #ecf0f1">
			<form method="POST">
				 <script type="text/javascript">
              		function alpha(e) {
                	var k;
                	document.all ? k = e.keyCode : k = e.which;
                	return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8);
                                }
            </script>
				<h3 id="recherche">Informations générales:</h3>
				<div class="row">
					<div class="col-lg-6">
						<input  class="form-control inscription-form" type="text" onkeypress="return alpha(event)" name="NomA" required placeholder="  Nom:*">
					</div>
					<div class="col-lg-6">
						<input class="form-control inscription-form" type="text" onkeypress="return alpha(event)" name="PrenomA" required placeholder="  Prenom:*">
					</div>
					<div class="col-lg-6">
						<input type="number" class="form-control inscription-form" name="NumCN" required placeholder="  Numéro de carte d'identité:*">
					</div>
					<div class="col-lg-6">
						<input type="password" class="form-control inscription-form" name="MDP" required placeholder="  Mot de passe:*">
					</div>
						
					<div class="col-lg-6" >
						Date de Naissance : <input type="date" name="dateN" max=<?php echo date('Y-m-d'); ?> class="form-control inscription-form" style="width: 50%">  
					</div>

					<div class="col-lg-6">
						Sexe: <select class="form-control" name="sexe" inscription-form" style="width: 50%"><option>--</option><option>Homme</option><option>Femme</option></select>
					</div>

				</div>
	          
	            <h3 id="recherche" style="margin-top: 40px">Coordonnées:</h3>
	           	<div class="row ">
					<div class="col-lg-6 ">
						<input type="text" class="form-control inscription-form" name="Adresse" required placeholder="  Adresse:*">
					</div>
					<div class="col-lg-6">
						<input  type="Email" class="form-control inscription-form" name="Email" required placeholder=" Email:* Exemple@xpl.com ">
					</div>
					<div class="col-lg-6">
						<input  type="number" class="form-control inscription-form" name="NumTel" required placeholder="  Numéro de Téléphone:*">
					</div>
					<div class="col-lg-6">
						<input type="number" class="form-control inscription-form" name="Post" required placeholder="  Code Postal:*">
					</div>
				</div>
				<center style="padding-top: 30px;">			
					<input type="submit" name="Valider" value="Valider" class="btn btn-primary btn-lg" style="width: 20%" >
				</center>	
			</form>	
			<?php
			if(isset($_POST['Valider']))
			{
				$nom= $_POST['NomA']; 
				$prenom= $_POST['PrenomA']; 
				$numcn= $_POST['NumCN']; 
				$password= $_POST['MDP']; 
				$dateN= $_POST['dateN']; 
				$sexe= $_POST['sexe']; 
				$adresse= $_POST['Adresse']; 
				$email= $_POST['Email']; 
				$num= $_POST['NumTel']; 
				$ccp= $_POST['Post']; 

			$query = "SELECT * FROM abonne WHERE email = '$email' ;";
			$result = mysqli_query($connect,$query);
			if($row = mysqli_fetch_assoc($result))
			{
				echo "Il y a déja un compte associé à cette adresse mail.";	
			}
			else
			{
				$query = "INSERT INTO abonne(`email`, `mot_de_passe`, `nom`, `prenom`, `sexe`, `dateN`, `adresse`, `telephone`, `ccp`, `numcn`)
			 	VALUES ('$email','$password','$nom','$prenom','$sexe','$dateN','$adresse','$num','$ccp','$numcn'); ";
				 mysqli_query($connect,$query);
			}
			}

			
			?>
        </div>
                   	
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>