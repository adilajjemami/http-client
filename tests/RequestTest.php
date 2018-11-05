<?php
/**
 * User: Adil AJJEMAMI<adilajjemami@gmail.com>
 * Date: 24/09/18
 */

namespace AdilAJJEMAMI\Tests;

use PHPUnit\Framework\TestCase;
use AdilAJJEMAMI\Request;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Psr\Http\Message\UriInterface;

/**
 * Class RequestTest
 * @package AdilAJJEMAMI\Tests
 */
class RequestTest extends TestCase
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var \GuzzleHttp\Psr7\Request
     */
    private $guzzleRequest;

    /**
     * Set up
     */
    public function setUp(): void
    {
        $this->guzzleRequest = $this->createMock(GuzzleRequest::class);
        $this->request = new Request('GET', 'http://localhost');
        $this->request = $this->request
                                ->setGuzzleRequest($this->guzzleRequest);
    }

    /**
     * Test constructor
     */
    public function testConstructor():void
    {
        $this->assertInstanceOf(Request::class, $this->request);
    }

    /**
     * test getRequestTarget
     */
    public function testGetRequestTarget(): void
    {
        $this->guzzleRequest
                ->expects($this->once())
                ->method('getRequestTarget')
                ->willReturn('http://localhost');

        $this->assertSame(
            'http://localhost',
            $this->request
                    ->getRequestTarget()
        );
    }

    /**
     * Test withRequestTarget
     */
    public function testWithRequestTarget(): void
    {
        $this->assertInstanceOf(
            Request::class,
            $this->request
                    ->withRequestTarget('http://localhost/http-client')
        );
    }

    /**
     * test getMethod
     */
    public function testGetMethod(): void
    {
        $this->guzzleRequest
            ->expects($this->once())
            ->method('getMethod')
            ->willReturn('GET');

        $this->assertSame(
            'GET',
            $this->request
                ->getMethod()
        );
    }

    /**
     * Test withMethod
     */
    public function testWithMethod(): void
    {
        $this->assertInstanceOf(
            Request::class,
            $this->request
                ->withMethod('GET')
        );
    }

    /**
     * test getUri
     */
    public function testGetUri(): void
    {
        $this->guzzleRequest
            ->expects($this->once())
            ->method('getUri')
            ->willReturn(
                $this->createMock(UriInterface::class)
            );

        $this->assertInstanceOf(
            UriInterface::class,
            $this->request
                ->getUri()
        );
    }

    /**
     * Test withUri
     */
    public function testWithUri(): void
    {
        $this->assertInstanceOf(
            Request::class,
            $this->request
                ->withUri(
                    $this->createMock(UriInterface::class)
                )
        );
    }

    /**
     * test getProtocolVersion
     */
    public function testGetProtocolVersion(): void
    {
        $this->guzzleRequest
            ->expects($this->once())
            ->method('getProtocolVersion')
            ->willReturn('1.1');

        $this->assertSame(
            '1.1',
            $this->request
                ->getProtocolVersion()
        );
    }

    /**
     * Test withProtocolVersion
     */
    public function testWithProtocolVersion(): void
    {
        $this->assertInstanceOf(
            Request::class,
            $this->request
                ->withProtocolVersion('1.1')
        );
    }

    /**
     * test getHeaders
     */
    public function testGetHeaders(): void
    {
        $this->guzzleRequest
            ->expects($this->once())
            ->method('getHeaders')
            ->willReturn(
                [ 'fakeHeader' => 'fakeValue']
            );

        $this->assertSame(
            [ 'fakeHeader' => 'fakeValue'],
            $this->request
                ->getHeaders()
        );
    }

    /**
     * test hasHeader
     */
    public function testHasHeader(): void
    {
        $this->guzzleRequest
            ->expects($this->once())
            ->method('hasHeader')
            ->with('Content-Type')
            ->willReturn(true);

        $this->assertSame(
            true,
            $this->request
                ->hasHeader('Content-Type')
        );
    }

    /**
     * test getHeader
     */
    public function testGetHeader(): void
    {
        $this->guzzleRequest
            ->expects($this->once())
            ->method('getHeader')
            ->with('Content-Type')
            ->willReturn('application/json');

        $this->assertSame(
            'application/json',
            $this->request
                ->getHeader('Content-Type')
        );
    }

    /**
     * test getHeaderLine
     */
    public function testGetHeaderLine(): void
    {
        $this->guzzleRequest
            ->expects($this->once())
            ->method('getHeaderLine')
            ->with('Content-Type')
            ->willReturn('Content-Type: application/json');

        $this->assertSame(
            'Content-Type: application/json',
            $this->request
                ->getHeaderLine('Content-Type')
        );
    }
}
