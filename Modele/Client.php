<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Client extends Modele {

	function getAllClient(){
		$sql = 'select * from passanger where Client_effacer = 0';
		$Client	= $this->executerRequete($sql);
		return $Client;
	}
// Le client
    public function getClient($idClient) {
        $sql = 'select * from Passanger where idPass = ?';
        $Client = $this->executerRequete($sql, array($idClient));
		if ($Client->rowCount() > 0)
            return $Client->fetch();
        else
            throw new Exception("Aucun Client ne correspond à l'identifiant '$idClient'");
        return $Client;
    }

//ajout d'un client
    public function ajouterClient($prenom,$nom,$telephone,$adresse,$ville,$province,$pays,$email,$image) {
		//$fichierImage = $this->enregistrerImage($image);
        $sql = 'insert into Passanger( prenom,nom,Adresse, pays, province, ville,telephone,email,client_effacer, image) values(?, ?, ?, ?, ?, ?,?,?,?,?)';
        $this->executerRequete($sql, array( $prenom,$nom,$adresse, $pays,$province, $ville,$telephone,$email, 0, $image));
    }
	 public function updateClientSansImage($idClient,$prenom,$nom,$telephone,$adresse,$ville,$province,$pays,$email) {
        $sql = 'update Passanger set nom = ?, prenom = ?,Telephone = ?,Adresse = ?,Pays = ?, Province = ?,ville = ?,email = ? where idPass = ?';
        $this->executerRequete($sql, array($nom,$prenom,$telephone,$adresse,$pays,$province,$ville,$email,$idClient));
    }
	 public function updateClient($idClient,$prenom,$nom,$telephone,$adresse,$ville,$province,$pays,$email,$image) {
        $sql = 'update Passanger set nom = ?, prenom = ?,Telephone = ?,Adresse = ?,Pays = ?, Province = ?,ville = ?,email = ?, image = ?  where idPass = ?';
        $this->executerRequete($sql, array($nom,$prenom,$telephone,$adresse,$pays,$province,$ville,$email,$image,$idClient));
    }

    public function effacerClient($idClient) {
        $sql = 'update Passanger set Client_Effacer = 1 where idPass = ?';
        $this->executerRequete($sql, array($idClient));
    }

    public function retablirClient($idClient) {
        $sql = 'update Passanger set Client_Effacer = 0 where idPass = ?';
        $this->executerRequete($sql, array($idClient));
    }

    /**
     * Renvoie le nombre total de commentaires
     * 
     * @return int Le nombre de commentaires
     */
	 
  



}
