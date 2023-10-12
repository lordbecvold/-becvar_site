<?php

namespace App\Controller;

use App\Manager\LogManager;
use App\Manager\AuthManager;
use App\Manager\ErrorManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/*
    Antilog controller provides function for set antilog cookie
*/

class AntilogController extends AbstractController
{
    private $logManager;
    private $authManager;
    private $errorManager;

    public function __construct(
        LogManager $logManager,
        AuthManager $authManager,
        ErrorManager $errorManager, 
    ) {
        $this->logManager = $logManager;
        $this->authManager = $authManager;
        $this->errorManager = $errorManager;
    }

    #[Route('/antilog/5369362536', name: 'antilog')]
    public function index(): Response
    {
        // check if user logged in
        if ($this->authManager->isUserLogedin()) {

            $username = $this->authManager->getUsername();

            if (isset($_COOKIE['anti-log-cookie'])) {
                $this->logManager->unsetAntiLogCookie();
                $this->logManager->log('anti-log', 'user: '.$username.' set antilog');
            } else {
                $this->logManager->setAntiLogCookie();
                $this->logManager->log('anti-log', 'user: '.$username.' unset antilog');
            }
        } else {
            $this->errorManager->handleError('error to set anti-log-cookie for non authentificated users!', 401);
        }
        return $this->redirectToRoute('admin_dashboard');
    }
}