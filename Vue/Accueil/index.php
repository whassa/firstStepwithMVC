 
<?php $this->titre = "Accueil"; ?>

<?php 
if ($login !=  null){
	echo '<form method="post" action ="Envoyer/index" enctype="multipart/form-data"> ';
	echo 'Prenom:<input type="text" name="prenom" value="'.$prenom.'" required >';
	echo '<br/>';
	echo 'Nom:<input type="text" name="nom" value="'. $nom.'" required >';
	echo '<br/>';
	echo 'Telephone:<input type="text" name="telephone" value="'.$tel.'" required >';
	echo '<br/>';
	echo 'Adresse:<input type="text" name="adresse" value="'.$adresse .'" required >';
	echo '<br/>';
	echo 'Adresse Courriel:<input type="text" name="email" value="'. $email.'" required >';
	echo  '<br/>';
	echo 'Ville:<input type="text" name="ville" value="'.$ville.'" required >';
	echo '<br/>';
	echo 'Province:<input type="text" name="province" value="'.$province.'" required >';
	echo '<br/>';
	echo 'Pays:<input type="text" name="pays" value="'.$pays.'" required >';
	echo '<br/><br/>';
	echo '<input type="file" name="image" /><br /><input type="submit" name="Envoyer" value="envoyer"></form>';
}


echo"<table>";
echo"<tr>";
if ($login !=  null){
echo"<td></td>";
echo"<td></td>";
echo"<td></td>";
}
echo"<td>Id</td>";
echo"<td>Prenom</td>";
echo"<td>Nom</td>";
echo"<td>Telephone</td>";
echo"<td>Adresse</td>";
echo"<td>Email</td>";
echo"<td>Ville</td>";
echo"<td>Province</td>";
echo"<td>Pays</td>";
echo"</tr>";
foreach ($Client as $Client):
   
			
				echo "<tr>";
				if ($login !=  null){
				echo '<td><form method="post" action= "Information/index/'.$this->nettoyer($Client['idPass']).'">';
				echo "<input type='submit' name='Information' value='Information'>";
				echo "</form></td>";
				
				echo '<td><form method="post" action= "Modifier/index/'.$this->nettoyer($Client['idPass']).'">';
				echo "<input type='submit' name='modifier' value='Modifier'>";
				echo "</form></td>";
				echo '<td><form method="post" action ="Supprimer/index/'.$this->nettoyer($Client['idPass']).'">';
				echo "<input type='submit' name='swag' value='Supprimer'></form></td>";	
				}
				echo "<td>". $this->nettoyer($Client['idPass']). "</td>";
				echo "<td>". $this->nettoyer($Client['Prenom']). "</td>";
				echo "<td>". $this->nettoyer($Client['Nom']). "</td>";
				echo "<td>". $this->nettoyer($Client['Telephone']). "</td>";
				echo "<td>". $this->nettoyer($Client['Adresse']). "</td>";
				echo "<td>". $this->nettoyer($Client['Email']). "</td>";
				echo "<td>". $this->nettoyer($Client['Ville']). "</td>";
				echo "<td>". $this->nettoyer($Client['Province']). "</td>";
				echo "<td>". $this->nettoyer($Client['Pays']). "</td>";
				echo "</tr>";
			
 endforeach;
	echo "</table>";
 ?>
