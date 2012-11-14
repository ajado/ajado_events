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
 * Controller for the Event object
 */
 class Tx_AjadoEvents_Controller_EventController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * eventRepository
	 *
	 * @var Tx_AjadoEvents_Domain_Repository_EventRepository
	 */
	protected $eventRepository;


	/**
	 * @var Tx_AjadoEvents_Domain_Repository_ReservationRepository
	 */
	protected $reservationRepository;

	/**
	 * calendarService
	 *
	 * @var Tx_AjadoEvents_Service_CalendarService
	 */
	protected $calendarService;

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
	 * @param Tx_AjadoEvents_Domain_Repository_ReservationRepository $reservationRepository
 	 * @return void
	 */
	public function injectReservationRepository(Tx_AjadoEvents_Domain_Repository_ReservationRepository $reservationRepository) {
		$this->reservationRepository = $reservationRepository;
	}

	/**
	 * injectCalendarService
	 *
	 * @param Tx_AjadoEvents_Service_CalendarService $calendarService
	 * @return void
	 */
	public function injectCalendarService(Tx_AjadoEvents_Service_CalendarService $calendarService) {
		$this->calendarService = $calendarService;
	}

	protected function initializeListTeaserView() {
		$this->response->addAdditionalHeaderData('<!-- testxy -->');		
	}

	/**
	 * Displays all Events
	 *
	 * @param string $year
	 * @param string $month
	 * @param string $day
	 * @param boolean $inhouse
	 * @param boolean $endless
	 * @return void
	 */
	public function listAction($year = null, $month = null, $day = null, $inhouse = false, $endless = false) {
		$year = (intval($year)>0) ? $year : date('Y');
		$month = (intval($month)>0) ? $month : date('m');

		if (intval($day)>0 && checkdate($month, $day, $year)) {
			//show day view
		
			$startDateFrom = mktime(0, 0, 0, $month, $day, $year);
			if($endless) {
				$startDateTo = null;
			}
			else {
				$startDateTo = mktime(0, 0, 0, $month, $day+1, $year);
			}
			
			$events = $this->eventRepository->findByDate($startDateFrom, $startDateTo, null, null, null, $inhouse);
			$stillActive = $this->eventRepository->findByDate(null, $startDateFrom, $startDateFrom, null, null, $inhouse);
			$title = strftime('%e. %B', $startDateFrom);
		}
		else {
			// show month view
		
			$startDateFrom = mktime(0, 0, 0, $month, 1, $year);
			if($endless) {
				$startDateTo = null;
			}
			else {
				$startDateTo = mktime(0, 0, 0, $month+1, 1, $year);
			}
			
			$events = $this->eventRepository->findByDate($startDateFrom, $startDateTo, null, null, null, $inhouse);
			$stillActive = $this->eventRepository->findByDate(null, $startDateFrom, $startDateFrom, null, null, $inhouse);
			$title = strftime('%B', $startDateFrom);
		}

		if(!$endless) {
			$GLOBALS['TSFE']->page['title'] = $title;
		}
		
		$this->view->assign('events', $events);
		$this->view->assign('stillActive', $stillActive);
		$this->view->assign('title', $title);
	}

	/**
	 * Displays all inhouse Events
	 *
	 * @param string $year
	 * @param string $month
	 * @param string $day
	 * @return void
	 */
	public function listInhouseAction($year = null, $month = null, $day = null) {
		$this->listAction($year, $month, $day, true, true);
	}

	/**
	 * Displays Teaser Events
	 *
	 * @return void
	 */
	public function listTeaserAction() {
		$GLOBALS['TSFE']->additionalHeaderData['tx_ajadoEvents_inc_listTeaserJs'] = '<script type="text/javascript" src="typo3conf/ext/ajado_events/Resources/Public/js/listevent.js"></script>';
		$categoryRepository = t3lib_div::makeInstance('Tx_AjadoEvents_Domain_Repository_CategoryRepository');
		$category = $categoryRepository->findByUid($this->settings['teaserCategoryId']);
		$events = $this->eventRepository->findFutureEventsByCategory($category);
		
		$this->view->assign('events', $events);
	}

	/**
	 * Displays Calendar
	 *
	 * @return void
	 */
	public function calendarAction() {
		$calendar = $this->renderCalendar('list');
		$this->view->assign('calendar', $calendar);
	}

	/**
	 * Displays Calendar of Inhouse Events
	 *
	 * @return void
	 */
	public function calendarInhouseAction() {
		$calendar = $this->renderCalendar('listInhouse');
		$this->view->assign('calendar', $calendar);
	}

	/**
	 * Makes a list-styled teaser
	 *
	 * @return void
	 */
	public function showEventTeaserAction() {
		$eventUids = t3lib_div::intExplode(',', $this->settings['event']);
		$events = array();
		
		foreach($eventUids as $eventUid) {
			$events[] = $this->eventRepository->findByUid($eventUid);
		}
		$this->view->assign('events', $events);
	}
	
	/**
	 * Makes a manual list-styled teaser
	 *
	 * @return void
	 */
	public function manualShowEventTeaserAction() {
		$event = new Tx_AjadoEvents_Domain_Model_Event();
		
		$date = new DateTime(date("Y/m/d", $this->settings['date']));
		// kann verwendet werden wenn php >= 5.3.0 - statt der zuweisung oben:
		//$date->setTimestamp($this->settings['date']);
		$this->view->assign('event_startdate', $date);
		$this->view->assign('event_title', $this->settings['title']);
		$this->view->assign('event_subtitle', $this->settings['subtitle']);
		$this->view->assign('event_location', $this->settings['location']);
		$this->view->assign('event_image', $this->settings['image']);
		$this->view->assign('event_link', $this->settings['link']);
		$this->view->assign('event_text', $this->settings['text']);
	}
	
	/**
	 * Displays all future Events where registration possible
	 *
	 * @return void
	 */
	public function registrationListAction() {
		$events = $this->eventRepository->findFutureEventsWithReservation();
		$this->view->assign('events', $events);
	}

	/**
	 * renderCalendar
	 *
	 * @return void
	 * @param  $action
	 */
	public function renderCalendar($action = 'list') {
	  $cssCalendar	= str_replace(PATH_site,'',t3lib_div::getFileAbsFileName($this->settings['calendar']['cssFile']));
    $GLOBALS['TSFE']->additionalHeaderData['tx_ajadoEvents_inc'] = '<link href="' . $cssCalendar . '" rel="stylesheet" type="text/css" />';
		
		$actionString = 'tx_ajadoevents_event_' . strtolower($action);
		// set date
		$year = (intval($_GET[$actionString]['year'])>0) ? $_GET[$actionString]['year'] : date('Y');
		$month = (intval($_GET[$actionString]['month'])>0) ? $_GET[$actionString]['month'] : date('m');	
		
		if(isset($_GET['tx_ajadoevents_event_singleview']['event'])) {
			$eventUid = intval($_GET['tx_ajadoevents_event_singleview']['event']);
			
			$event = $this->eventRepository->findByUid($eventUid);
			
			if(!is_null($event)) {
				$year = intval($event->getStartDate()->format('Y'));
				$month = intval($event->getStartDate()->format('m'));
			}
		}

		// get events of current month
		$startDateFrom = mktime(0, 0, 0, $month, 1, $year);
		$startDateTo = mktime(0, 0, 0, $month+1, 1, $year);
		
		if($action=='listInhouse') {
			$inhouse = true;
		}
		$events = $this->eventRepository->findByDate($startDateFrom, $startDateTo, null, null, null, $inhouse);

		// create array with dates and links
		$days = array();

		foreach ($events as $e) {
			$day = $e->getStartDate()->format('d');
			$link = $this->generateLink($action, array('year' => $year, 'month' => $month, 'day' => intval($day)), null, null, null, $this->settings['calendar']['linkUid']); 
			$days[intval($day)] = array($link, 'event', $day);
		}

		// set month link
		$month_href = $this->generateLink($action, array('year' => $year, 'month' => $month), null, null, null, $this->settings['calendar']['linkUid']);
		
		// previous & next links
		$prevYear = ($month==1?$year-1:$year);
		$prevMonth = ($month==1?12:$month-1);
		$prevLink = $this->generateLink($action, array('year' => $prevYear, 'month' => $prevMonth), null, null, null, $this->settings['calendar']['linkUid']);
		
		$nextYear =($month==12?$year+1:$year);
		$nextMonth = ($month==12?1:$month+1);
		$nextLink = $this->generateLink($action, array('year' => $nextYear, 'month' => $nextMonth), null, null, null, $this->settings['calendar']['linkUid']);

		$pn = array('&laquo;' => $prevLink,'&raquo;' => $nextLink);

		return $this->calendarService->generate_calendar($year, $month, $days, $day_name_length = 2, $month_href, $first_day = 1, $pn, $conf = NULL);
	}

	/**
	 * generateLink
	 *
	 * @param  string $action
	 * @param  array $arguments
	 * @param  string $controller
	 * @param  $extensionName
	 * @param  $pluginName
	 * @param  $pageUid
	 * @param  $pageType
	 * @param  $noCache
	 * @param  $noCacheHash
	 * @param  $section
	 * @param  $format
	 * @param  $linkAccessRestrictedPages
	 * @param  $additionalParams
	 * @param  $absolute
	 * @param  $addQueryString
	 * @param  $argumentsToBeExcludedFromQueryString
	 * @return string $uri	 
	 */
	public function generateLink($action = null, array $arguments = array(), $controller = null, $extensionName = null, $pluginName = null, $pageUid = null, $pageType = 0, $noCache = false, $noCacheHash = false, $section = "", $format = "", $linkAccessRestrictedPages = false, $additionalParams = array(), $absolute = false, $addQueryString = false, $argumentsToBeExcludedFromQueryString = array()) {
		$uriBuilder = $this->controllerContext->getUriBuilder();
		$uri = $uriBuilder
			->reset()
			->setTargetPageUid($pageUid)
			->setTargetPageType($pageType)
			->setNoCache($noCache)
			->setUseCacheHash(!$noCacheHash)
			->setSection($section)
			->setFormat($format)
			->setLinkAccessRestrictedPages($linkAccessRestrictedPages)
			->setArguments($additionalParams)
			->setCreateAbsoluteUri($absolute)
			->setAddQueryString($addQueryString)
			->setArgumentsToBeExcludedFromQueryString($argumentsToBeExcludedFromQueryString)
			->uriFor($action, $arguments, $controller, $extensionName, $pluginName);

		return $uri;
	}

	/**
	 * Displays a single Event
	 *
	 * @param Tx_AjadoEvents_Domain_Model_Event $event the Event to display
	 * 		 
	 * @return string The rendered view
	 * @dontvalidate $newReservation
	 */
	public function showAction(Tx_AjadoEvents_Domain_Model_Event $event, Tx_AjadoEvents_Domain_Model_Reservation $newReservation = null) {
		$this->view->assign('event', $event);
		$this->view->assign('newReservation', $newReservation);

		if($newReservation == null) {
			$this->view->assign('hideReservation', true);
			
			//$GLOBALS['TSFE']->inlineJS['showActionJs'] = '
			$this->view->assign('showActionJs', '
				$(document).ready(function() {
				    $("#tx-ajado-events-openregistration-' . $event->getUid() . '").click(function() {
						$("#tx-ajado-events-openregistration-' . $event->getUid() . '").hide();
						$("#tx-ajado-events-registration-' . $event->getUid() . '").fadeIn("slow");
						var offsettop = parseInt($("body").css("height"));
						window.scrollTo(0,offsettop);
				    });
				});
				$("#tx-ajado-events-registration input").keypress(function(e){
					if(e.which == 13){
	       				$("#tx-ajado-events-registration form").submit();
	       			}
	      		});
			');
			
		}
		else {
			$this->view->assign('hideReservation', false);
			$this->view->assign('showActionJs', '');
		}
	}

}
?>
