<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use App\Util\SecurityUtil;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\ByteString;
use Doctrine\Bundle\FixturesBundle\Fixture;

/**
 * Class UserFixtures
 *
 * UserFixtures loads sample users data into the database
 *
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    private SecurityUtil $securityUtil;

    public function __construct(SecurityUtil $securityUtil)
    {
        $this->securityUtil = $securityUtil;
    }

    /**
     * Load user fixtures into the database
     *
     * @param ObjectManager $manager The entity manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        // main test user entity
        $testUser = new User();
        $testUser->setUsername('test')
            ->setPassword($this->securityUtil->generateHash('test'))
            ->setRole('Owner')
            ->setIpAddress('127.0.0.1')
            ->setToken('zHKrsWUjWZGJfi2dkpAEKrkkEpW2LHn2')
            ->setRegistedTime(new DateTime('2023-03-22 12:00:00'))
            ->setLastLoginTime(null)
            ->setProfilePic('non-pic')
            ->setVisitorId(1);

        // persist test user object
        $manager->persist($testUser);

        // generate testing users
        for ($i = 2; $i < 5; $i++) {
            $user = new User();

            // generate a random username
            $username = 'user_' . $i . '_' . uniqid();

            // set user properties
            $user->setUsername($username)
                ->setPassword($this->securityUtil->generateHash('testtest'))
                ->setRole('User')
                ->setIpAddress('127.0.0.1')
                ->setToken(ByteString::fromRandom(32)->toString())
                ->setRegistedTime(new DateTime('23-06-14 13:55:41'))
                ->setLastLoginTime(null)
                ->setProfilePic('profile_pic')
                ->setVisitorId($i);

            // persist user entity
            $manager->persist($user);
        }

        // flush all user objects to the database
        $manager->flush();
    }
}
