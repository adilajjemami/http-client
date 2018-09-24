<?php
/**
 * User: devel
 * Date: 24/09/18
 */
namespace AdilAJJEMAMI;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

/**
 * Class Request
 * @package AdilAJJEMAMI
 */
class Request implements RequestInterface
{
    /**
     * @var \GuzzleHttp\Psr7\Request
     */
    private $guzzleRequest;

    /**
     * Request constructor.
     * @param string $method
     * @param string $uri
     */
    public function __construct(string $method, string $uri)
    {
        $this->guzzleRequest = new GuzzleRequest($method, \GuzzleHttp\Psr7\uri_for($uri));
    }

    /**
     * @return string
     */
    public function getRequestTarget()
    {
        return $this->guzzleRequest
                    ->getRequestTarget();
    }

    /**
     * @param mixed $requestTarget
     * @return RequestInterface
     */
    public function withRequestTarget($requestTarget)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                        ->withRequestTarget($requestTarget);

        return clone $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->guzzleRequest
                    ->getMethod();
    }

    /**
     * @param string $method
     * @return RequestInterface
     */
    public function withMethod($method)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                        ->withMethod($method);

        return clone $this;
    }

    /**
     * @return UriInterface
     */
    public function getUri()
    {
        return $this->guzzleRequest
                    ->getUri();
    }

    /**
     * @param UriInterface $uri
     * @param bool         $preserveHost
     * @return RequestInterface
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                        ->withUri($uri, $preserveHost);

        return clone $this;
    }

    /**
     * @return string
     */
    public function getProtocolVersion()
    {
        return $this->guzzleRequest
                    ->getProtocolVersion();
    }

    /**
     * @param string $version
     * @return MessageInterface
     */
    public function withProtocolVersion($version)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                    ->withProtocolVersion($version);

        return clone $this;
    }

    /**
     * @return \string[][]
     */
    public function getHeaders()
    {
        return $this->guzzleRequest
                    ->getHeaders();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasHeader($name)
    {
        return $this->guzzleRequest
                    ->hasHeader($name);
    }

    /**
     * @param string $name
     * @return string[]
     */
    public function getHeader($name)
    {
        return $this->guzzleRequest
                    ->getHeader($name);
    }

    /**
     * @param string $name
     * @return string
     */
    public function getHeaderLine($name)
    {
        return $this->guzzleRequest
                    ->getHeaderLine($name);
    }

    /**
     * @param string          $name
     * @param string|string[] $value
     * @return MessageInterface
     */
    public function withHeader($name, $value)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                        ->withHeader($name, $value);

        return clone $this;
    }

    /**
     * @param string          $name
     * @param string|string[] $value
     * @return MessageInterface
     */
    public function withAddedHeader($name, $value)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                        ->withAddedHeader($name, $value);

        return clone $this;
    }

    /**
     * @param string $name
     * @return MessageInterface
     */
    public function withoutHeader($name)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                        ->withoutHeader($name);

        return clone $this;
    }

    /**
     * @return StreamInterface
     */
    public function getBody()
    {
        return $this->guzzleRequest
                    ->getBody();
    }

    /**
     * @param StreamInterface $body
     * @return MessageInterface
     */
    public function withBody(StreamInterface $body)
    {
        $this->guzzleRequest = $this->guzzleRequest
                                        ->withBody($body);

        return clone $this;
    }

    /**
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getGuzzleRequest(): \GuzzleHttp\Psr7\Request
    {
        return $this->guzzleRequest;
    }

    /**
     * @param \GuzzleHttp\Psr7\Request $guzzleRequest
     * @return RequestInterface
     */
    public function setGuzzleRequest(\GuzzleHttp\Psr7\Request $guzzleRequest): RequestInterface
    {
        $this->guzzleRequest = $guzzleRequest;

        return clone $this;
    }
}
