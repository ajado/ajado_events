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
 * Reservation
 */
class Tx_AjadoEvents_Domain_Model_Reservation extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Creation time
	 *
	 * @var int
	 */
	protected $crdate;

	/**
	 * lastname
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $lastname;

	/**
	 * firstname
	 *
	 * @var string
	 */
	protected $firstname;

	/**
	 * email
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $email;

	/**
	 * participants
	 *
	 * @var string
	 */
	protected $participants;

	/**
	 * event
	 * 	 
	 * @var Tx_AjadoEvents_Domain_Model_Event
	 */
	protected $event;

	/**
	 * specifies, if the reminder was already sent
	 *
	 * @var boolean
	 */
	protected $reminderSent;

	/**
	 * Returns crdate
	 *
	 * @return int crdate
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * Returns crdate in human readable form
	 *
	 * @return string crdate
	 */
	public function getCrdateFormatted() {
		return date('d.m.Y', $this->getCrdate());
	}

	/**
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * @return string
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * @return string
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $participants
	 * @return void
	 */
	public function setParticipants($participants) {
		$this->participants = $participants;
	}

	/**
	 * @return string
	 */
	public function getParticipants() {
		return $this->participants;
	}

	/**
	 * @param Tx_AjadoEvents_Domain_Model_Event $event
	 * @return void
	 */
	public function setEvent($event) {
		$this->event = $event;
	}

	/**
	 * @return Tx_AjadoEvents_Domain_Model_Event
	 */
	public function getEvent() {
		return $this->event;
	}
	
	/**
	 * Sets the inhouse
	 *
	 * @param boolean $reminderSent
	 * @return void
	 */
	public function setReminderSent($reminderSent) {
		$this->reminderSent = $reminderSent;
	}

	/**
	 * Returns the inhouse
	 *
	 * @return boolean
	 */
	public function getReminderSent() {
		return $this->reminderSent;
	}
}
?>
