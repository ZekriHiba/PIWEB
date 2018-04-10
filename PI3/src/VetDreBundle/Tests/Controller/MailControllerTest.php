<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MailControllerTest extends WebTestCase
{
    public function testEnvoi()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/envoi');
    }

    public function testSucces()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/succes');
    }

    public function testRescue()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rescue');
    }

}
