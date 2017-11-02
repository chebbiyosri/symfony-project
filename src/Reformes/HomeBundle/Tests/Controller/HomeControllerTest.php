<?php

namespace Reformes\HomeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testAxes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/axes');
    }

    public function testActions()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actions');
    }

    public function testDocumentation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/documentation');
    }

    public function testDidacticiels()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/didacticiels');
    }

    public function testGrandpublic()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/grandpublic');
    }

}
