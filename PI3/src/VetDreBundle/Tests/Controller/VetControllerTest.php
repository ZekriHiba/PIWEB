<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VetControllerTest extends WebTestCase
{
    public function testAjouterannonce()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouterAnnonce');
    }

}
