<?php
  
  include "../includes/dbh.inc.php";
  session_start();
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Algerian Railways | Recherche</title>
	<link rel="stylesheet" href="../res/bootstrap.css" crossorigin="anonymous">
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
      <h3 id="recherche">Recherchez votre Train :</h3>
      <form method="POST">
        <div class="row">
          <?php
          include "../includes/gare.php";
          ?>
          <div class="col-lg-6">
            <p>Date de d??part :</p>
            <input type="date" class="form-control" name="date" min = <?php echo date('Y-m-d'); ?>>
          </div>
          <div class="col-lg-6">
            <p>Le temps de d??part :</p>
            <input type="time" class="form-control" name="temps">
          </div>
          

          
        </div>
        <div class="wrapper">
          <button type="submit" id="btnRech" class="btn btn-primary btn-lg" name="btnRech">Rechercher</button>
        </div>
      </form>
    </div>
    <?php
    
    if(isset($_POST['btnRech']))
    {
      if( isset($_POST['gare_depart'])&&isset($_POST['gare_arrivee'])&&isset($_POST['date'])&&isset($_POST['temps']))
      { 
        $_SESSION['gare_depart'] = $_POST['gare_depart'] ;
        $_SESSION['gare_arrivee'] =$_POST['gare_arrivee'] ;
        $_SESSION['date'] =$_POST['date'] ;
        $_SESSION['temps'] =$_POST['temps'] ;

        
      }
      else
      {
        echo "<h2> Il faut remplir tous les champs </h2>";
      }
    }
    
    ?> 
<?php
        
        $gare_depart = $_SESSION['gare_depart'];
        $gare_arrivee = $_SESSION['gare_arrivee'];
        $date_depart = $_SESSION['date'];
        $temps = $_SESSION['temps'];
        $query = "SELECT * FROM train WHERE gare_depart = '$gare_depart' AND gare_arrivee ='$gare_arrivee' AND date_depart ='$date_depart' AND heure_depart >= '$temps' AND `date_depart`>= CURDATE() AND (`NbPClasse` > 0 OR `NbSClasse` >0) ;";
        $result = mysqli_query($connect,$query);
        $i=0;
        $temp = array();
        while( $row = mysqli_fetch_assoc($result))
        {

          echo"
           <table class="."table "." >
            <thead>
              <tr>
                <th scope=col>#</th>
                <th scope=col>Type</th>
                <th scope=col>Gare de D??part</th>
                <th scope=col>Gare d'arriv??e</th>
                <th scope=col>Date de d??part</th>
                <th scope=col>Heure de d??part</th>
                <th scope=col>R??servation</th>
             </tr>
            </thead>
            <tbody>
              <tr>
                <th scope=row id =".$i.">$row[trainID]</th>
                <td>$row[train_type]</td>
                <td>$row[gare_depart]</td>
                <td>$row[gare_arrivee]</td>
                <td>$row[date_depart]</td>
                <td>$row[heure_depart]</td>
                <td><form method="."POST"."><button type="."submit"." class="."btn btn-primary"." name="."btnRech".$i.">R??server</button></form></td>
              </tr>
            </tbody>
          </table>";
          $temp = array_merge($temp,array($row['trainID'],$row['train_type'],$row['gare_depart'],$row['gare_arrivee'],$row['date_depart'],$row['heure_depart']));
           if(isset($_POST['btnRech'.$i]))
        {   
            echo '<script language="Javascript"> document.location.replace("ReserverInfoE.php");</script>';
            $_SESSION['ID'] = $temp[$i];
            $_SESSION['type'] = $temp[$i+1];
            $_SESSION['depart'] =$temp[$i+2];
            $_SESSION['arrivee'] =$temp[$i+3];
            $_SESSION['dateD'] =$temp[$i+4];
            $_SESSION['heureD'] =$temp[$i+5];


              
          }
          $i+=6;
       
      }
        


       
?>
              
</div>

<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>