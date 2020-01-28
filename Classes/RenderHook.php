<?php

declare(strict_types=1);

namespace Extrameile\EmTvplusPagespeedinsights;

use Ppi\TemplaVoilaPlus\Controller\BackendLayoutController;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class to add PageSpeed Insights to the templavoila page module
 * Uses the renderHeaderFunctionHook hook
 */
class RenderHook
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function renderHeaderFunctionHook(array $params, BackendLayoutController $parentObject): string
    {
        /** @var \TYPO3\CMS\Backend\Controller\PageLayoutController $pageLayoutController */
        $GLOBALS['SOBE'] = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Controller\PageLayoutController::class);
        $GLOBALS['SOBE']->id = $parentObject->id;
        $GLOBALS['SOBE']->current_sys_language = $parentObject->currentLanguageUid;

        /** @var \Haassie\PageSpeedInsights\Hooks\DrawHeaderHook $pageSpeedInsights */
        $pageSpeedInsights = GeneralUtility::makeInstance(\Haassie\PageSpeedInsights\Hooks\DrawHeaderHook::class);
        $output = $pageSpeedInsights->render();

        $returnUrlFalse = BackendUtility::getModuleUrl(
            'web_layout',
            ['id' => (int)$parentObject->id]
        );

        $returnUrlTemplaVoila = BackendUtility::getModuleUrl(
            'web_txtemplavoilaplusLayout',
            ['id' => (int)$parentObject->id]
        );

        $returnUrlFalse = \rawurlencode($returnUrlFalse);
        $returnUrlTemplaVoila = \rawurlencode($returnUrlTemplaVoila);

        $output = \str_replace($returnUrlFalse, $returnUrlTemplaVoila, $output);

        return $output;
    }
}
