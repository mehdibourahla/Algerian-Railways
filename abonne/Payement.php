<?php
  
  include "../includes/dbh.inc.php";
  session_start();
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
        $ccp = $_SESSION['ccp'];
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
  <a class="navbar-brand" href="accueil_user.php" style="font-family: 'Gloria Hallelujah', cursive; padding-right: 20px"><img id="logo" src="../res/logo.png" style="height: 60px">Algerian Railways</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="accueil_user.php">Accueil <span class="sr-only">(current)</span></a>
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
        <a class="nav-link" href="#">Profil <i class="fas fa-user"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../accueil.php">Se déconnecter <i class="fas fa-sign-out-alt"></i></a>
      </li>
  </ul>

       
      </li>
      
    </ul>
    
  </div>
</nav>


    <div class="container">

      <div class="jumbotron" style="background-color: #ecf0f1">
        <h1>Assurez votre Payement</h1>


        
       

            <form method="POST">
           <div class = "row">
              <div class="col-lg-6" style ="margin-bottom: 20px;">
                <h3>Prix totale:</h3>
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
            
               <div class="col-lg-6" style ="margin-bottom: 20px;">
                <h3>Mode de payement:</h3>
                </div>
              <div class="col-lg-6" >
                <h3>
                <input type="radio" name="Paye" value="CCP" required> CCP 
                <input type="radio" name="Paye" value="Point" style="margin-left: 40px;"> Point
              </h3>
              </div>
              
              <div class ="col-lg-4"></div>
              <div class="col-lg-6">
                <button type="submit" id="btnRech" class="btn btn-primary btn-lg" name="btnConfirmer">Confirmer</button>
              </div>
            </div>
         </form>
          

      </div>
    
      <?php
      if(isset($_POST['btnConfirmer']))
      {
        $prix = $_SESSION['prix'];
        $nbr_point = $prix/10;

        $id = $_SESSION['IDuser'];
        $possible = true;
        if($_POST['Paye']=="CCP")
        {
          $query = "UPDATE `abonne` SET `nbr_points`= `nbr_points`+ $nbr_point WHERE `abonneID` = $id;";
          mysqli_query($connect,$query);
        }
        else
        {
          $query = "SELECT nbr_points FROM abonne WHERE `abonneID` = $id;";
          $result = mysqli_query($connect,$query);
          if($row = mysqli_fetch_assoc($result))
          {
            if($row['nbr_points'] >= $prix)
            {
                $query = "UPDATE `abonne` SET `nbr_points`= `nbr_points`- $prix WHERE `abonneID` = $id;";
                mysqli_query($connect,$query);
            }
            else
            {
              $possible = false;
            }
          }
        }
        if($possible)
        {
        $query = "INSERT INTO `passager`(`nom`, `prenom`, `email`, `telephone`, `CCP`, `numcn`, `sexe`) VALUES ('$nom','$prenom','$email','$telephone','$ccp','$numcn','$sexe');";
        mysqli_query($connect,$query);

        $query = "SELECT passagerID FROM passager WHERE CCP='$ccp' ORDER BY passagerID DESC LIMIT 1 ;";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $passagerID = $row['passagerID'];

          $query = "SELECT NbPClasse,NbSClasse FROM train WHERE trainID='$IDtrain' ;";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          if($class=="Première"){
            $num_siege = $row['NbPClasse'];
            $query = "UPDATE `train` SET `NbPClasse`=`NbPClasse`-'$nbrp' WHERE trainID='$IDtrain' ;";
            mysqli_query($connect,$query);

          }
          else{
            $num_siege = $row['NbSClasse'];
            $query = "UPDATE `train` SET `NbSClasse`=`NbSClasse`-'$nbrp' WHERE trainID='$IDtrain' ;";
            mysqli_query($connect,$query);
          }
          
          
        $query = "INSERT INTO `ticket`(`passagerID`, `trainID`, `type`, `num_siege`, `classe`) VALUES ( $passagerID , $IDtrain , '$type' , $num_siege , '$class') ;";
        mysqli_query($connect,$query);


        echo '<script language="Javascript"> document.location.replace("Confirmation.php");</script>'; 
      }
      else
      {
        echo "Votre Solde est insuffisant.";
      }
    }
      ?>

    
    
  
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>