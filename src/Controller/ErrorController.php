<?php

namespace App\Controller;

use App\Util\SiteUtil;
use App\Manager\ErrorManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ErrorController
 * 
 * Error controller is a handler for visitors redirect.
 * Main controller that shows error pages by error code.
 * 
 * @package App\Controller
 */
class ErrorController extends AbstractController
{
    private SiteUtil $siteUtil;
    private ErrorManager $errorManager;

    public function __construct(SiteUtil $siteUtil, ErrorManager $errorManager) 
    {
        $this->siteUtil = $siteUtil;
        $this->errorManager = $errorManager;
    }

    /**
     * Handles errors based on the provided error code.
     *
     * @param Request $request The HTTP request.
     * @return Response The error response.
     */
    #[Route('/error', methods: ['GET'], name: 'error_by_code')]
    public function errorHandle(Request $request): Response
    {
        $code = $this->siteUtil->getQueryString('code', $request);

        // block handeling (maintenance, banned use only from app logic)
        if ($code == 'maintenance' or $code == 'banned' or $code == null) {
            $code = 'unknown';
        }

        return new Response($this->errorManager->handleErrorView($code));
    }

    /**
     * Handles 404 error page.
     *
     * @return Response The error response.
     */
    #[Route('/error/notfound', methods: ['GET'], name: 'error_404')]
    public function errorHandle404(): Response
    {
        return new Response($this->errorManager->handleErrorView(404));
    }
}
