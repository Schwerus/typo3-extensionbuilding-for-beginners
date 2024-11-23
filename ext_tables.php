<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extkey_domain_model_modelone', 'EXT:extkey/Resources/Private/Language/locallang_csh_tx_extkey_domain_model_modelone.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extkey_domain_model_modelone');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extkey_domain_model_modeltwo', 'EXT:extkey/Resources/Private/Language/locallang_csh_tx_extkey_domain_model_modeltwo.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extkey_domain_model_modeltwo');
})();
