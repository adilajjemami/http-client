<?php
/**
 * User: Adil AJJEMAMI<adilajjemami@gmail.com>
 * Date: 23/09/18
 */

namespace AdilAJJEMAMI\Tests;

use AdilAJJEMAMI\Uri;
use PHPUnit\Framework\TestCase;

/**
 * Class UriTest
 * @package AdilAJJEMAMI\Tests
 */
class UriTest extends TestCase
{
    /**
     * @var Uri
     */
    private $uri;

    /**
     * Set up.
     */
    public function setUp():void
    {
        $this->uri = new Uri('http', 'localhost');
    }

    /**
     * Test constructor
     */
    public function testConstruct():void
    {
        self::assertInstanceOf(Uri::class, $this->uri);
    }

    /**
     * Test withScheme
     */
    public function testWithScheme():void
    {
        $uri = $this->uri
            ->withScheme('http');

        self::assertInstanceOf(Uri::class, $uri);
        self::assertSame(
            'http',
            $uri->getScheme()
        );
        self::assertSame(
            80,
            $uri->getPort()
        );
    }

    /**
     * Test withUserInfo
     */
    public function testWithUserInfo():void
    {
        $uri = $this->uri
            ->withUserInfo('user1', 'password1');

        self::assertInstanceOf(Uri::class, $uri);
        self::assertSame(
            'user1:password1',
            $uri->getUserInfo()
        );
    }

    /**
     * Test withHost
     */
    public function testWithHost():void
    {
        $uri = $this->uri
            ->withHost('localhost');

        self::assertInstanceOf(Uri::class, $uri);
        self::assertSame(
            'localhost',
            $uri->getHost()
        );
    }

    /**
     * Test withPort
     */
    public function testWithPort():void
    {
        $uri = $this->uri
            ->withPort(8080);

        self::assertInstanceOf(Uri::class, $uri);
        self::assertSame(
            8080,
            $uri->getPort()
        );
    }

    /**
     * Test withPath
     */
    public function testWithPath():void
    {
        $uri = $this->uri
            ->withPath('/path');

        self::assertInstanceOf(Uri::class, $uri);
        self::assertSame(
            '/path',
            $uri->getPath()
        );
    }

    /**
     * Test withQuery
     */
    public function testWithQuery():void
    {
        $uri = $this->uri
            ->withQuery('?param1=1&param2=2');

        self::assertInstanceOf(Uri::class, $uri);
        self::assertSame(
            '?param1=1&param2=2',
            $uri->getQuery()
        );
    }

    /**
     * Test withFragment
     */
    public function testWithFragment():void
    {
        $uri = $this->uri
            ->withFragment('#fragment');

        self::assertInstanceOf(Uri::class, $uri);
        self::assertSame(
            '#fragment',
            $uri->getFragment()
        );
    }

    /**
     * Test getAuthority
     */
    public function testGetAuthority():void
    {
        self::assertSame(
            'http://localhost',
            $this->uri->getAuthority()
        );
    }

    /**
     * Test getScheme
     */
    public function testToString():void
    {
        self::assertSame(
            'http://localhost',
            $this->uri->__toString()
        );
    }
}
