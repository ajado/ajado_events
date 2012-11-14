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
 * Category
 */
 class Tx_AjadoEvents_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The name of the category
	 *
	 * @var string $name
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * Determines if the category should be visible in frontend
	 *
	 * @var boolean $visible
	 */
	protected $visible;

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the visible
	 *
	 * @return boolean $visible
	 */
	public function getVisible() {
		return $this->visible;
	}

	/**
	 * Sets the visible
	 *
	 * @param boolean $visible
	 * @return void
	 */
	public function setVisible($visible) {
		$this->visible = $visible;
	}

	/**
	 * Returns the boolean state of visible
	 *
	 * @return boolean
	 */
	public function isVisible() {
		return $this->getVisible();
	}

}
?>