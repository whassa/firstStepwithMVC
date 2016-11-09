<?php $this->titre = "Information"; ?>

<?php 

	echo 'Prenom:'.$this->nettoyer($Client['Prenom']);
	echo '<br>';
	echo 'Nom:'. $this->nettoyer($Client['Nom']);
	echo '<br>';
	echo 'Telephone:'.$this->nettoyer($Client['Telephone']);
	echo '<br>';
	echo 'Adresse:'.$this->nettoyer($Client['Adresse']);
	echo '<br>';
	echo 'Adresse Courriel:'. $this->nettoyer($Client['Email']);
	echo '<br>';
	echo 'Ville:'.$this->nettoyer($Client['Ville']);
	echo '<br>';
	echo 'Province:'.$this->nettoyer($Client['Province']);
	echo '<br>';
	echo 'Pays:'.$this->nettoyer($Client['Pays']);
	echo '<form method="post" action= "Accueil/Index">';
	echo "<input type='submit' name='Information' value='Retour à la page titre'>";
	echo "</form>";
	if ($Client['Image'] != null){
		echo '<img src="Contenu/images/'.$this->nettoyer($Client['Image']).'" height="100" width="100">';
	}
	if ($Client['fichierImage'] != "") {
            echo '<img src="' . $racineWeb . 'Contenu/images/' . $commentaire['fichierImage'] . '">';
    }
	echo '<table style="text-align:center;">';
	echo "<tr>";
	echo "<td> IDBooking</td>";
	echo "<td> DateBooking</td>";
	echo "<td> Number in the party</td>";
	echo "</tr>";
	foreach ($Booking as $Booking):
		echo "<tr>";
		echo "<td>". $this->nettoyer($Booking['Idbooking']). "</td>";
		echo "<td>".$this->nettoyer($Booking['date_booking_made']). "</td>";
		echo "<td>".$this->nettoyer($Booking['number_in_the_party']). "</td>";
		echo "</tr>";
	 endforeach;
	 echo "</table>";
	echo '<form method="post" action= "AjoutBooking/Index/'.$this->nettoyer($Client['idPass']).'">';
	echo "<input type='submit' name='Information' value='Ajouter Reservation'>";
	echo "</form>";
?>

