<?php
/**
 * User: Adil AJJEMAMI<adilajjemami@gmail.com>
 * Date: 22/09/18
 */

namespace AdilAJJEMAMI;

use Psr\Http\Message\UriInterface;

/**
 * Class Uri
 * @package AdilAJJEMAMI
 */
class Uri implements UriInterface
{
    /**
     * @var array
     */
    private static $PORTS = [
        'http'  => 80,
        'https' => 443,
        'ftp' => 21,
        'gopher' => 70,
        'nntp' => 119,
        'news' => 119,
        'telnet' => 23,
        'tn3270' => 23,
        'imap' => 143,
        'pop' => 110,
        'ldap' => 389,
    ];

    /**
     * @var string
     */
    private $scheme;

    /**
     * @var string
     */
    private $userInfo;

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $fragment;

    /**
     * Uri constructor.
     * @param string $scheme
     * @param string $host
     */
    public function __construct(string $scheme, string $host)
    {
        $this->scheme = $scheme;
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @return mixed
     */
    public function getAuthority()
    {
        return $this->scheme.'://'.$this->host;
    }

    /**
     * @return mixed
     */
    public function getUserInfo()
    {
        return $this->userInfo;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return mixed
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * @param string $scheme
     * @return mixed
     */
    public function withScheme($scheme)
    {
        $this->scheme = $scheme;
        $this->port = self::$PORTS[$scheme];

        return clone $this;
    }

    /**
     * @param string           $user
     * @param null|string|null $password
     * @return mixed
     */
    public function withUserInfo($user, $password = null)
    {
        $this->userInfo = $user;
        if ($password != '') {
            $this->userInfo .= ':'.$password;
        }

        return clone $this;
    }

    /**
     * @param string $host
     * @return mixed
     */
    public function withHost($host)
    {
        $this->host = $host;

        return clone $this;
    }

    /**
     * @param int|null $port
     * @return mixed
     */
    public function withPort($port)
    {
        $this->port = $port;

        return clone $this;
    }

    /**
     * @param string $path
     * @return mixed
     */
    public function withPath($path)
    {
        $this->path = $path;

        return clone $this;
    }

    /**
     * @param string $query
     * @return mixed
     */
    public function withQuery($query)
    {
        $this->query = $query;

        return clone $this;
    }

    /**
     * @param string $fragment
     * @return mixed
     */
    public function withFragment($fragment)
    {
        $this->fragment = $fragment;

        return clone $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        $url = $this->scheme.'://'.$this->host;
        $url .= is_null($this->port) ? '' : ':'.$this->port;
        $url .= is_null($this->path) ? '' : $this->path;
        $url .= is_null($this->query) ? '' : '?'.$this->query;

        return $url;
    }
}
