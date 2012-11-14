<?php

class Tx_AjadoEvents_Service_CalendarService implements t3lib_Singleton {

	/***********************************************************************
	 *
	 * method: generate_calendar
	 *
	 * PHP Calendar (version 2.3), written by Keith Devens
	 * http://keithdevens.com/software/php_calendar
	 * see example at http://keithdevens.com/weblog
	 * License: http://keithdevens.com/software/license
	 *
	 *
	 ***********************************************************************/
	function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array(), $conf = NULL) {

		$this->conf = $conf;

		// Set timezone manually
		if ( $this->conf['calendar.']['timeZone'] )
		    date_default_timezone_set( $this->conf['calendar.']['timeZone'] );
		
		$first_of_month = mktime( 0, 0, 0, $month, 1, $year );
		
		# remember that mktime will automatically correct if invalid dates are entered
		# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
		# this provides a built in "rounding" feature to generate_calendar()
		
		$day_names = array(); #generate all the day names according to the current locale
		
		#January 4, 1970 was a Sunday
		for( $n = 0, $t = ( 3 + $first_day ) * 86400; $n < 7 ; $n++ , $t += 86400 ) {
		    #%A means full textual day name
		    $day_names[$n] = ucfirst( strftime( '%A', $t) );
		}
		
		list($month, $year, $month_name, $weekday) = explode(',',strftime('%m,%Y,%B,%w',$first_of_month));
		$weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
		
		$title = $this->convertSpecialCharacters( ucfirst( $month_name ) ) . '&nbsp;' . $year;
		
		#note that some locales don't capitalize month and day names
		$this->listHeader = $this->convertSpecialCharacters( ucfirst( strftime('%B %Y', $first_of_month ) ) );
		
		#Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
		@list( $p, $pl ) = each( $pn );
		@list($n, $nl) = each( $pn ); #previous and next links, if applicable
		
		$previousImage = $previousImageDisabled = $p;
		$nextImage = $n;
		
		// Render navigation links as images
		if ($this->conf['calendar.']['renderNavigationAsImages']) {
			$arrowLeft = str_replace( PATH_site, '', t3lib_div::getFileAbsFileName( $this->conf['file.']['arrowLeft'] ) );
			$arrowLeftDisabled = str_replace( PATH_site, '', t3lib_div::getFileAbsFileName( $this->conf['file.']['arrowLeftDisabled'] ) );
			$arrowRight = str_replace( PATH_site, '', t3lib_div::getFileAbsFileName( $this->conf['file.']['arrowRight'] ) );
			
			$previousImage = $this->cObj->cImage( $arrowLeft, $this->conf['calendar.']['imageArrows.']);
			$previousImageDisabled = $this->cObj->cImage( $arrowLeftDisabled, $this->conf['calendar.']['imageArrows.']);
			$nextImage = $this->cObj->cImage( $arrowRight, $this->conf['calendar.']['imageArrows.']);
		}
		
		$currentTime = time();
		$calendarStartMonth = strtotime( $this->calendarYear . '-' . $this->calendarMonth . '-01' );
		$calendarEndMonth = mktime( 23, 59, 59, intval( $this->calendarMonth ), date( 't', $calendarStartMonth ), intval( $this->calendarYear ) );
		
		if ( $p && ( ( $this->conf['calendar.']['hideIfInPast'] == 1
								&& $currentTime <= $calendarStartMonth )
								|| $this->conf['calendar.']['hideIfInPast'] == 0 ) ) {
		    $p = ( $pl ? '<a href="' . $pl . '" title="calPrev">' . $previousImage . '</a>' : $previousImage );
		} else { 
			$p = $previousImageDisabled; 
		}
		
		if ( $n ) $n = ( $nl ? '<a href="' . $nl . '" title="calNext">' . $nextImage . '</a>' : $nextImage);
		
		// Thanks to Patrick Gaumond and his team for the fix on month display.
		$calendar = '<table class="calendar-table">' . "\n" .
		        "\t\t\t"	    . '<tr>' . "\n" .
		        "\t\t\t\t"	    . '<td class="columPrevious">' . $p . '</td>' . "\n" .
		        "\t\t\t\t"	    . '<td colspan="5" class="columYear">' . "\n" .
		        "\t\t\t\t\t"    . ( ( $month_href ) ? '<a href="' . $this->convertSpecialCharacters( $month_href ) . '" title="'. $title . '">' . $this->listHeader . '</a>' : $this->listHeader ) . "\n" .
		        "\t\t\t\t"	    . '</td>' . "\n" .
		        "\t\t\t\t"	    . '<td class="columNext">' . $n . '</td>' . "\n" .
		        "\t\t\t"	    . '</tr>' . "\n" .
		        "\t\t\t"	    . '<tr>' . "\n";
		
		foreach( $day_names as $d ) {
			$convertDay = ( $day_name_length <= 4 ? substr($d, 0, $day_name_length) : $d );
			$calendar .= "\t\t\t\t" . '<th>'.$this->convertSpecialCharacters( $convertDay ) . '</th>' . "\n";
		}
		
		$calendar .= "\t\t\t" . '</tr>' . "\n";
		$calendar .= "\t\t\t" . '<tr>'	. "\n";
		
		if( $weekday > 0 ) {
			$calendar .= "\t\t\t\t" . '<td colspan="'.$weekday.'">&nbsp;</td>' . "\n"; #initial 'empty' days
		}
		
		for ($day=1, $days_in_month=date('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++) {
			
			if ($weekday==7) {
			    $weekday   = 0; #start a new week
			    $calendar .= "\t\t\t" . '</tr>' . "\n";
			    $calendar .= "\t\t\t" . '<tr>' . "\n";
			}
			
			// Changed render of link for compliance with context menu
			// RICC begin -> exclude past events from calendar if set in TS
			$today = date("Ymd");
			$myDay = strlen($day)==1?'0'.$day:$day;
			$renderDay = $year . $month . $myDay;
			

			// gregory goidin
			// no need of hidding events with start date < present day and end date > present day

			if (isset($days[$day]) and is_array($days[$day])) {
				
				@list($link, $classes, $content) = $days[$day];
				if(is_null($content))  $content  = (strlen($day)==1?'0'.$day:$day);
				$calendar .= "\t\t\t\t" . '<td>' .
				        ( $link ? '<a href="'.$link.'" class="'.$this->convertSpecialCharacters($classes).'">' . $content . '</a>' : $content) . '</td>' . "\n";
			} else {
				$newDay = (strlen($day)==1?'0'.$day:$day);
				if ($this->thisDay==$newDay && $this->thisYear==$year && $this->thisMonth==$month) {
				  $calendar .= "\t\t\t\t" . '<td><div class="linked_today_nolink" >'.$newDay.'</div></td>' . "\n";
				} else {
				  $calendar .= "\t\t\t\t" . '<td>' . $newDay . '</td>' . "\n";
				}
			}
		}
		
		if ($weekday!=7) $calendar .= "\t\t\t\t" . '<td colspan="'.(7-$weekday).'">&nbsp;</td>' . "\n"; #remaining "empty" days
		
		if ( $this->monthLinkDisplay==1) {
			
			$calendar .= "\t\t\t"	    . '</tr>' . "\n";
			$calendar .= "\t\t\t"	    . '<tr>' . "\n";
			$calendar .= "\t\t\t\t"	    . '<td colspan="7" class="bottomMonthLink">' ."\n";
			$calendar .= "\t\t\t\t\t"       . '<a href="' . $this->convertSpecialCharacters( $month_href ) . '" title="' .  "calYear"  . ' - ' . $title.'">' .  "calYear"  . '</a>' . "\n";
			$calendar .= "\t\t\t\t"	    . '</td>' . "\n";
			$calendar .= "\t\t\t"	    . '</tr>' . "\n";
		
		} else {
			$calendar .= "\t\t\t"	    . '</tr>' . "\n";
		}
		
		return $calendar . "\t\t" . '</table>' . "\n";
}

	function convertSpecialCharacters($string) {
		switch ($this->parserFunction) {
			case 'htmlspecialchars':
				return htmlspecialchars($string, ENT_COMPAT, 'UTF-8');
			case 'skip':
				return $string;
			default:
				return htmlentities($string, ENT_QUOTES, 'UTF-8');
		}
	}

}

?>