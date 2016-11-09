<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

/**
 * Contrôleur gérant la connexion au site
 *
 * @author Baptiste Pesquet
 */
class ControleurConnexion extends Controleur {

    private $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    public function index() {
        $this->genererVue();
    }

    public function connecter() {
        if ($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")) {
        $login = $this->requete->getParametre("login");
        $mdp = $this->requete->getParametre("mdp");
        if ($this->utilisateur->connecter($login, $mdp)) {
            $utilisateur = $this->utilisateur->getUtilisateur($login, $mdp);
            $this->requete->getSession()->setAttribut("idUtilisateur", $utilisateur['idUtilisateur']);
            $this->requete->getSession()->setAttribut("login", $utilisateur['login']);

            // Récupérer l'action d'où on s'est connecté 
            if ($this->requete->getSession()->existeAttribut("controleur") &&
                    $this->requete->getSession()->existeAttribut("action")) {
                $controleur = $this->requete->getSession()->getAttribut("controleur");
                $action = $this->requete->getSession()->getAttribut("action");
                $id = $this->requete->getSession()->getAttribut("id");
                $this->rediriger($controleur . '/' . $action . '/' . $id);
            } else
                $this->rediriger("accueil");
        } else
            $this->genererVue(array('msgErreur' => 'Login ou mot de passe incorrects'), "index");
      }
       else
           throw new Exception("Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter() {
        $this->requete->getSession()->detruire();

        if ($this->requete->existeParametre("Scontroleur") && $this->requete->existeParametre("Saction")) {
            $controleur = $this->requete->getParametre("Scontroleur");
            $action = $this->requete->getParametre("Saction");
            $id = $this->requete->getParametre("id");
            $this->rediriger($controleur . '/' . $action . '/' . $id);
        } else
            $this->rediriger("accueil");
    }

}
?>
