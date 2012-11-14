<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Event_teaser',
	'Event Teaser'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . event_teaser;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .event_teaser. '.xml');



Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Event_list',
	'Event List'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . event_list;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .event_list. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Ajado Events');


t3lib_extMgm::addLLrefForTCAdescr('tx_ajadoevents_domain_model_event', 'EXT:ajado_events/Resources/Private/Language/locallang_csh_tx_ajadoevents_domain_model_event.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ajadoevents_domain_model_event');
$TCA['tx_ajadoevents_domain_model_event'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Event.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ajadoevents_domain_model_event.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ajadoevents_domain_model_category', 'EXT:ajado_events/Resources/Private/Language/locallang_csh_tx_ajadoevents_domain_model_category.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ajadoevents_domain_model_category');
$TCA['tx_ajadoevents_domain_model_category'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_category',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ajadoevents_domain_model_category.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ajadoevents_domain_model_reservation', 'EXT:ajado_events/Resources/Private/Language/locallang_csh_tx_ajadoevents_domain_model_reservation.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ajadoevents_domain_model_reservation');
$TCA['tx_ajadoevents_domain_model_reservation'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_reservation',
		'label' 			=> 'lastname',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Reservation.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ajadoevents_domain_model_reservation.gif'
	),
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder


Tx_Extbase_Utility_Extension::registerPlugin(
        $_EXTKEY,
        'Event_listInhouse',
        'Event List Inhouse'
);

Tx_Extbase_Utility_Extension::registerPlugin(
        $_EXTKEY,
        'Event_calendar',
        'Event Calendar'
);

Tx_Extbase_Utility_Extension::registerPlugin(
        $_EXTKEY,
        'Event_calendarInhouse',
        'Event Calendar Inhouse'
);

Tx_Extbase_Utility_Extension::registerPlugin(
        $_EXTKEY,
        'Event_registrationList',
        'Event Registration List'
);


Tx_Extbase_Utility_Extension::registerPlugin(
        $_EXTKEY,
        'Event_singleView',
        'Event Single View'
);


Tx_Extbase_Utility_Extension::registerPlugin(
        $_EXTKEY,
        'Event_showEventTeaser',
        'Show Event Teaser'
);
Tx_Extbase_Utility_Extension::registerPlugin(
        $_EXTKEY,
        'Event_manualShowEvent',
        'Show Manual Event Teaser'
);


$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . event_showeventteaser;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .event_showeventteaser. '.xml');


$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . event_manualshowevent;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .event_manualshoweventteaser. '.xml');


If (TYPO3_MODE === 'BE') {
    Tx_Extbase_Utility_Extension::registerModule(
      $_EXTKEY,                               # Extension-Key
      'web',                                  # Kategorie
      'tx_ajadoevents_m1', 		              # Modulname
      '',                                     # Position
      Array ( 'Export' => 'listEventsWithReservation,listReservationsForEvent,exportReservationsAsCsv,deleteReservationForEvent' ),         # Controller
      Array ( 'access'  => 'user,group',      # Konfiguration
              'icon'    => 'EXT:'.$_EXTKEY.'/ext_icon.gif',
              'labels'  => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml' )
    );
}
?>