<?php

declare(strict_types=1);

namespace AUS\RedirectComments\EventListener;

use AUS\RedirectComments\Xclass\Redirects\Repository\RedirectRepository;
use TYPO3\CMS\Redirects\Event\ModifyRedirectManagementControllerViewDataEvent;

final class ModifyRedirectManagementControllerViewDataEventListener
{
    public function __invoke(ModifyRedirectManagementControllerViewDataEvent $event): void
    {
        // add filter parameter to the view so it can be added to the form
        $event->getView()->assign('comment', RedirectRepository::getComment($event->getRequest()));
    }
}
