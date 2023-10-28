<?php

namespace App\Controller\Admin;

use App\Manager\AuthManager;
use App\Util\VisitorInfoUtil;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/*
    Chat controller provides admin chat box
*/

class ChatController extends AbstractController
{
    private AuthManager $authManager;
    private VisitorInfoUtil $visitorInfoUtil;

    public function __construct(
        AuthManager $authManager,
        VisitorInfoUtil $visitorInfoUtil
    ) {
        $this->authManager = $authManager;
        $this->visitorInfoUtil = $visitorInfoUtil;
    }
    
    #[Route('/admin/chat', name: 'admin_chat')]
    public function chat(): Response
    {
        // check if user logged in
        if ($this->authManager->isUserLogedin()) {

            return $this->render('admin/chat.html.twig', [
                // component properties
                'is_mobile' => $this->visitorInfoUtil->isMobile(),
                'is_dashboard' => false,

                // user data
                'user_name' => $this->authManager->getUsername(),
                'user_role' => $this->authManager->getUserRole(),
                'user_pic' => $this->authManager->getUserProfilePic(),

                // chat data
                'online_users' => $this->authManager->getUsersWhereStatus('online')
            ]);
        } else {
            return $this->redirectToRoute('auth_login');
        }
    }
}