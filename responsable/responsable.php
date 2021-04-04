<?php
	
	include "../includes/dbh.inc.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Algerian Railways | Responsable</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="responsable.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar fixed-top">
  <a class="navbar-brand" href="accueil_user.php" style="font-family: 'Gloria Hallelujah', cursive; padding-right: 20px"><img id="logo" src="../res/logo.png" style="height: 60px">Algerian Railways</a>
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

       
      </li>
      
    </ul>
    
  </div>
</nav>
<?php
//Taux de remplissage des trains GL
           $query = "SELECT SUM(capacite) as 'CapaciteTotal', SUM(NbPClasse) as 'NbPClasse', SUM(NbSClasse) as 'NbSClasse' FROM archive WHERE train_type ='Grande ligne'";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $trgl =100 - ($row['NbPClasse'] + $row['NbSClasse'])*100/$row['CapaciteTotal'] ;
          $trgl = number_format((float)$trgl, 2, '.', '');

          //Taux de remplissage des trains Régionaux
           $query = "SELECT SUM(capacite) as 'CapaciteTotal', SUM(NbPClasse) as 'NbPClasse', SUM(NbSClasse) as 'NbSClasse' FROM archive WHERE train_type ='Régional'";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $trr =100 - ($row['NbPClasse'] + $row['NbSClasse'])*100/$row['CapaciteTotal'] ;
          $trr = number_format((float)$trr, 2, '.', '');

          //Nombre Total des trains
           $query = "SELECT COUNT(*) as 'Nbr' FROM archive ";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $nbT = $row['Nbr'] ;

          //Nombre d'abonnés
          $query = "SELECT COUNT(*) as 'NbrA' FROM abonne ";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $nbA = $row['NbrA'] ;
?>
<div class ="container">
  <br>
  <h2><i class="fab fa-cloudscale" style="font-size: 1.5em"></i> Tableau de bord </h2>
  <hr>
  <div class="row">
    <div class="col-lg-3">
      <div class="jumbotron" style="background-color: #ecf0f1">
        <p style="margin-top: -50px;"><strong><i class="fas fa-percent" style="font-size: 1.5em"></i> Taux de remplissage des Trains régionaux:</strong></p>
        <p style="margin-bottom:-50px;"><strong><?php echo $trr; ?></strong></p>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="jumbotron" style="background-color: #ecf0f1">
        <p style="margin-top: -50px;"><strong><i class="fas fa-percent" style="font-size: 1.5em"></i> Taux de remplissage des Trains Grande ligne:</strong></p>
        <p style="margin-bottom:-50px;"><strong><?php echo $trgl; ?></strong></p>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="jumbotron" style="background-color: #ecf0f1">
        <p style="margin-top: -50px;"><strong><i class="fas fa-train" style="font-size: 1.5em"></i> Nombre total des trains:</strong></p>
        <p style="margin-bottom:-50px;"><strong><?php echo $nbT; ?></strong></p>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="jumbotron" style="background-color: #ecf0f1">
        <p style="margin-top:-50px;"><strong><i class="fas fa-users" style="font-size: 1.5em"></i> Nombre d'abonnés:</strong></p>
        <br>
        <p style="margin-bottom:-50px;"><strong><?php echo $nbA; ?></strong></p>
      </div>
    </div>
  </div>

  <div class="jumbotron" style="background-color: #ecf0f1">
      <h3 id="recherche">Recherchez votre Train :</h3>
      <form method="POST">
        <div class="row">
          <div class="col-lg-6">
          <p>Gare de départ :</p>
          
            <?php
              $query = "SELECT DISTINCT gare_depart FROM archive ";
              $res = mysqli_query($connect,$query);
              echo "<select class="."form-control " ."id="."exampleFormControlSelect1 " ."name="."gare_depart "."required>";
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
              $query = "SELECT DISTINCT gare_arrivee FROM archive ";
              $res = mysqli_query($connect,$query);           
              echo "<select class="."form-control " ."id="."exampleFormControlSelect2 " ."name="."gare_arrivee "."required>";
              echo "<option value="."".">--</option>";
              while (($row = mysqli_fetch_assoc($res)) != null)
              { 
                
                  echo "<option value = '{$row['gare_arrivee']}'>{$row['gare_arrivee']}</option>";        
              }
              echo "</select>";
            ?>
