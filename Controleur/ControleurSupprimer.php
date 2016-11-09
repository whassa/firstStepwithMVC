<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';

class ControleurSupprimer extends Controleur {

    private $Client;

    public function __construct() {
        $this->Client = new Client();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
		$id = $this->requete->getParametre('id');
        $Client = $this->Client->getClient($id);
        $this->genererVue(array('Client' => $Client));
    }
	public function supprimer(){
		$id = $this->requete->getParametre('id');
		$this->Client->effacerClient($id);
		$this->rediriger('Accueil');
	}
}

