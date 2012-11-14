<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event_teaser',
	array(
		'Event' => 'listTeaser',
	),
	array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event_list',
	array(
		'Event' => 'list',
	),
	array()
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

Tx_Extbase_Utility_Extension::configurePlugin(
  $_EXTKEY,
  'Event_listInhouse',
  array(
    'Event' => 'listInhouse'

  ),
  array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
  $_EXTKEY,
  'Event_calendar',
  array(
		'Event' => 'calendar',
  ),
  array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event_calendarInhouse',
	array(
		'Event' => 'calendarInhouse',
	),
	array()
);


Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event_registrationList',
	array(
		'Event' => 'registrationList'
	),
	array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event_singleView',
	array(
		'Event' => 'show',
    	'Reservation' => 'show, create'
	),
	array(
		'Event' => 'show',
    	'Reservation' => 'show, create'
    )
);


Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event_showEventTeaser',
	array(
		'Event' => 'showEventTeaser'
	),
	array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event_manualShowEvent',
	array(
		'Event' => 'manualShowEventTeaser'
	),
	array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'exporttest',
	array(
		'Export' => 'test'
	),
	array(
		'Export' => 'test'
	)
);


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_ajadoevents_sendReminder'] = array(
    'extension'        => $_EXTKEY,
    'title'            => 'Erinnerungen an Events per Email senden',
    'description'      => 'liest die aktuellen Reservierungen aus und versendet Email-Erinnerungen an Events'
);

?>
