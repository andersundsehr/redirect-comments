<?php

declare(strict_types=1);

use AUS\RedirectComments\Xclass\Redirects\Repository\RedirectRepository;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Redirects\Repository\RedirectRepository::class]['className'] = RedirectRepository::class;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['default']['EXT:redirects/Resources/Private/Language/locallang_db.xlf'][] =
    'EXT:redirect_comments/Resources/Private/Language/Overrides/redirects/locallang_db.xlf';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['de']['EXT:redirects/Resources/Private/Language/de.locallang_db.xlf'][] =
    'EXT:redirect_comments/Resources/Private/Language/Overrides/redirects/de.locallang_db.xlf';
