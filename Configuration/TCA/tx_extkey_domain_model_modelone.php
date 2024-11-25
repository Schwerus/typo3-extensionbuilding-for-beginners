<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_domain_model_modelone',
        'label' => 'model_one_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'model_one_name,model_one_content',
        'iconfile' => 'EXT:extkey/Resources/Public/Icons/tx_extkey_domain_model_modelone.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'model_one_name, model_one_content, relation_one, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, '],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_extkey_domain_model_modelone',
                'foreign_table_where' => 'AND {#tx_extkey_domain_model_modelone}.{#pid}=###CURRENT_PID### AND {#tx_extkey_domain_model_modelone}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],

        'model_one_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_domain_model_modelone.model_one_name',
            'description' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_domain_model_modelone.model_one_name.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'model_one_content' => [
            'exclude' => true,
            'label' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_domain_model_modelone.model_one_content',
            'description' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_domain_model_modelone.model_one_content.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'relation_one' => [
            'exclude' => true,
            'label' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_domain_model_modelone.relation_one',
            'description' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_domain_model_modelone.relation_one.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_extkey_domain_model_modeltwo',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],

        ],
    
    ],
];
