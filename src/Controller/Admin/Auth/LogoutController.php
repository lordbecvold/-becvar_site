<?php

namespace App\Controller\Admin\Auth;

use App\Manager\AuthManager;
use App\Manager\ErrorManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class LogoutController
 *
 * Logout controller provides user logout functionality
 * Note: Login uses its own authenticator (not Symfony security)
 *
 * @package App\Controller\Admin\Auth
 */
class LogoutController extends AbstractController
{
    private AuthManager $authManager;
    private ErrorManager $errorManager;

    public function __construct(AuthManager $authManager, ErrorManager $errorManager)
    {
        $this->authManager = $authManager;
        $this->errorManager = $errorManager;
    }

    /**
     * Handle user logout
     *
     * @throws \Exception with logout process (session or cookie is still active)
     *
     * @return Response Redirect to login page
     */
    #[Route('/logout', methods: ['GET'], name: 'auth_logout')]
    public function logout(): Response
    {
        // check if user logged in
        if ($this->authManager->isUserLogedin()) {
            $this->authManager->logout();
        }

        // verify if user logout successful
        if (!$this->authManager->isUserLogedin()) {
            // redirect to login page
            return $this->redirectToRoute('auth_login');
        }

        // handle logout error
        $this->errorManager->handleError(
            msg: 'logout error: unknown error in logout process',
            code: Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
