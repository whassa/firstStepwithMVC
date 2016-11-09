<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';
require_once 'Modele/Booking.php';


class ControleurInformation extends Controleur {

    private $Client;
	private $Booking;
    public function __construct() {
        $this->Client = new Client();
		$this->Booking = new Booking();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
		$id = $this->requete->getParametre('id');
        $Client = $this->Client->getClient($id);
		$Booking = $this->Booking->getBookingbyId($id);
        $this->genererVue(array('Client' => $Client,'Booking' => $Booking));
    }
}

