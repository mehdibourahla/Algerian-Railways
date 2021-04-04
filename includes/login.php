<?php
	include_once'dbh.inc.php';

		$message ="";
		if(isset($_POST['btnCon']))
		{
			if( isset($_POST['username']) || isset($_POST['password']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
				if(strlen($username)>0 && strlen($password))
				{
				
					//Vérifier si c'est un admin
					$query = "SELECT * FROM administrateur WHERE email = '$username' AND mot_de_passe ='$password';";
					$result = mysqli_query($connect,$query);
					if( $row = mysqli_fetch_assoc($result))
					{
						echo '<script language="Javascript"> 
						var path = document.location.pathname;
						if(path =="/Projet/accueil.php" || path == "/Projet/inscription.php")
						{
							document.location.replace("admin/admin.php");
						}
						else
						{
							document.location.replace("../admin/admin.php");
						}
						</script>';
						
					}
					else
					{	//Sinon vérifier si c'est un utilisateur
						$query = "SELECT * FROM abonne WHERE email = '$username' AND mot_de_passe ='$password' LIMIT 1;";
						$result = mysqli_query($connect,$query);
						if( $row = mysqli_fetch_assoc($result))
							{
								$_SESSION['IDuser'] = $row['abonneID'];
								echo '<script language="Javascript"> 
								var path = document.location.pathname;
								if(path =="/Projet/accueil.php" || path == "/Projet/inscription.php")
								{
									document.location.replace("abonne/accueil_user.php");
								}
								else
								{
									document.location.replace("../abonne/accueil_user.php");
								}
								</script>';

							}
						else{
							//Sinon vérifier si c'est un responsable
							$query = "SELECT * FROM responsable WHERE email = '$username' AND mot_de_passe ='$password';";
							$result = mysqli_query($connect,$query);
							if( $row = mysqli_fetch_assoc($result))
								{
									echo '<script language="Javascript"> 
									var path = document.location.pathname;
									if(path =="/Projet/accueil.php" || path == "/Projet/inscription.php")
									{
										document.location.replace("responsable/responsable.php");
									}
									else
									{
										document.location.replace("../responsable/responsable.php");
									}
									</script>';			
								}
							else {
								$message = "ACCES DENIED"	;	
								echo "<script>document.getElementById('id01').style.display='block'</script>";
							}

						}

					}

				}
			else
			{
				$message = "*Il faut remplir les deux champs...";
			}
			echo $message;
		}
		}
		?>
