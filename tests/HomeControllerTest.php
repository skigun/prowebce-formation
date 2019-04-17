<?php

namespace App\Tests;

use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Symfony\Bridge\Doctrine\DataCollector\DoctrineDataCollector;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    use RefreshDatabaseTrait;

    public function testSomething()
    {
        $client = static::createClient();

        $client->enableProfiler();
        $crawler = $client->request('GET', '/fr/articles');

        /** @var DoctrineDataCollector $dataCollector */
        $dataCollector = $client->getProfile()->getCollector('db');
        $this->assertCount(1, $dataCollector->getQueries());

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Les derniers articles - test', $crawler->filter('h1')->text());

        $this->assertContains("symfony c&#039;est cool", $client->getResponse()->getContent());
        $this->assertContains("symfony c'est cool", $crawler->filter('html')->text());
    }
}
