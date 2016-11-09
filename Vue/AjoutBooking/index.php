<?php $this->titre = "AjoutBooking"; ?>

<?php 

	echo '<form method="post" action ="AjoutBooking/ajoutBooking/'.$this->nettoyer($id).'"> ';
	echo 'Number in the party :<input type="text" name="number" value="" required>';
	echo '<br/><input type="submit" name="Envoyer" value="Ajouter">';
	echo '</form>';
	echo '<form method="post" action ="Information/index/'.$this->nettoyer($id). '"> ';
	echo '<input type="submit" name="Envoyer" value="Annuler">';
	echo '</form>';
?>

