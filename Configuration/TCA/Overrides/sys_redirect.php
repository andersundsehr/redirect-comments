<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

// Add "comment" to redirects
ExtensionManagementUtility::addTCAcolumns(
    'sys_redirect',
    [
        'comment' => [
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:redirect_comments/Resources/Private/Language/locallang_db.xlf:sys_redirect.comment',
            'config' => [
                'type' => 'text',
                'renderType' => 'text',
            ],
        ],

    ]
);

// Make field visible:
ExtensionManagementUtility::addToAllTCAtypes(
    'sys_redirect',
    'comment',
    '1',
    'after:is_regexp'
);
