<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ajadoevents_domain_model_reservation'] = array(
	'ctrl' => $TCA['tx_ajadoevents_domain_model_reservation']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, lastname, firstname, email, participants',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, lastname, firstname, email, participants,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_ajadoevents_domain_model_reservation',
				'foreign_table_where' => 'AND tx_ajadoevents_domain_model_reservation.pid=###CURRENT_PID### AND tx_ajadoevents_domain_model_reservation.sys_language_uid IN (-1,0)',
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
		'crdate' => Array (
            'exclude' => 1,
            'label' => 'Creation date',
            'config' => Array (
                'type' => 'none',
                'format' => 'datetime',
                'eval' => 'datetime',
				'readOnly' => 1,
        
            )
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
		'lastname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_reservation.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'firstname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_reservation.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_reservation.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'participants' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_reservation.participants',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'reminder_sent' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoevents_domain_model_reservation.reminder_sent',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'event' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
$TCA['tx_ajadoevents_domain_model_reservation']['columns']['event'] = array(
			'label' => 'LLL:EXT:ajado_events/Resources/Private/Language/locallang_db.xml:tx_ajadoEvents_domain_model_event',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ajadoevents_domain_model_event',
				'minitems' => 0,
				'maxitems' => 1,
			),
);

$TCA['tx_ajadoevents_domain_model_reservation']['types'][1] = array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, lastname, firstname, email, participants,reminder_sent,event,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime');
?>