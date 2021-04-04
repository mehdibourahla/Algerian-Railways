<?php
  
  include "../includes/dbh.inc.php";
  session_start();
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Algerian Railways | Réservation</title>
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
        <h1>Completez les informations:</h1>
        
        <table class="table">
            <thead>
              <tr>
                <th scope=col>#</th>
                <th scope=col>Type</th>
                <th scope=col>Gare de Départ</th>
                <th scope=col>Gare d'arrivée</th>
                <th scope=col>Date de départ</th>
                <th scope=col>Heure de départ</th>
             </tr>
            </thead>
            <tbody>
              <tr>
                <th scope=row><?php echo $_SESSION['ID'];?></th>
                <td><?php echo $_SESSION['type'];?></td>
                <td><?php echo $_SESSION['depart'];?></td>
                <td><?php echo $_SESSION['arrivee'];?></td>
                <td><?php echo $_SESSION['dateD'];?></td>
                <td><?php echo $_SESSION['heureD'];?></td>
              </tr>
            </tbody>
          </table>
          <?php
          $Iduser = $_SESSION['IDuser'];
          $query = "SELECT * FROM abonne WHERE abonneID ='$Iduser'";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $ccp = $row['ccp'];

          ?>

          <form method="POST">
            <script type="text/javascript">
            
              function alpha(e) {
                var k;
                document.all ? k = e.keyCode : k = e.which;
                return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8);
                                }
            </script>
          <div class="row">
          <div class="col-lg-6">
            <input  class="form-control inscription-form" type="text" onkeypress="return alpha(event)" name="NomP" value="<?php echo($row['nom']); ?>">
          </div>
          <div class="col-lg-6">
            <input class="form-control inscription-form" type="text" onkeypress="return alpha(event)" name="PrenomP" value="<?php echo($row['prenom']); ?>">
          </div> 
          <div class="col-lg-6">
            <input type="number" class="form-control inscription-form" name="NumCN_P" value="<?php echo($row['numcn']); ?>">
          </div>
          <div class="col-lg-6">
            <input type="email" class="form-control inscription-form" name="EmailP" value="<?php echo($row['email']); ?>">
          </div>
            
          

          <div class="col-lg-6">
            
            Sexe: <select class="form-control inscription-form" name="sexe" style="width: 50%" >
              <?php
            if($row['sexe'] == "Homme"){
              echo"<option>--</option>
              <option selected>Homme</option>
              <option>Femme</option>";
            }
            else
            {
              echo"<option>--</option>
              <option>Homme</option>
              <option selected>Femme</option>";
            }
            ?>
            </select>
          </div>

          <div class="col-lg-6">
             <input class="form-control inscription-form" type="number" name="telephone" value="<?php echo($row['telephone']); ?>">
          </div>

        </div>

            
           <div class="row">
              <div class="col-lg-6">
                Classe: <select class="form-control inscription-form" name="class" style="width: 30%" required > 
                      
                      <option value="">
                        --
                      </option>

                      <option>
                        Première
                      </option>

                      <option>
                        Deuxième
                      </option>
                </select>
              
              </div>
              

              
              <div class="col-lg-6">
                Type du ticket: <select class="form-control inscription-form" name="type" style="width: 30%" required="" > 
                      
                      <option value="">
                        --
                      </option>

                      <option>
                        Aller-simple
                      </option>

                      <option>
                        Aller-retour
                      </option>
                </select>
              
              </div>
              <div class="col-lg-6">
                Nombre de places: <input class="form-control inscription-form"  type="number" min =1  name="NbrP" style="width: 30%" required="">
              </div>
              <div class="col-lg-6">
                <button type="submit" id="btnRech" class="btn btn-primary btn-lg" name="paye" style ="margin-top: 10px">Passer au Payement</button>
              </div>
            </div>
           
         </form>

      </div>
      <?php
        if(isset($_POST['paye']))
        {
          $ID = $_SESSION['ID'];
          $query = "SELECT prix FROM train WHERE trainID='$ID'";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
         
          $nbr = $_POST['NbrP'];
          $trajet = $row['prix'];

          $prix = 0;
          if($_POST['class']=="Première")
          {
            if($_POST['type']=="Aller-retour")
            {
              $prix = ($trajet+($trajet*70)/100)*$nbr;
            }
            else
            {
              $prix = ($trajet+($trajet*20)/100)*$nbr;
            }
            
          }
          else
          {
             if($_POST['type']=="Aller-retour")
            {
              $prix = ($trajet+($trajet*50)/100)*$nbr;
            }
            else
            {
              $prix = $trajet * $nbr;
            }
            
          }
         

          $_SESSION['prix'] = $prix;
          $_SESSION['nom'] = $_POST['NomP'] ;
          $_SESSION['prenom'] = $_POST['PrenomP'];
          $_SESSION['numcn'] = $_POST['NumCN_P'];
          $_SESSION['email'] = $_POST['EmailP'];
          $_SESSION['sexe'] = $_POST['sexe'];
          $_SESSION['type'] = $_POST['type'];
          $_SESSION['class'] = $_POST['class'];
          $_SESSION['nbrp'] = $nbr;
          $_SESSION['telephone'] = $_POST['telephone'];
          $_SESSION['ccp'] = $ccp;        
          
          $query = "SELECT NbPClasse,NbSClasse FROM train WHERE trainID='$ID'";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          if($_SESSION['class']=="Première"){
           if($nbr > $row['NbPClasse'])
            {echo "<h3> Nombre de place libre en première classe insuffisant</h3>";}
            else
              {echo '<script language="Javascript"> document.location.replace("Payement.php");</script>';}
          }
          else{
            if($nbr > $row['NbSClasse'])
              {echo "<h3> Nombre de place libre en deuxième classe insuffisant</h3>";}
            else
              {echo '<script language="Javascript"> document.location.replace("Payement.php");</script>';}
          }

        }

      ?>
    
      

    
    
  
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>