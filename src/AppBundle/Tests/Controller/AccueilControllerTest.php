<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AccueilControllerTest extends WebTestCase
{
    public function testRecupuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/RecupUser');
    }

}
