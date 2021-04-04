<?php
	
	include "../includes/dbh.inc.php";
	session_start();
        
        
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Algerian Railways | Payement</title>
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
                  <span class="psw"><a href="#">Mot de passe oublié ?</a></span>
                </div>

                <?php
                    include "../includes/login.php";
                ?>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../inscription.php">Inscription <i class="fas fa-user-plus"></i></a>
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
				<h1>Assurez votre Payement</h1>


           <div class="row">
           	<div class="col-lg-6">
              <h3>Prix totale :  </h3>
           	</div>
            <div class="col-lg-6">
                <h3>
                <?php 
                //caalculer
                $prix = number_format((float)$_SESSION['prix'], 2, '.', '');
               echo $prix."DA";
               ?>  
               </h3>
            </div>
            <div class="col-lg-6">
            <form method="POST">
                <h3>Saisissez votre numéro CCP:</h3>
                  </div>
                <div class="col-lg-6">
                  <input class="form-control" type="number" name="CCP_E" required style ="margin-bottom: 20px;">
                </div>
                <div class="col-lg-6">
                  <h3>Saisissez votre code secret:</h3>
                </div>
                <div class="col-lg-6">
                  <input class="form-control" type="password" name="Code_secret" required>
                </div>
                <div class ="col-lg-4"></div>

           		<div class="col-lg-6">
                <br>
           			<button type="submit" id="btnRech" class="btn btn-primary btn-lg" name="btnConfirmer">Confirmer</button>
           		</div>
            </form>
            </div>   
			</div>

      <?php
      if(isset($_POST['btnConfirmer'])){
        $IDtrain=$_SESSION['ID'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $numcn = $_SESSION['numcn']; 
        $email = $_SESSION['email'];
        $sexe = $_SESSION['sexe'];
        $class = $_SESSION['class'];
        $type = $_SESSION['type'];
        $nbrp = $_SESSION['nbrp'];
        $telephone = $_SESSION['telephone'];
        
        $ccp = $_POST['CCP_E'];
        $query = "INSERT INTO `passager`(`nom`, `prenom`, `email`, `telephone`, `CCP`, `numcn`, `sexe`) VALUES ('$nom','$prenom','$email','$telephone','$ccp','$numcn','$sexe')";
        mysqli_query($connect,$query);

        $query = "SELECT passagerID FROM passager WHERE CCP='$ccp' ORDER BY passagerID DESC LIMIT 1";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $passagerID = $row['passagerID'];

          $query = "SELECT NbPClasse,NbSClasse FROM train WHERE trainID='$IDtrain'";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          if($class=="Première"){
            $num_siege = $row['NbPClasse'];
            $query = "UPDATE `train` SET `NbPClasse`=`NbPClasse`-'$nbrp' WHERE trainID='$IDtrain'";
            mysqli_query($connect,$query);

          }
          else{
            $num_siege = $row['NbSClasse'];
            $query = "UPDATE `train` SET `NbSClasse`=`NbSClasse`-'$nbrp' WHERE trainID='$IDtrain'";
            mysqli_query($connect,$query);
          }
          

       $query = "INSERT INTO `ticket`(`passagerID`, `trainID`, `type`, `num_siege`, `classe`) VALUES ($passagerID,$IDtrain,'$type',$num_siege,$class)";
        mysqli_query($connect,$query);


        echo '<script language="Javascript"> document.location.replace("ConfirmationE.php");</script>'; 
      }
      ?>
		
			

		
		
	
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>