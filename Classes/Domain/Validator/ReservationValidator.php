<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Christian Kartnig <office@hahnepeter.de>
*  All rights reserved
*
*  This class is a backport of the corresponding class of FLOW3. 
*  All credits go to the v5 team.
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 * Validator for the Reservation Object (checks if there are enough seats left for all participants )
 *
 * @package ajado_events
 * @scope prototype
 */
class Tx_AjadoEvents_Domain_Validator_ReservationValidator extends Tx_Extbase_Validation_Validator_AbstractValidator {

	/**
	 * Checks if Password matches Password Repeat and Username is unique
	 *
	 * @param object $login The login object to be validated
	 * @return boolean TRUE if the property value is valid, FALSE if an error occured
	 */
	public function isValid($reservation) {

		$this->errors = array();
		
		/* check for object type */
		if (! $reservation instanceof Tx_AjadoEvents_Domain_Model_Reservation) {
			$this->addError('The given object is not a Reservation.', 1265622568);
			return false;
		}

		/* check for participants type */
		if (intval($reservation->getParticipants())<=0) {
			$this->addError('Bitte geben Sie die Anzahl der Teilnehmer an.', 1000000068);
			return false;
		}		

		/* check for participants number */
		if ($reservation->getParticipants() > $reservation->getEvent()->getAvailableSeats()) {
			$this->addError('Es sind nicht genug Plätze vorhanden.', 1000000069);
			return false;
		}

		return true;
	}	

}

?>