<?php

namespace VetDreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientVetControllerTest extends WebTestCase
{
    public function testVetdetails()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/vetDetails');
    }

    public function testV1()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/v1');
    }

    public function testV2()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/v2');
    }

    public function testV3()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/v3');
    }

}
