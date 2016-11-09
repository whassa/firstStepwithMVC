<?php $this->titre = "Modifier"; ?>

<?php 

	echo '<form method="post" action ="Modifier/modifier/'.$this->nettoyer($Client['idPass']).' "  enctype="multipart/form-data" > <br/>';
	echo 'Prenom:<input type="text" name="prenom" value="'.$this->nettoyer($Client['Prenom']).'" required >';
	echo '<br>';
	echo 'Nom:<input type="text" name="nom" value="'. $this->nettoyer($Client['Nom']).'" required >';
	echo '<br>';
	echo 'Telephone:<input type="text" name="telephone" value="'.$this->nettoyer($Client['Telephone']).'" required >';
	echo '<br>';
	echo 'Adresse:<input type="text" name="adresse" value="'.$this->nettoyer($Client['Adresse']) .'" required >';
	echo '<br>';
	echo 'Adresse Courriel:<input type="text" name="email" value="'. $this->nettoyer($Client['Email']).'" required >';
	echo '<br>';
	echo 'Ville:<input type="text" name="ville" value="'.$this->nettoyer($Client['Ville']).'" required >';
	echo '<br>';
	echo 'Province:<input type="text" name="province" value="'.$this->nettoyer($Client['Province']).'" required >';
	echo '<br>';
	echo 'Pays:<input type="text" name="pays" value="'.$this->nettoyer($Client['Pays']).'" required >';
	echo '<br>';
	echo '<input type="file" name="image" />';
	echo '<br><input type="submit" name="Modifier" value="envoyer"></form>';
	echo '<form method="post" action ="Accueil/Index"> ';
	echo '<input type="submit" name="Envoyer" value="Annuler">';
	echo '</form>';
?>

