<?php $this->titre = "supprimer"; ?>

<?php 
	echo '<form method="post" action= "Supprimer/supprimer/'.$this->nettoyer($Client['idPass']).'">';
	echo "Id :".$this->nettoyer($Client['idPass']) ."<br/>";
	echo "Prenom :".$this->nettoyer($Client['Prenom']) ."<br/>";
	echo "Nom :".$this->nettoyer($Client['Nom']) ."<br/>";
	echo "Telephone :".$this->nettoyer($Client['Telephone']) ."<br/>";
	echo "Adresse :".$this->nettoyer($Client['Adresse']) ."<br/>";
	echo "Email :".$this->nettoyer($Client['Email']) ."<br/>";
	echo "Ville :".$this->nettoyer($Client['Ville']) ."<br/>";
	echo "Province :".$this->nettoyer($Client['Province']) ."<br/>";
	echo "Pays :".$this->nettoyer($Client['Pays']) ."<br/><br/>";
	echo "<input type='submit' name='modifier' value='Supprimer'> </form>";
	echo '<form method="post" action= "Accueil/index" >';
	echo "<input type='submit' name='Annuler' value='Annuler'></form>";
?>

