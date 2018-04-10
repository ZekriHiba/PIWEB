<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientControllerTest extends WebTestCase
{
    public function testRead()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/read');
    }

    public function testSearsh()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/searsh');
    }

    public function testFilter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/filter');
    }

    public function testContact()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');
    }

}
