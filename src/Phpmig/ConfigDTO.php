<?php
namespace Phpmig;

class ConfigDTO {
    const CONFIG_DB_DRIVER = "driver";
    const CONFIG_DB_HOST = "host";
    const CONFIG_DB_NAME = "db_name";
    const CONFIG_DB_USER = "username";
    const CONFIG_DB_PASS = "password";

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

    function __construct($driver, $host, $dbName, $username, $password)
    {
        $this->setDriver($driver);
        $this->setHost($host);
        $this->setDbName($dbName);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * @param string $driver
     */
    public function setDriver($driver)
    {
        if (!in_array($driver, \PDO::getAvailableDrivers())){
            throw new \InvalidArgumentException("DB Driver is invalid: " . $driver . " Available drivers are [" . implode(",", \PDO::getAvailableDrivers()). "]");
        }

        $this->driver = $driver;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        if ($host==""){
            throw new \InvalidArgumentException("DB Host is invalid: " . $host);
        }
        $this->host = $host;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        if ($dbName==""){
            throw new \InvalidArgumentException("DB name is invalid: " . $dbName);
        }
        $this->dbName = $dbName;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        if ($username==""){
            throw new \InvalidArgumentException("DB username is invalid: " . $username);
        }

        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        if ($password==""){
            throw new \InvalidArgumentException("DB password is invalid: " . $password);
        }

        $this->password = $password;
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
}