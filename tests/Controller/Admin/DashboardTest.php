<?php

namespace App\Tests\Controller\Admin;

use App\Manager\AuthManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/*
    Admin dashboard component test
*/

class DashboardTest extends WebTestCase
{
    // instance for making requests
    private $client;

    protected function setUp(): void
    {
        parent::setUp();

        // create client instance
        $this->client = static::createClient();
    }

    private function createAuthManagerMock(): object
    {
        $authManagerMock = $this->createMock(AuthManager::class);

        // init fake testing value
        $authManagerMock->method('isUserLogedin')->willReturn(true);
        $authManagerMock->method('getUsername')->willReturn('phpunit-user');
        $authManagerMock->method('getUserRole')->willReturn('Admin');
        $authManagerMock->method('getUserProfilePic')->willReturn('image-code');

        return $authManagerMock;
    }

    public function testAdminDashboard(): void
    {
        // use fake auth manager instance
        $this->client->getContainer()->set(AuthManager::class, $this->createAuthManagerMock());

        // make post request to admin dashboard controller
        $this->client->request('GET', '/admin/dashboard');

        // check response
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 

        // check response content
        $this->assertSelectorTextContains('title', 'Admin | dashboard');
        $this->assertSelectorExists('main[class="admin-page"]');
        $this->assertSelectorExists('img[alt="profile_picture"]');
        $this->assertSelectorExists('span[class="role-line"]');
        $this->assertSelectorTextContains('h3', 'phpunit-user');
        $this->assertSelectorTextContains('#wrarning-box', 'Warnings');
        $this->assertSelectorTextContains('body', 'Service status');
        $this->assertSelectorTextContains('body', 'System info');
        $this->assertSelectorTextContains('body', 'Visitors info');
        $this->assertSelectorTextContains('body', 'SERVER: Online');
        $this->assertSelectorTextContains('.card-title', 'Logs');
        $this->assertSelectorTextContains('body', 'Messages');
        $this->assertSelectorTextContains('body', 'Todos');
        $this->assertSelectorTextContains('body', 'Images');
        $this->assertSelectorTextContains('body', 'Pastes');
        $this->assertSelectorTextContains('body', 'Visitors');
        $this->assertSelectorTextContains('body', 'Server uptime');
        $this->assertSelectorTextContains('body', 'CPU usage [CORE/AVG]');
        $this->assertSelectorTextContains('body', 'Memory usage [RAM]');
        $this->assertSelectorTextContains('body', 'Disk space');
        $this->assertSelectorExists('a[class="logout-link"]');
        $this->assertSelectorExists('span[class="menu-text"]');
        $this->assertSelectorExists('div[class="sidebar"]');
    }

    public function testAdminEmergencyShutdownConfirmation(): void
    {
        // use fake auth manager instance
        $this->client->getContainer()->set(AuthManager::class, $this->createAuthManagerMock());

        // make post request to admin dashboard controller
        $this->client->request('GET', '/admin/dashboard/emergency/shutdown');

        // check response
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 

        // check response content
        $this->assertSelectorTextContains('title', 'Admin | confirmation');
        $this->assertSelectorExists('main[class="admin-page"]');
        $this->assertSelectorTextContains('.form-title', 'Confirmation');
        $this->assertSelectorTextContains('.form-sub-title', 'please repeat the verification code');
        $this->assertSelectorExists('input[name="confirmCode"]');
        $this->assertSelectorExists('input[name="shutdownCode"]');
        $this->assertSelectorExists('input[value="Shutdown"]');
    }
}
