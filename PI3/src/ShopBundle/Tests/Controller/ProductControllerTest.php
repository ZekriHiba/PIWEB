<?php

namespace ShopBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testAddproduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AddProduct');
    }

}
