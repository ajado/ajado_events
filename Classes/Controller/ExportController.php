<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Ajado <tech@ajado.com>
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
 * Controller for the Reservation object
 */
class Tx_AjadoEvents_Controller_ExportController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_AjadoEvents_Domain_Repository_ReservationRepository
	 */
	protected $reservationRepository;

	/**
	 * eventRepository
	 *
	 * @var Tx_AjadoEvents_Domain_Repository_EventRepository
	 */
	protected $eventRepository;
	
	/**
	 * @param Tx_AjadoEvents_Domain_Repository_ReservationRepository $reservationRepository
 	 * @return void
	 */
	public function injectReservationRepository(Tx_AjadoEvents_Domain_Repository_ReservationRepository $reservationRepository) {
		$this->reservationRepository = $reservationRepository;
	}

	/**
	 * injectEventRepository
	 *
	 * @param Tx_AjadoEvents_Domain_Repository_EventRepository $eventRepository
	 * @return void
	 */
	public function injectEventRepository(Tx_AjadoEvents_Domain_Repository_EventRepository $eventRepository) {
		$this->eventRepository = $eventRepository;
	}

	/**
	 * Displays all Reservations
	 *
	 * @return void
	 */
	public function listEventsWithReservationAction() {
		$events = $this->eventRepository->findListOfEventsForReservationList();
		$this->view->assign('events', $events);
	}

	/**
	 * Displays all Reservations
	 *
	 * @return void
	 */
	public function exportReservationsAsCsvAction(Tx_AjadoEvents_Domain_Model_Event $event) {
		$slug = preg_replace("/[^a-zA-Z0-9 ]/", "", $event->getTitle());
		$slug = str_replace("  +", " ", $slug);
		$slug = str_replace(" ", "-", $slug);
		$this->response->setHeader('Content-Disposition', 'attachment; filename=' . $slug . '.csv', TRUE);
		$this->response->setHeader('Content-Type', 'application/CSV', TRUE);
		$this->response->setHeader('Cache-Control', 'no-cache', TRUE);
		$this->response->setHeader('Expires', '-1', TRUE);
		$this->response->sendHeaders();
		
		$reservationData = $this->reservationRepository->getReservationsForEventOrderedByLastname($event);
		
		$reservations = array();
		foreach($reservationData as $reservation) {
			$reservation->setLastname(strtoupper($reservation->getLastname()));
			$reservations[] = $reservation;
		}
		$this->view->assign('reservations', $reservations);
	}

	/**
	 * Displays all Reservations
	 *
	 * @return void
	 */
	public function listReservationsForEventAction(Tx_AjadoEvents_Domain_Model_Event $event) {
		/*$slug = preg_replace("/[^a-zA-Z0-9 ]/", "", $event->getTitle());
		$slug = str_replace("  +", " ", $slug);
		$slug = str_replace(" ", "-", $slug);
		$this->response->setHeader('Content-Disposition', 'attachment; filename=' . $slug . '.csv', TRUE);
		$this->response->setHeader('Content-Type', 'text/csv', TRUE);
		$this->response->sendHeaders();
		*/
		$reservationData = $this->reservationRepository->getReservationsForEventOrderedByLastname($event);
		
		$reservations = array();
		foreach($reservationData as $reservation) {
			$reservation->setLastname(strtoupper($reservation->getLastname()));
			$reservations[] = $reservation;
		}
		$this->view->assign('reservations', $reservations);
		$this->view->assign('event', $event);
	}

	/**
	 * Deletes one Reservation and redirects to the Event $event
	 * Validation with param Tx_AjadoEvents_Domain_Model_Reservation didn't work with second parameter
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Event $event
	 * @dontvalidate $reservation
	 * @return void
	 */
	public function deleteReservationForEventAction(Tx_AjadoEvents_Domain_Model_Event $event,
			Tx_AjadoEvents_Domain_Model_Reservation $reservation) {

		echo $event->getUid() . " " . $reservation->getUid();
		echo "Not yet implemented.";
		exit;
        $this->redirect('listReservationsForEventAction',null,null,array('event' => $event)); 
	}

	public function testAction() {
		$message = t3lib_div::makeInstance('t3lib_mail_Message');
		$message->setTo('office@hahnepeter.de');
		$message->setFrom('reservation@kulturforumberlin.at', 'Öterreichisches Kulturforum Berlin');
		$message->setSubject('Erinnerungx');
		$message->setBody('asdf', 'text/plain');
		$message->send();
	}
	
}
?>
