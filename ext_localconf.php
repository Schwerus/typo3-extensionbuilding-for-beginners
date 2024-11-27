<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Extkey',
        'Extfrontendkey',
        [
            \Vendor\Extkey\Controller\ModelOneController::class => 'list, new, show, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \Vendor\Extkey\Controller\ModelOneController::class => 'create, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    extfrontendkey {
                        iconIdentifier = extkey-plugin-extfrontendkey
                        title = LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_extfrontendkey.name
                        description = LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:tx_extkey_extfrontendkey.description
                        tt_content_defValues {
                            CType = list
                            list_type = extkey_extfrontendkey
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
