<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class frontControllerTest extends WebTestCase
{
    public function testVetd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/vetD');
    }

    public function testVd2()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/vD2');
    }

}
