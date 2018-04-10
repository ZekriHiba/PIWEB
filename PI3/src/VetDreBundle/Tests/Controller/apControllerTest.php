<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class apControllerTest extends WebTestCase
{
    public function testAjoutp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajoutp');
    }

    public function testSupp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supp');
    }

    public function testModifp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifp');
    }

    public function testRechp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rechp');
    }

    public function testLirep()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lirep');
    }

}
