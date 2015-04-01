<?php
namespace Phpmig;

class ConfigDTO
{
    const CONFIG_DB_DRIVER = "driver";
    const CONFIG_DB_HOST = "host";
    const CONFIG_DB_NAME = "database";
    const CONFIG_DB_USER = "username";
    const CONFIG_DB_PASS = "password";
    const CONFIG_CHARSET = "charset";
    const CONFIG_COLLATION = "collation";
    const CONFIG_PREFIX = "prefix";

    /** @var  string */
    private $driver;
    /** @var  string */
    private $host;
    /** @var  string */
    private $dbName;
    /** @var  string */
    private $username;
    /** @var  string */
    private $password;
    /** @var  string */
    private $charset;
    /** @var  string */
    private $collation;
    /** @var  string */
    private $prefix;

    /**
     * @param $driver
     * @param $host
     * @param $dbName
     * @param $username
     * @param $password
     * @param string $charset
     * @param string $collation
     * @param string $prefix
     */
    function __construct($driver, $host, $dbName, $username, $password, $charset = "utf8", $collation = "utf8_unicode_ci", $prefix = "")
    {
        $this->setDriver($driver);
        $this->setHost($host);
        $this->setDbName($dbName);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setCharset($charset);
        $this->setCollation($collation);
        $this->setPrefix($prefix);
    }

    /**
     * @param string $driver
     */
    public function setDriver($driver)
    {
        if (!in_array($driver, \PDO::getAvailableDrivers())) {
            throw new \InvalidArgumentException("DB Driver is invalid: " . $driver . " Available drivers are [" . implode(",", \PDO::getAvailableDrivers()) . "]");
        }

        $this->driver = $driver;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        if ($host == "") {
            throw new \InvalidArgumentException("DB Host is invalid: " . $host);
        }
        $this->host = $host;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        if ($dbName == "") {
            throw new \InvalidArgumentException("DB name is invalid: " . $dbName);
        }
        $this->dbName = $dbName;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        if ($username == "") {
            throw new \InvalidArgumentException("DB username is invalid: " . $username);
        }

        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        if ($password == "") {
            throw new \InvalidArgumentException("DB password is invalid: " . $password);
        }

        $this->password = $password;
    }

    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * @param string $collation
     */
    public function setCollation($collation)
    {
        $this->collation = $collation;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @return string
     */
    public function getCollation()
    {
        return $this->collation;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    public function toArray()
    {
        return [
            self::CONFIG_DB_DRIVER => $this->getDriver(),
            self::CONFIG_DB_HOST   => $this->getHost(),
            self::CONFIG_DB_NAME   => $this->getDbName(),
            self::CONFIG_DB_USER   => $this->getUsername(),
            self::CONFIG_DB_PASS   => $this->getPassword(),
            self::CONFIG_CHARSET   => $this->getCharset(),
            self::CONFIG_COLLATION => $this->getCollation(),
            self::CONFIG_PREFIX    => $this->getPrefix(),
        ];
    }
}
