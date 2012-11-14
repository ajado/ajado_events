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
 * Controller for the Reservation object
 */
class Tx_AjadoEvents_Controller_ReservationController extends Tx_Extbase_MVC_Controller_ActionController {

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
	public function listAction() {
		$reservations = $this->reservationRepository->findAll();
		$this->view->assign('reservations', $reservations);
	}


	/**
	 * Displays a single Reservation
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $reservation the Reservation to display
	 * @return string The rendered view
	 */
	public function showAction(Tx_AjadoEvents_Domain_Model_Reservation $reservation) {
		$this->view->assign('reservation', $reservation);
	}


	/**
	 * Displays a form for creating a new  Reservation
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $newReservation a fresh Reservation object which has not yet been added to the repository
	 * @return void
	 * @dontvalidate $newReservation
	 */
	public function newAction(Tx_AjadoEvents_Domain_Model_Reservation $newReservation = NULL) {
		$this->view->assign('newReservation', $newReservation);
	}


	/**
	 * Creates a new Reservation and forwards to the list action.
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $newReservation a fresh Reservation object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_AjadoEvents_Domain_Model_Reservation $newReservation) {
		$this->reservationRepository->add($newReservation);
		$this->flashMessageContainer->add('Ihre Reservierung wurde erstellt.');
		
		$persistenceManager = Tx_Extbase_Dispatcher::getPersistenceManager();
		$persistenceManager->persistAll(); 

		$mailBody = 'Sie wurden für folgende Veranstaltung registriert:

Veranstaltung: ' . $newReservation->getEvent()->getTitle() . '
Ort: ' . ($newReservation->getEvent()->getInhouse()?'Kulturforum Berlin':$newReservation->getEvent()->getLocation()) . '
Zeit: ' . $newReservation->getEvent()->getStartTimeInfo() . '
Name: ' . $newReservation->getFirstName() . ' ' . $newReservation->getLastName() . '
Email: ' . $newReservation->getEmail() . '
Anzahl Teilnehmer: ' . $newReservation->getParticipants() . '

Einlass ist frühestens eine halbe Stunde vor Beginn. Wir ersuchen um Verständnis, dass nach Beginn der Veranstaltungen kein Einlass mehr möglich ist. Freie Platzwahl.

Aufgrund der erhöhten Sicherheitsvorkehrungen sehen wir uns leider veranlasst Sie zu bitten, zu den Veranstaltungen einen Personalausweis, Reisepass, Führerschein o.ä. zur persönlichen Identifikation mitzuführen.

Wir bedanken uns für die Reservierung und freuen uns, Sie bald im Österreichischen Kulturforum Berlin begrüßen zu dürfen';


		$message = t3lib_div::makeInstance('t3lib_mail_Message');
		$message->setTo('msavio@ajado.com')
			  ->setFrom('reservation@kulturforumberlin.at', 'Kulturforum Berlin')
			  ->setSubject('Anmeldung erfolgreich');
		$message->setBody($mailBody, 'text/plain');
		$message->send();

		$message = t3lib_div::makeInstance('t3lib_mail_Message');
		$message->setTo($newReservation->getEmail())
			  ->setFrom('reservation@kulturforumberlin.at', 'Kulturforum Berlin')
			  ->setSubject('Anmeldung erfolgreich');
		$message->setBody($mailBody, 'text/plain');
		$message->send();

		$this->redirect('show', 'Reservation', null, array('reservation' => $newReservation));
	}



	/**
	 * Displays a form for editing an existing Reservation
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $reservation the Reservation to display
	 * @return string A form to edit a Reservation
	 */
	public function editAction(Tx_AjadoEvents_Domain_Model_Reservation $reservation) {
		$this->view->assign('reservation', $reservation);
	}



	/**
	 * Updates an existing Reservation and forwards to the list action afterwards.
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $reservation the Reservation to display
	 */
	public function updateAction(Tx_AjadoEvents_Domain_Model_Reservation $reservation) {
		$this->reservationRepository->update($reservation);
		$this->flashMessageContainer->add('Your Reservation was updated.');
		$this->redirect('list');
	}


			/**
	 * Deletes an existing Reservation
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $reservation the Reservation to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_AjadoEvents_Domain_Model_Reservation $reservation) {
		$this->reservationRepository->remove($reservation);
		$this->flashMessageContainer->add('Your Reservation was removed.');
		$this->redirect('list');
	}


}
?>
