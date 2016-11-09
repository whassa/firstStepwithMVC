<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';

class ControleurModifier extends Controleur {

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
	public function modifier(){
		$id = $this->requete->getParametre('id');
		$prenom = $this->requete->getParametre('prenom');
		$nom = $this->requete->getParametre('nom');
		$telephone = $this->requete->getParametre('telephone');
		$adresse = $this->requete->getParametre('adresse');
		$email = $this->requete->getParametre('email');
		$ville = $this->requete->getParametre('ville');
		$province = $this->requete->getParametre('province');
		$pays = $this->requete->getParametre('pays');
		$image = $this->requete->getParametre('image');
		if (isset($image) AND $image['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            $dimension = $image['size'];
            if ($dimension <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($image['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    $fichierImage = 'Contenu/Images/' . basename($image['name']);
                    move_uploaded_file($image['tmp_name'], $fichierImage);
					basename($image['name']);
					$this->Client->updateClient($id,$prenom,$nom,$telephone,$adresse,$ville,$province,$pays,$email,$image['name']);
                } else {
                    throw new Exception("L'extension '$extension_upload' n'est pas autorisée pour les images");
                }
            } else {
                throw new Exception("Votre image ($dimension octets) dépasse la dimension autorisée (1000000 octets)");
            }
        } else {
			$this->Client->updateClientSansImage($id,$prenom,$nom,$telephone,$adresse,$ville,$province,$pays,$email);
		}
		$this->rediriger('Accueil');
	}
}

