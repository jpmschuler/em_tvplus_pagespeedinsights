<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['templavoilaplus']['BackendLayout']['renderHeaderFunctionHook']['em_tvplus_pagespeedinsights']
        = \Extrameile\EmTvplusPagespeedinsights\RenderHook::class . '->renderHeaderFunctionHook';
}
