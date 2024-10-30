<?php

namespace App\Tests\Repository;

use App\Entity\Log;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class LogRepositoryTest
 *
 * Test for doctrine entity repository class
 *
 * @package App\Tests\Repository
 */
class LogRepositoryTest extends KernelTestCase
{
    private ?EntityManager $entityManager;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = self::$kernel->getContainer()->get('doctrine')->getManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null;
    }

    /**
     * Test get logs by status
     */
    public function testGetLogsByStatus(): void
    {
        /** @var \App\Repository\LogRepository $logRepository */
        $logRepository = $this->entityManager->getRepository(Log::class);

        $status = 'unreaded';
        $logs = $logRepository->getLogsByStatus($status);

        $this->assertIsArray($logs, 'Logs should be returned as an array');
        $this->assertNotEmpty($logs, 'Logs should not be empty');
        $this->assertInstanceOf(Log::class, $logs[0], 'Each item should be an instance of Log');
        $this->assertEquals($status, $logs[0]->getStatus(), 'The log status should match the filter');
    }

    /**
     * Test get logs by IP address
     */
    public function testGetLogsByIpAddress(): void
    {
        /** @var \App\Repository\LogRepository $logRepository */
        $logRepository = $this->entityManager->getRepository(Log::class);

        $ipAddress = '45.131.195.176';
        $logs = $logRepository->getLogsByIpAddress($ipAddress);

        // assert result
        $this->assertIsArray($logs, 'Logs should be returned as an array');
        $this->assertNotEmpty($logs, 'Logs should not be empty');
        $this->assertInstanceOf(Log::class, $logs[0], 'Each item should be an instance of Log');
        $this->assertEquals($ipAddress, $logs[0]->getIpAddress(), 'The log IP address should match the filter');
    }
}