<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoilà! Plus for PageSpeed Insight extension',
    'description' => 'Integration of PageSpeed Insight extension into TemplaVoilà! Plus page layout module.',
    'category' => 'misc',
    'version' => '1.0.0',
    'state' => 'stable',
    'uploadfolder' => 0,
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Opitz',
    'author_email' => 'opitz@extrameile-gehen.de',
    'author_company' => 'Extrameile GmbH',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-7.4.99',
            'typo3' => '9.5.0-9.5.99',
            'templavoilaplus' => '7.1.3-7.99.99',
            'page_speed_insights' => '1.1.0-1.1.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Extrameile\\EmTvplusPagespeedinsights\\' => 'Classes/',
        ],
    ],
];
