<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JoueurControllerTest extends WebTestCase
{
    public function testMesparties()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mesparties');
    }

}
