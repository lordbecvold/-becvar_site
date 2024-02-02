<?php

namespace App\Middleware;

use App\Util\SiteUtil;
use App\Manager\ErrorManager;

/**
 * Class SecurityCheckMiddleware
 *
 * This middleware checks if the connection is secure.
 */
class SecurityCheckMiddleware
{
    /** * @var SiteUtil */
    private SiteUtil $siteUtil;

    /** * @var ErrorManager */
    private ErrorManager $errorManager;

    /**
     * SecurityCheckMiddleware constructor.
     *
     * @param SiteUtil     $siteUtil
     * @param ErrorManager $errorManager
     */
    public function __construct(SiteUtil $siteUtil, ErrorManager $errorManager)
    {
        $this->siteUtil = $siteUtil;
        $this->errorManager = $errorManager;
    }

    /**
     * Check if the connection is secure.
     */
    public function onKernelRequest(): void
    {
        // check if app not localhost running
        if ($this->siteUtil->isSSLOnly()) {
            if (!$this->siteUtil->isSsl()) {
                $this->errorManager->handleError('SSL error: connection not running on ssl protocol', 500);
            }
        }
    }
}
