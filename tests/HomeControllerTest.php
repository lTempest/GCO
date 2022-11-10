<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(expectedCode: Response::HTTP_OK);

    }
}
