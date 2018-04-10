<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppointmentControllerTest extends WebTestCase
{
    public function testCreateap()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createAP');
    }

    public function testReadap()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/readAP');
    }

    public function testUpdateap()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateAP');
    }

    public function testDeleteap()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteAP');
    }

    public function testSearchap()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/SearchAP');
    }

}
