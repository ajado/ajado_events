<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Christian Kartnig <office@hahnepeter.de>
*  
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Repository for Tx_AjadoEvents_Domain_Model_Reservation
 */
class Tx_AjadoEvents_Domain_Repository_ReservationRepository extends Tx_Extbase_Persistence_Repository {
	
	public function getReservationsForEventOrderedByLastname(Tx_AjadoEvents_Domain_Model_Event $event) {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectSysLanguage(FALSE);
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->setOrderings(Array('lastname' => Tx_Extbase_Persistence_Query::ORDER_ASCENDING));
		
		$constraints[] = $query->equals('event',$event->getUid());
		$query->matching($query->logicalAnd($constraints));
				
		return $query->execute();
	} 
	
	public function getReservationsToSendAReminderTo() {
		$query = $this->createQuery();
		$query->statement('SELECT r.*
FROM tx_ajadoevents_domain_model_reservation r
LEFT JOIN tx_ajadoevents_domain_model_event e ON e.uid=r.event
WHERE r.reminder_sent=0 AND r.deleted=0 AND r.hidden=0 AND e.start_date < (UNIX_TIMESTAMP() + 12*60*60)
LIMIT 30');
		return $query->execute();
	}
}
?>
