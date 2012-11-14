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
 * Event
 */
 class Tx_AjadoEvents_Domain_Model_Event extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The title of the event
	 *
	 * @var string $title
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Subtitle or artist name
	 *
	 * @var string $subtitle
	 */
	protected $subtitle;

	/**
	 * The start date of the event, must be specified
	 *
	 * @var DateTime $startDate
	 * @validate NotEmpty
	 */
	protected $startDate;

	/**
	 * The end date of the event
	 *
	 * @var DateTime $endDate
	 */
	protected $endDate;

	/**
	 * The time the event begins
	 *
	 * @var DateTime $startTime
	 */
	protected $startTime;

	/**
	 * The time the event ends
	 *
	 * @var DateTime $endTime
	 */
	protected $endTime;

	/**
	 * The name of the location the event takes place in
	 *
	 * @var string $location
	 */
	protected $location;

	/**
	 * the postal address of the location
	 *
	 * @var string $locationAddress
	 */
	protected $locationAddress;

	/**
	 * specifies, if the event takes place inhouse
	 *
	 * @var boolean $inhouse
	 */
	protected $inhouse;

	/**
	 * Additional information
	 *
	 * @var string $additionalInfo
	 */
	protected $additionalInfo;

	/**
	 * description of the event
	 *
	 * @var string $description
	 */
	protected $description;


	/**
	 * newsletterText of the event
	 *
	 * @var string $newsletterText
	 */
	protected $newsletterText;

	/**
	 * images
	 *
	 * @var string $images
	 */
	protected $images;

	/**
	 * image displayed in the teaser
	 *
	 * @var string $teaserImage
	 */
	protected $teaserImage;

	/**
	 * links for the event
	 *
	 * @var string $links
	 */
	protected $links;

	/**
	 * event categories
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_AjadoEvents_Domain_Model_Category> $categories
	 */
	protected $categories;

	/**
	 * totalSeats
	 *
	 * @var integer
	 */
	protected $totalSeats;

	/**
	 * reservationDeadline
	 *
	 * @var DateTime
	 */
	protected $reservationDeadline;
	
	/**
	 * reservationStarttime
	 *
	 * @var DateTime
	 */
	protected $reservationStarttime;

	/**
	 * reservations
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_AjadoEvents_Domain_Model_Reservation>
	 */
	protected $reservations;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		* Do not modify this method!
		* It will be rewritten on each save in the extension builder
		* You may modify the constructor of this class instead
		*/
		$this->categories = new Tx_Extbase_Persistence_ObjectStorage();
		$this->reservations = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the subtitle
	 *
	 * @param string $subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Returns the subtitle
	 *
	 * @return string
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Sets the startDate
	 *
	 * @param DateTime $startDate
	 * @return void
	 */
	public function setStartDate(DateTime $startDate) {
		$this->startDate = $startDate;
	}

	/**
	 * Returns the startDate
	 *
	 * @return DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * Sets the endDate
	 *
	 * @param DateTime $endDate
	 * @return void
	 */
	public function setEndDate(DateTime $endDate) {
		$this->endDate = $endDate;
	}

	/**
	 * Returns the endDate
	 *
	 * @return DateTime
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * Sets the startTime
	 *
	 * @param DateTime $startTime
	 * @return void
	 */
	public function setStartTime(DateTime $startTime) {
		$this->startTime = $startTime;
	}

	/**
	 * Returns the startTime
	 *
	 * @return DateTime
	 */
	public function getStartTime() {
		return $this->startTime;
	}

	/**
	 * Sets the endTime
	 *
	 * @param DateTime $endTime
	 * @return void
	 */
	public function setEndTime(DateTime $endTime) {
		$this->endTime = $endTime;
	}

	/**
	 * Returns the endTime
	 *
	 * @return DateTime
	 */
	public function getEndTime() {
		return $this->endTime;
	}

	/**
	 * Returns the endTime
	 *
	 * @return DateTime
	 */
	public function getDateInfo() {
		$output = strtoupper(substr(strftime('%A', $this->startDate->format('U')), 0, 2)) . ',&nbsp;' . 
				  trim(strftime('%e.', $this->startDate->format('U'))) . "&nbsp;" . 
				  strtoupper(strftime('%b', $this->startDate->format('U'))) . "&nbsp;" . 
				  strftime('%Y', $this->startDate->format('U'));

		if (is_object($this->startTime)) {
			$output .= ',&nbsp;' . t3lib_BEfunc::time($this->startTime->format('U'), false);
			//$output .= ', ' . $this->startTime->format('H:i');
		} 
		if (is_object($this->endDate) || is_object($this->endTime)) {
			$output .= ' - ';
		}  
		if (is_object($this->endDate)) {
			$output .= strtoupper(substr(strftime('%A', $this->endDate->format('U')), 0, 2)) . ',&nbsp;' . 
				  trim(strftime('%e.', $this->endDate->format('U'))) . "&nbsp;" . 
				  strtoupper(strftime('%b', $this->endDate->format('U'))) . "&nbsp;" . 
				  strftime('%Y', $this->endDate->format('U'));
		}
		if (is_object($this->endDate) && is_object($this->endTime)) {
			$output .= ',&nbsp;FR';
		}
		if (is_object($this->endTime)) {
			$output .= t3lib_BEfunc::time($this->endTime->format('U'), false);
		}				
		return $output;
	}
	
	public function getStartTimeInfo() {
		$output = substr(strftime('%A', $this->startDate->format('U')), 0, 2) . ', ' . strftime('%e. %b %Y', $this->startDate->format('U'));
		if (is_object($this->startTime)) {
			$output .= ', ' . t3lib_BEfunc::time($this->startTime->format('U'), false);
			//$output .= ', ' . $this->startTime->format('H:i');
		} 
		return strtoupper($output);
	}

	/**
	 * Sets the location
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the location
	 *
	 * @return string
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the locationAddress
	 *
	 * @param string $locationAddress
	 * @return void
	 */
	public function setLocationAddress($locationAddress) {
		$this->locationAddress = $locationAddress;
	}

	/**
	 * Returns the locationAddress
	 *
	 * @return string
	 */
	public function getLocationAddress() {
		return $this->locationAddress;
	}

	/**
	 * Sets the inhouse
	 *
	 * @param boolean $inhouse
	 * @return void
	 */
	public function setInhouse($inhouse) {
		$this->inhouse = $inhouse;
	}

	/**
	 * Returns the inhouse
	 *
	 * @return boolean
	 */
	public function getInhouse() {
		return $this->inhouse;
	}

	/**
	 * Returns the boolean state of inhouse
	 *
	 * @return boolean
	 */
	public function isInhouse() {
		return $this->getInhouse();
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Sets the newsletterText
	 *
	 * @param string newsletterText
	 * @return void
	 */
	public function setNewsletterText($newsletterText) {
		$this->newsletterText = $newsletterText;
	}

	/**
	 * Returns the newsletterText
	 *
	 * @return string
	 */
	public function getNewsletterText() {
		return $this->newsletterText;
	}

	/**
	 * Sets the images
	 *
	 * @param string $images
	 * @return void
	 */
	public function setImages($images) {
		$this->images = $images;
	}

	/**
	 * Returns the images as an array
	 *
	 * @return string
	 */
	public function getImages() {
		//make array out of comma separated list		
		$imagesArray = explode(',',$this->images);
		//if the field is empty, return an empty array
		if(sizeof($imagesArray)==1 && $imagesArray[0]=='') {
			$imagesArray = array();
		}
		return $imagesArray;
	}

	/**
	 * Sets the teaserImage
	 *
	 * @param string $teaserImage
	 * @return void
	 */
	public function setTeaserImage($teaserImage) {
		$this->teaserImage = $teaserImage;
	}

	/**
	 * Returns the teaserImage
	 *
	 * @return string
	 */
	public function getTeaserImage() {
		return $this->teaserImage;
	}

	/**
	 * Sets the links
	 *
	 * @param string $links
	 * @return void
	 */
	public function setLinks($links) {
		$this->links = $links;
	}

	/**
	 * Returns the links
	 *
	 * @return string
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Sets the categories
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_AjadoEvents_Domain_Model_Category> $categories
	 * @return void
	 */
	public function setCategories(Tx_Extbase_Persistence_ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Returns the categories
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_AjadoEvents_Domain_Model_Category>
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Adds a Category
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Category the Category to be added
	 * @return void
	 */
	public function addCategory(Tx_AjadoEvents_Domain_Model_Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Category the Category to be removed
	 * @return void
	 */
	public function removeCategory(Tx_AjadoEvents_Domain_Model_Category $categoryToRemove) {
		$this->categories->detach($categoryToRemove);
	}

	/**
	 * Returns the additionalInfo
	 *
	 * @return string
	 */
	public function getAdditionalInfo() {
		return $this->additionalInfo;
	}

	/**
	 * Sets the additionalInfo
	 *
	 * @param string $additionalInfo
	 * @return void
	 */
	public function setAdditionalInfo($additionalInfo) {
		$this->additionalInfo = $additionalInfo;
	}

	/**
	 * Returns the totalSeats
	 *
	 * @return integer $totalSeats
	 */
	public function getTotalSeats() {
		return $this->totalSeats;
	}

	/**
	 * Sets the totalSeats
	 *
	 * @param integer $totalSeats
	 * @return void
	 */
	public function setTotalSeats($totalSeats) {
		$this->totalSeats = $totalSeats;
	}

	/**
	 * Returns the reservationDeadline
	 *
	 * @return DateTime $reservationDeadline
	 */
	public function getReservationDeadline() {
		return $this->reservationDeadline;
	}

	/**
	 * Sets the reservationDeadline
	 *
	 * @param DateTime $reservationDeadline
	 * @return void
	 */
	public function setReservationDeadline($reservationDeadline) {
		$this->reservationDeadline = $reservationDeadline;
	}
	
	/**
	 * Returns the reservationStarttime
	 *
	 * @return DateTime $reservationStarttime
	 */
	public function getReservationStarttime() {
		return $this->reservationStarttime;
	}

	/**
	 * Sets the reservationStarttime
	 *
	 * @param DateTime $reservationStarttime
	 * @return void
	 */
	public function setReservationStarttime($reservationStarttime) {
		$this->reservationStarttime = $reservationStarttime;
	}
	
	/**
	 * Adds a Reservation
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $reservation
	 * @return void
	 */
	public function addReservation(Tx_AjadoEvents_Domain_Model_Reservation $reservation) {
		$this->reservations->attach($reservation);
	}

	/**
	 * Removes a Reservation
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Reservation $reservationToRemove The Reservation to be removed
	 * @return void
	 */
	public function removeReservation(Tx_AjadoEvents_Domain_Model_Reservation $reservationToRemove) {
		$this->reservations->detach($reservationToRemove);
	}

	/**
	 * Returns the reservations
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_AjadoEvents_Domain_Model_Reservation> $reservations
	 */
	public function getReservations() {
		return $this->reservations;
	}

	/**
	 * Sets the reservations
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_AjadoEvents_Domain_Model_Reservation> $reservations
	 * @return void
	 */
	public function setReservations($reservations) {
		$this->reservations = $reservations;
	}


	/**
	 * checks if reservation deadline is in the future and there are places left
	 *
	 * @return int
	 */
	public function getAvailableSeats() {
		if($this->getTotalSeats()==0) {
			return 0;
		} else {
			$availableSeats = $this->getTotalSeats();
			foreach ($this->getReservations() as $v) {
				$availableSeats = $availableSeats - $v->getParticipants();
			}
			return $availableSeats;
		}
	}
	/**
	 * checks if reservation deadline is in the future and there are places left
	 *
	 * @return int
	 */
	public function getReservedSeats() {
		$i = 0;
		foreach ($this->getReservations() as $v) {
			$i += $v->getParticipants();
		}
		return $i;
	}

	/**
	 * checks if event day +1
	 *
	 * @return boolean
	 */
	public function isBeforeOrEqualEventDay() {
		$tomorrow = new DateTime('yesterday');
		
		return ($tomorrow < $this->getStartDate());
	}
	
	/**
	 * checks if reservation deadline is in the future and there are places left
	 *
	 * @return boolean
	 */
	public function isBeforeReservationStart() {
		return (($this->getAvailableSeats() > 0) &&
		        (new DateTime() < $this->getReservationStarttime()));
	}
	
	/**
	 * checks if reservation deadline is in the future and there are places left
	 *
	 * @return boolean
	 */
	public function isReservationPossible() {
		return (($this->getReservationDeadline()==null || (new DateTime() < $this->getReservationDeadline())) &&
				($this->getAvailableSeats()>0) &&
				(new DateTime() >= $this->getReservationStarttime()));
	}
	
	/**
	 * checks if reservation is already allowed
	 *
	 * @return boolean
	 */
	public function isFullyBooked() {
		return (($this->getReservationDeadline()==null || (new DateTime() < $this->getReservationDeadline())) &&
				($this->getAvailableSeats()<=0) &&
				($this->getTotalSeats() > 0) &&
				(new DateTime() >= $this->getReservationStarttime()));
	}
}
?>