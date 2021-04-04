<div class="col-lg-6">
					<p>Gare de départ :</p>

					
						<?php
							$query = "SELECT DISTINCT gare_depart FROM train WHERE `date_depart`>= CURDATE() AND (`NbPClasse` > 0 OR `NbSClasse` >0)";
							$res = mysqli_query($connect,$query);
							echo "<select class="."form-control "." id="."exampleFormControlSelect1 " ."name="."gare_depart "."required>";
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
							$query = "SELECT DISTINCT gare_arrivee FROM train WHERE `date_depart`>= CURDATE() AND (`NbPClasse` > 0 OR `NbSClasse` >0)";
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