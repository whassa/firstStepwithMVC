<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Booking extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBooking() {
        $sql = 'select idBooking as id, idPass as pass,'
                . ' booking status code as booking, travel class code as classCode,date_booking_made as date, number_in_the_party as number from idBooking'
                . ' order by idBooking desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
   function getBookingbyId($id){
		$sql = 'select * from Bookings where idPass = ?';
		$booking = $this->executerRequete($sql,array($id));
		return $booking;
	}
	function addBooking($idPass,$numberInTheParty){
		 $sql = 'insert into Bookings( idPass,date_booking_made,number_in_the_party) values(?,?,?)';
		$booking = $this->executerRequete($sql,array($idPass,date('Y-m-d'),$numberInTheParty));
		return $booking;
	}
}