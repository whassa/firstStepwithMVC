<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';
require_once 'Modele/Booking.php';

class ControleurAccueil extends Controleur {

	private $Booking;
    private $Client;
    public function __construct() {
        $this->Client = new Client();
		$this->Booking = new Booking();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $Client = $this->Client->getAllClient();
        
		if ($this->requete->getSession()->existeAttribut("login")) {
			$login = $this->requete->getSession()->getAttribut("login");
			$this->genererVue(array('Client' => $Client,'login' => $login));
		} else {
			$this->genererVue(array('Client' => $Client));
		}
    }
	
}

