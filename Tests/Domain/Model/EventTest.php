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
 * Testcase for class Tx_AjadoEvents_Domain_Model_Event.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Ajado Events
 *
 * @author Christian Kartnig <office@hahnepeter.de>
 */
class Tx_AjadoEvents_Domain_Model_EventTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_AjadoEvents_Domain_Model_Event
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_AjadoEvents_Domain_Model_Event();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getSubtitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSubtitleForStringSetsSubtitle() { 
		$this->fixture->setSubtitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSubtitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getStartDateReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setStartDateForDateTimeSetsStartDate() { }
	
	/**
	 * @test
	 */
	public function getEndDateReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setEndDateForDateTimeSetsEndDate() { }
	
	/**
	 * @test
	 */
	public function getStartTimeReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setStartTimeForDateTimeSetsStartTime() { }
	
	/**
	 * @test
	 */
	public function getEndTimeReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setEndTimeForDateTimeSetsEndTime() { }
	
	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLocationForStringSetsLocation() { 
		$this->fixture->setLocation('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLocation()
		);
	}
	
	/**
	 * @test
	 */
	public function getLocationAddressReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLocationAddressForStringSetsLocationAddress() { 
		$this->fixture->setLocationAddress('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLocationAddress()
		);
	}
	
	/**
	 * @test
	 */
	public function getInhouseReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getInhouse()
		);
	}

	/**
	 * @test
	 */
	public function setInhouseForBooleanSetsInhouse() { 
		$this->fixture->setInhouse(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getInhouse()
		);
	}
	
	/**
	 * @test
	 */
	public function getAdditionalInfoReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAdditionalInfoForStringSetsAdditionalInfo() { 
		$this->fixture->setAdditionalInfo('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAdditionalInfo()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImagesForStringSetsImages() { 
		$this->fixture->setImages('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImages()
		);
	}
	
	/**
	 * @test
	 */
	public function getTeaserImageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTeaserImageForStringSetsTeaserImage() { 
		$this->fixture->setTeaserImage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTeaserImage()
		);
	}
	
	/**
	 * @test
	 */
	public function getLinksReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLinksForStringSetsLinks() { 
		$this->fixture->setLinks('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLinks()
		);
	}
	
	/**
	 * @test
	 */
	public function getTotalSeatsReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getTotalSeats()
		);
	}

	/**
	 * @test
	 */
	public function setTotalSeatsForIntegerSetsTotalSeats() { 
		$this->fixture->setTotalSeats(12);

		$this->assertSame(
			12,
			$this->fixture->getTotalSeats()
		);
	}
	
	/**
	 * @test
	 */
	public function getReservationDeadlineReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setReservationDeadlineForDateTimeSetsReservationDeadline() { }
	
	/**
	 * @test
	 */
	public function getCategoriesReturnsInitialValueForObjectStorageContainingTx_AjadoEvents_Domain_Model_Category() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function setCategoriesForObjectStorageContainingTx_AjadoEvents_Domain_Model_CategorySetsCategories() { 
		$category = new Tx_AjadoEvents_Domain_Model_Category();
		$objectStorageHoldingExactlyOneCategories = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCategories->attach($category);
		$this->fixture->setCategories($objectStorageHoldingExactlyOneCategories);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCategories,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategories() {
		$category = new Tx_AjadoEvents_Domain_Model_Category();
		$objectStorageHoldingExactlyOneCategory = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->addCategory($category);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategories() {
		$category = new Tx_AjadoEvents_Domain_Model_Category();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($category);
		$localObjectStorage->detach($category);
		$this->fixture->addCategory($category);
		$this->fixture->removeCategory($category);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function getReservationsReturnsInitialValueForObjectStorageContainingTx_AjadoEvents_Domain_Model_Reservation() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getReservations()
		);
	}

	/**
	 * @test
	 */
	public function setReservationsForObjectStorageContainingTx_AjadoEvents_Domain_Model_ReservationSetsReservations() { 
		$reservation = new Tx_AjadoEvents_Domain_Model_Reservation();
		$objectStorageHoldingExactlyOneReservations = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneReservations->attach($reservation);
		$this->fixture->setReservations($objectStorageHoldingExactlyOneReservations);

		$this->assertSame(
			$objectStorageHoldingExactlyOneReservations,
			$this->fixture->getReservations()
		);
	}
	
	/**
	 * @test
	 */
	public function addReservationToObjectStorageHoldingReservations() {
		$reservation = new Tx_AjadoEvents_Domain_Model_Reservation();
		$objectStorageHoldingExactlyOneReservation = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneReservation->attach($reservation);
		$this->fixture->addReservation($reservation);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneReservation,
			$this->fixture->getReservations()
		);
	}

	/**
	 * @test
	 */
	public function removeReservationFromObjectStorageHoldingReservations() {
		$reservation = new Tx_AjadoEvents_Domain_Model_Reservation();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($reservation);
		$localObjectStorage->detach($reservation);
		$this->fixture->addReservation($reservation);
		$this->fixture->removeReservation($reservation);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getReservations()
		);
	}
	
}
?>