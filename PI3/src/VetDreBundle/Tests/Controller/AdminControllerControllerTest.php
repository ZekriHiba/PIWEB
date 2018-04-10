<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerControllerTest extends WebTestCase
{
    public function testAddannonce()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addAnnonce');
    }

    public function testUpddateannonce()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/upddateAnnonce');
    }

    public function testDeleteannoce()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteAnnoce');
    }

    public function testShowannonce()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAnnonce');
    }

}
