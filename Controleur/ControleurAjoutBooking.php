<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Booking.php';

class ControleurAjoutBooking extends Controleur {

	private $Booking;
    public function __construct() {
        $this->Booking = new Booking();
    }

    public function index() {
		$id = $this->requete->getParametre('id');
        $this->genererVue(array('id' => $id ));
    }
	public function ajoutBooking() {
		$id = $this->requete->getParametre('id');
		$number = $this->requete->getParametre('number');
		$Booking = $this->Booking->addBooking($id,$number);
        $this->rediriger('Accueil');
    }
}

