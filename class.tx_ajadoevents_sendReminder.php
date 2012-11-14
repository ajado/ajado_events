<?php

class tx_ajadoevents_sendReminder extends tx_scheduler_Task {

	public function execute() {

		if (!class_exists('Tx_Extbase_Utility_ClassLoader', FALSE)) {
        		$classLoader = t3lib_div::makeInstance('Tx_Extbase_Utility_ClassLoader');
        		spl_autoload_register(array($classLoader, 'loadClass'));
		}

		$reservationRepository = t3lib_div::makeInstance('Tx_AjadoEvents_Domain_Repository_ReservationRepository');			
		
		$reservations = $reservationRepository->getReservationsToSendAReminderTo();
		
		$reservationsProcessed = array();
		foreach($reservations as $reservation) {
			$reservationsProcessed[] = $reservation->getUid();

			$mailBody = 'Wir möchten Sie gerne erinnern, dass Sie sich für folgende Veranstaltung registriert haben:

Veranstaltung: ' . $reservation->getEvent()->getTitle() . '
Ort: ' . ($reservation->getEvent()->getInhouse()?'Österreichisches Kulturforum Berlin':$reservation->getEvent()->getLocation()) . '
Zeit: ' . $reservation->getEvent()->getStartTimeInfo() . '
Name: ' . $reservation->getFirstName() . ' ' . $reservation->getLastName() . '
Email: ' . $reservation->getEmail() . '
Anzahl Teilnehmer: ' . $reservation->getParticipants() . '

Sollte es Ihnen nicht möglich sein, der Veranstaltung beizuwohnen, bitten wir Sie, uns dies mitzuteilen. Sie können dies per Email an berlin-kf@bmeia.gv.at oder telefonisch unter 03020287 114 tun.

Einlass ist frühestens eine halbe Stunde vor Beginn. Wir ersuchen um Verständnis, dass nach Beginn der Veranstaltungen kein Einlass mehr möglich ist. Freie Platzwahl.

Aufgrund der erhöhten Sicherheitsvorkehrungen sehen wir uns leider veranlasst Sie zu bitten, zu den Veranstaltungen einen Personalausweis, Reisepass, Führerschein o.ä. zur persönlichen Identifikation mitzuführen.

Wir bedanken uns für die Reservierung und freuen uns, Sie bald im Österreichischen Kulturforum Berlin begrüßen zu dürfen.';

			$message = t3lib_div::makeInstance('t3lib_mail_Message');
			$message->setTo('msavio@ajado.com')
				  ->setFrom('reservation@kulturforumberlin.at', 'Österreichisches Kulturforum Berlin')
				  ->setSubject('Erinnerung: ' . $reservation->getEvent()->getTitle());
			$message->setBody($mailBody, 'text/plain');
			$message->send();

			$message = t3lib_div::makeInstance('t3lib_mail_Message');
			$message->setTo('acfbbb@hahnepeter.de')
				  ->setFrom('reservation@kulturforumberlin.at', 'Österreichisches Kulturforum Berlin')
				  ->setSubject('Erinnerung: ' . $reservation->getEvent()->getTitle());
			$message->setBody($mailBody, 'text/plain');
			$message->send();
	
			$message = t3lib_div::makeInstance('t3lib_mail_Message');
			$message->setTo($reservation->getEmail())
				  ->setFrom('reservation@kulturforumberlin.at', 'Österreichisches Kulturforum Berlin')
				  ->setSubject('Erinnerung: ' . $reservation->getEvent()->getTitle());
			$message->setBody($mailBody, 'text/plain');
			$message->send();
			
			$query = 'UPDATE tx_ajadoevents_domain_model_reservation SET reminder_sent=1 WHERE uid='.$reservation->getUid();
			$result = $GLOBALS['TYPO3_DB']->sql(TYPO3_db, $query);			
		}
		if(count($reservationsProcessed)) {
			mail('acfb@hahnepeter.de', 'reservations', implode(',', $reservationsProcessed));		
		}
		return true;
	}

}

?>
