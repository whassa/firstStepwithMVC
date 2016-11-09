<?php

require_once 'Framework/Controleur.php';

/**
 * Classe parente des contrôleurs soumis à authentification
 *
 * @author Baptiste Pesquet
 */
abstract class ControleurSecurise extends Controleur {

    public function executerAction($action) {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->requete->getSession()->existeAttribut("idUtilisateur")) {
            parent::executerAction($action);
        } else {
            // Enregistrer l'action où on s'est connecté
            if ($this->requete->existeParametre("Scontroleur") && $this->requete->existeParametre("Saction")) {
                $controleur = $this->requete->getParametre("Scontroleur");
                $action = $this->requete->getParametre("Saction");
                $id = $this->requete->getParametre("id");
                $this->requete->getSession()->setAttribut("controleur", $controleur);
                $this->requete->getSession()->setAttribut("action", $action);
                $this->requete->getSession()->setAttribut("id", $id);
            }
            $this->rediriger("connexion");
        }
    }

}
