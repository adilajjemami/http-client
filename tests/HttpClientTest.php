<?php
/**
 * User: Adil AJJEMAMI<adilajjemami@gmail.com>
 * Date: 22/09/18
 */

namespace AdilAJJEMAMI\Tests;

use AdilAJJEMAMI\HttpClient;
use PHPUnit\Framework\TestCase;

/**
 * Class HttpClientTest
 * @package AdilAJJEMAMI\Tests
 */
class HttpClientTest extends TestCase
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @return void
     */
    public function setUp():void
    {
        $this->httpClient = new HttpClient();
    }

    /**
     * Test construct
     *
     * @return void
     */
    public function testConstruct():void
    {
        self::assertInstanceOf(HttpClient::class, $this->httpClient);
    }
}