</div>
  
        </div>
        <div class="wrapper">
          <button type="submit" id="btnRech" class="btn btn-primary btn-lg" name="btnRech">Rechercher</button>
        </div>
      </form>
    </div>
    <?php
      if(isset($_POST['btnRech'])){

          $gare_depart = $_POST['gare_depart'];
          $gare_arrivee = $_POST['gare_arrivee'];

          $query = "SELECT SUM(capacite) as 'CapaciteTotal',SUM(capaciteP) as 'CapaciteP',SUM(capaciteS) as 'CapaciteS', SUM(NbPClasse) as 'NbPClasse', SUM(NbSClasse) as 'NbSClasse' FROM archive WHERE gare_depart ='$gare_depart' AND gare_arrivee = '$gare_arrivee'";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          
          //Taux de remplissage pour chaque ligne :
      $trl =100 - ($row['NbPClasse'] + $row['NbSClasse'])*100/$row['CapaciteTotal'] ;
      $trl = number_format((float)$trl, 2, '.', '');
      

      //Taux de rempllisage première classe
      $trp = 100 - ($row['NbPClasse'])*100/$row['CapaciteP'] ;
      $trp = number_format((float)$trp, 2, '.', '');
      

      //Taux de rempllisage deuxieme classe
      $trs = 100 - ($row['NbSClasse'])*100/$row['CapaciteS'] ;
      $trs = number_format((float)$trs, 2, '.', '');
      

      //Nombre de train pour chaque ligne 
      $query = "SELECT COUNT(*) as nbr FROM archive WHERE gare_depart ='$gare_depart' AND gare_arrivee = '$gare_arrivee' ";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $ntl = $row['nbr'];


        //Nombre de ticket vendu pour cette ligne
       $query = "SELECT COUNT(*) as nbr FROM ticket WHERE trainID IN (SELECT trainID FROM archive WHERE gare_depart = '$gare_depart' AND gare_arrivee = '$gare_arrivee') ";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $nbtl = $row['nbr'];  
      //Taux de billet simple
          $query = "SELECT COUNT(*) as nbr FROM ticket WHERE type = 'Aller-simple' AND trainID IN (SELECT trainID FROM archive WHERE gare_depart = '$gare_depart' AND gare_arrivee = '$gare_arrivee') ";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $nbs = $row['nbr']*100/$nbtl;
          $nbs = number_format((float)$nbs, 2, '.', '');
      //Taux de billet Aller-retour
          $query = "SELECT COUNT(*) as nbr FROM ticket WHERE type = 'Aller-retour' AND trainID IN (SELECT trainID FROM archive WHERE gare_depart = '$gare_depart' AND gare_arrivee = '$gare_arrivee') ";
          $result = mysqli_query($connect,$query);
          $row  = mysqli_fetch_assoc($result);
          $nbar = $row['nbr']*100/$nbtl;
          $nbar = number_format((float)$nbar, 2, '.', '');
        

        

       echo"
           <table class="."table "." >
            <thead>
              <tr>
                <th scope=col>Ligne</th>
                <th scope=col>% de remplissage</th>
                <th scope=col>% de remplssage 1ère classe</th>
                <th scope=col>% de remplssage 2ème classe</th>
                <th scope=col>% de billets simple</th>
                <th scope=col>% de billets Aller-Retour</th>
             </tr>
            </thead>
            <tbody>
              <tr>
                <th scope=row>$gare_depart - $gare_arrivee</th>
                <td>$trl</td>
                <td>$trp</td>
                <td>$trs</td>
                <td>$nbs</td>
                <td>$nbar</td>
                
              </tr>
            </tbody>
          </table>";
      }

      
      
    ?>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>