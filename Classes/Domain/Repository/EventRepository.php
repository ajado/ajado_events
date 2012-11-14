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
 * Repository for Tx_AjadoEvents_Domain_Model_Event
 */
 class Tx_AjadoEvents_Domain_Repository_EventRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * defaultOrderings
	 *
	 * @var array $defaultOrderings
	 */
	protected $defaultOrderings = array(
		'start_date' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING
	 );

	/**
	 * findByCategory
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Category $category
	 * @return void
	 */
	public function findByCategory($category) {
		$query = $this->createQuery();
		$query->matching($query->contains('categories',$category));
		return $query->execute();
	}
	
	/**
	 * findByCategory
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Category $category
	 * @return void
	 */
	public function findFutureEventsByCategory($category) {
		$query = $this->createQuery();
		$constraints[] = $query->contains('categories',$category);
		$constraints[] = $query->greaterThanOrEqual('start_date',(time()-24*60*60));
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}
	
	/**
	 * findByDate
	 *
	 * @param int $startDateFrom
	 * @param int $startDateTo
	 * @param int $endDateTo
	 * @param int $endDateTo
	 * @param Tx_AjadoEvents_Domain_Model_Category $category
	 * @param boolean $inhouse
	 * @return void
	 */
	public function findByDate($startDateFrom = null, $startDateTo = null, $endDateFrom = null, $endDateTo = null, $category = null, $inhouse = false) {
		$query = $this->createQuery();

		if(intval($startDateFrom)>0) {
			$constraints[] = $query->greaterThanOrEqual('start_date',$startDateFrom);
		}
		
		if(intval($startDateTo)>0) {
			$constraints[] = $query->lessThan('start_date',$startDateTo);
		}
		
		if(intval($endDateFrom)>0) {
			$constraints[] = $query->greaterThanOrEqual('end_date',$endDateFrom);
		}
		
		if(intval($endDateTo)>0) {
			$constraints[] = $query->lessThan('end_date',$endDateTo);
		}
				
		if($category!=null) {
			$constraints[] = $query->contains('categories',$category);
		}
		if($inhouse) {
			$constraints[] = $query->equals('inhouse',true);
		}
		
		$query->matching($query->logicalAnd($constraints));
		
		return $query->execute();
	}

	/**
	 * findFutureEventsWhereReservationPossible
	 *
	 * @param int $now
	 * @return void
	 */
	public function findFutureEventsWithReservation() {
		$query = $this->createQuery();
		
		//return (($this->getReservationDeadline()==null || $this->getReservationDeadline() > new DateTime()) && $this->getAvailableSeats()>0);
		
		$constraints[] = $query->greaterThanOrEqual('total_seats', 1);
		$constraints[] = $query->greaterThanOrEqual('reservation_deadline', time());
		$constraints[] = $query->lessThanOrEqual('reservation_starttime', time());
		
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}
	
	
	public function findListOfEventsForReservationList() {
		$beginTime = time() - (24 * 60 * 60);
		
		$query = $this->createQuery();
		//$constraints[] = $query->greaterThanOrEqual('start_date',$beginTime);
		$constraints[] = $query->greaterThanOrEqual('total_seats', 1);
		
		$query->getQuerySettings()->setRespectSysLanguage(FALSE);
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->matching($query->logicalAnd($constraints));
				
		return $query->execute();
	}
}
?>