<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ajadoevents_domain_model_event'] = array(
	'ctrl' => $TCA['tx_ajadoevents_domain_model_event']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, subtitle, start_date, end_date, start_time, end_time, location, location_address, inhouse, additional_info, categories, description, images, teaser_image, links, total_seats, reservation_starttime, reservation_deadline, reservations',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, subtitle, start_date, end_date, start_time, end_time, location, location_address, inhouse, additional_info, categories, description, images, teaser_image, links, total_seats, reservation_starttime, reservation_deadline, reservations,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_ajadoevents_domain_model_event',
				'foreign_table_where' => 'AND tx_ajadoevents_domain_model_event.pid=###CURRENT_PID### AND tx_ajadoevents_domain_model_event.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' =>array(
				'type' =>'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
			'type' => 'input',
			'size' => 30,
			'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'subtitle' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.subtitle',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'start_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.start_date',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'end_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.end_date',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'start_time' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.start_time',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'end_time' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.end_time',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'location' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.location',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'location_address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.location_address',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'inhouse' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.inhouse',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'additional_info' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.additional_info',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'newsletter_text' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.newsletter_text',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'images' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.images',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_ajadoevents',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
				'disallowed' => '',
			),
		),
		'teaser_image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.teaser_image',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_ajadoevents',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
				'disallowed' => '',
			),
		),
		'links' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.links',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'total_seats' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.total_seats',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'reservation_starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.reservation_starttime',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'reservation_deadline' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.reservation_deadline',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'categories' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.categories',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ajadoevents_domain_model_category',
				'MM' => 'tx_ajadoevents_event_category_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table'=>'tx_ajadoevents_domain_model_category',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'reservations' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.reservations',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ajadoevents_domain_model_reservation',
				'foreign_field' => 'event',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
$TCA['tx_ajadoevents_domain_model_event']['types']['1']['showitem'] = 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, subtitle,--palette--;LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.start;2,--palette--;LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_event.end;3, location, location_address, inhouse, additional_info, categories, description;;;richtext[cbold|italic|underline|left|center|right|chMode]:rte_transform[mode=ts_css], newsletter_text;;;richtext[cbold|italic|underline|left|center|right|chMode]:rte_transform[mode=ts_css], images, teaser_image, links;;;richtext[cbold|italic|underline|left|center|right|chMode]:rte_transform[mode=ts_css], total_seats, reservation_starttime, reservation_deadline, reservations,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime';


$TCA['tx_ajadoevents_domain_model_event']['palettes'] = Array (
		'2' => Array('showitem' => 'start_date,start_time','canNotCollapse' => 1),
		'3' => Array('showitem' => 'end_date,end_time','canNotCollapse' => 1),
);

$TCA['tx_ajadoevents_domain_model_event']['columns']['start_date']['config']['eval'] = 'date,required';
$TCA['tx_ajadoevents_domain_model_event']['columns']['end_date']['config']['eval'] = 'date';
$TCA['tx_ajadoevents_domain_model_event']['columns']['start_time']['config']['eval'] = 'time';
$TCA['tx_ajadoevents_domain_model_event']['columns']['end_time']['config']['eval'] = 'time';

$TCA['tx_ajadoevents_domain_model_event']['columns']['images']['config']['minitems'] = 0;
$TCA['tx_ajadoevents_domain_model_event']['columns']['images']['config']['maxitems'] = 5;

//$TCA['tx_ajadoevents_domain_model_event']['columns']['reservation_deadline']['config']['eval'] = 'date';
?>
