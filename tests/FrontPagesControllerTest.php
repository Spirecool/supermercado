<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FrontPagesControllerTest extends WebTestCase
{
    public function testHomepage(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        // Code du statut : on s'assure que la réponse HTTP de la page d'accueil à un code de statut 200 (ok)
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        
        // Réussite de la réponse : on vérifie que la réponse est réussie (200 OK)
        $this->assertResponseIsSuccessful();
    }
    public function testCatalogue(): void
    {
        $client = static::createClient();
        $client->request('GET', '/catalogue');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertResponseIsSuccessful();
    }
}

