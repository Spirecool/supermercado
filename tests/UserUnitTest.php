<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase


{
    
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setFirstname('prénom')
        ->setLastname('nom')
        ->setPassword('password')
        ->setRoles(['ROLE_ADMIN'])
        ->setEmail('prenom@nom.com');

        $this->assertSame('prénom', $user->getFirstname());
        $this->assertSame('nom', $user->getLastname());
        $this->assertSame('password', $user->getPassword());
        $this->assertSame(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
        $this->assertSame('prenom@nom.com', $user->getEmail());
    }

    public function testIsEmpty(): void
    {
        $user = new User();

            $this->assertEmpty($user->getFirstname());
            $this->assertEmpty($user->getLastname());
            $this->assertEmpty($user->getEmail());
            $this->assertEmpty($user->getPassword());
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setFirstname('prénom')
        ->setLastname('nom')
        ->setPassword('password')
        ->setRoles(['ROLE_ADMIN'])
        ->setEmail('prenom@nom.com');

        $this->assertNotSame('false', $user->getFirstname());
        $this->assertNotSame('false', $user->getLastname());
        $this->assertNotSame('password', $user->getPassword());
        $this->assertNotSame(['ROLE_FALSE'], $user->getRoles());
        $this->assertNotSame('false@false.com', $user->getEmail());
    }
}