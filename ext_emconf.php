<?php

########################################################################
# Extension Manager/Repository config file for ext "ajado_events".
#
# Auto generated 20-06-2011 19:42
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Ajado Events',
	'description' => '',
	'category' => '',
	'author' => 'Christian Kartnig',
	'author_email' => 'office@hahnepeter.de',
	'author_company' => '',
	'shy' => '',
	'dependencies' => 'cms,extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'extbase' => '',
			'fluid' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:61:{s:21:"ExtensionBuilder.json";s:4:"1788";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"3734";s:14:"ext_tables.php";s:4:"6e11";s:14:"ext_tables.sql";s:4:"d296";s:41:"Classes/Controller/CategoryController.php";s:4:"d88d";s:38:"Classes/Controller/EventController.php";s:4:"61bb";s:44:"Classes/Controller/ReservationController.php";s:4:"1077";s:33:"Classes/Domain/Model/Category.php";s:4:"0b13";s:30:"Classes/Domain/Model/Event.php";s:4:"a138";s:36:"Classes/Domain/Model/Reservation.php";s:4:"becb";s:48:"Classes/Domain/Repository/CategoryRepository.php";s:4:"5cfe";s:45:"Classes/Domain/Repository/EventRepository.php";s:4:"4b7e";s:51:"Classes/Domain/Repository/ReservationRepository.php";s:4:"3d2f";s:49:"Classes/Domain/Validator/ReservationValidator.php";s:4:"fedf";s:35:"Classes/Service/CalendarService.php";s:4:"2771";s:43:"Classes/ViewHelpers/StripTagsViewHelper.php";s:4:"4371";s:49:"Classes/ViewHelpers/Format/DateTimeViewHelper.php";s:4:"b917";s:40:"Classes/ViewHelpers/Format/StrToTime.php";s:4:"2a8e";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"f8ff";s:30:"Configuration/TCA/Category.php";s:4:"1ef0";s:27:"Configuration/TCA/Event.php";s:4:"b798";s:33:"Configuration/TCA/Reservation.php";s:4:"7891";s:38:"Configuration/TypoScript/constants.txt";s:4:"e278";s:34:"Configuration/TypoScript/setup.txt";s:4:"2927";s:40:"Resources/Private/Language/locallang.xml";s:4:"0016";s:81:"Resources/Private/Language/locallang_csh_tx_ajadoevents_domain_model_category.xml";s:4:"01ac";s:78:"Resources/Private/Language/locallang_csh_tx_ajadoevents_domain_model_event.xml";s:4:"1f59";s:84:"Resources/Private/Language/locallang_csh_tx_ajadoevents_domain_model_reservation.xml";s:4:"9a18";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"3133";s:38:"Resources/Private/Layouts/Default.html";s:4:"2d4c";s:42:"Resources/Private/Partials/FormErrors.html";s:4:"663d";s:43:"Resources/Private/Partials/_FormErrors.html";s:4:"ad28";s:51:"Resources/Private/Partials/Category/FormFields.html";s:4:"c4b4";s:51:"Resources/Private/Partials/Category/Properties.html";s:4:"d849";s:48:"Resources/Private/Partials/Event/FormFields.html";s:4:"92d7";s:48:"Resources/Private/Partials/Event/Properties.html";s:4:"13d8";s:54:"Resources/Private/Partials/Reservation/FormFields.html";s:4:"d02a";s:54:"Resources/Private/Partials/Reservation/Properties.html";s:4:"bf84";s:46:"Resources/Private/Templates/Category/Edit.html";s:4:"884c";s:46:"Resources/Private/Templates/Category/List.html";s:4:"e9b0";s:45:"Resources/Private/Templates/Category/New.html";s:4:"0215";s:46:"Resources/Private/Templates/Category/Show.html";s:4:"5a1b";s:43:"Resources/Private/Templates/Event/List.html";s:4:"5580";s:50:"Resources/Private/Templates/Event/ListInhouse.html";s:4:"bfd4";s:49:"Resources/Private/Templates/Event/ListTeaser.html";s:4:"efa8";s:43:"Resources/Private/Templates/Event/Show.html";s:4:"358b";s:47:"Resources/Private/Templates/Event/calendar.html";s:4:"ea30";s:54:"Resources/Private/Templates/Event/calendarInhouse.html";s:4:"2c44";s:49:"Resources/Private/Templates/Reservation/Edit.html";s:4:"b998";s:49:"Resources/Private/Templates/Reservation/List.html";s:4:"2fdf";s:48:"Resources/Private/Templates/Reservation/New.html";s:4:"719b";s:49:"Resources/Private/Templates/Reservation/Show.html";s:4:"62b5";s:32:"Resources/Public/cssCalendar.css";s:4:"2391";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:63:"Resources/Public/Icons/tx_ajadoevents_domain_model_category.gif";s:4:"905a";s:60:"Resources/Public/Icons/tx_ajadoevents_domain_model_event.gif";s:4:"905a";s:66:"Resources/Public/Icons/tx_ajadoevents_domain_model_reservation.gif";s:4:"905a";s:35:"Tests/Domain/Model/CategoryTest.php";s:4:"7b42";s:32:"Tests/Domain/Model/EventTest.php";s:4:"149c";s:38:"Tests/Domain/Model/ReservationTest.php";s:4:"0dd8";}',
);

?>