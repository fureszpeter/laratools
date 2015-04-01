<?php

class ConfigDTOTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateWithValidDate()
    {
        $config = [

        ];

        $dto = new \Phpmig\ConfigDTO("mysql", "host", "dbname", "user", "password");
        $this->assertInstanceOf(\Phpmig\ConfigDTO::class, $dto);
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testInvalidConstructors($constructorArray, $expectedExceptionName, $exceptionMessage)
    {

        extract($constructorArray);

        $this->setExpectedException($expectedExceptionName, $exceptionMessage);
        new \Phpmig\ConfigDTO($driver, $host, $dbName, $username, $password);
    }

    public function invalidDataProvider()
    {
        return [
            //Bad driver
            [["driver" => "mysqlBAD", "host" => "host", "dbName" => "dbname", "username" => "username", "password" => "password"], \InvalidArgumentException::class, "Driver"],
            //Bad host
            [["driver" => "mysql", "host" => "", "dbName" => "dbname", "username" => "username", "password" => "password"], \InvalidArgumentException::class, "Host"],
            //Bad DBNAME
            [["driver" => "mysql", "host" => "host", "dbName" => "", "username" => "username", "password" => "password"], \InvalidArgumentException::class, "DB name"],
            //Username
            [["driver" => "mysql", "host" => "host", "dbName" => "dbname", "username" => "", "password" => "password"], \InvalidArgumentException::class, "username"],
            //Password
            [["driver" => "mysql", "host" => "host", "dbName" => "dbname", "username" => "username", "password" => ""], \InvalidArgumentException::class, "password"],
        ];
    }
}