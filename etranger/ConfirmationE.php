<?php
	
	include "../includes/dbh.inc.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Algerian Railways | Confirmation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="recherche.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark navbar fixed-top">
      <a class="navbar-brand" href="../accueil.php" style="font-family: 'Gloria Hallelujah', cursive; padding-right: 20px"><img id="logo" src="../res/logo.png" style="height: 60px">Algerian Railways</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../accueil.php">Accueil <span class="sr-only">(current)</span></a>
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
                  <span class="psw"><a href="#">Mot de passe oubli?? ?</a></span>
                </div>

                <?php
                    include "../includes/login.php";
                ?>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">Inscription <i class="fas fa-user-plus"></i></a>
        </li>
      </ul>
      <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
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
				<h1>Reservation confirm??e</h1>
        <h3>Merci pour votre r??servation, un email vous a ??t?? envoy?? avec la possibilit?? d'imprimer votre ticket ?? partir de la pi??ce jointe.</h3>

        <form method="POST" action="../accueil.php">
           <center>
          <button type="submit" id="btnRech" class="btn btn-primary btn-lg" name="btnRech">Revenir ?? l'accueil</button>
           </center>
          
        </form>
          

                     

           
           

           
                
            
				
               
          
      



			</div>
		
			

		
		
	
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>