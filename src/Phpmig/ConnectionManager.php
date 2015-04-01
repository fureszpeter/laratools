<?php
namespace Phpmig;

use PDO;

class ConnectionManager
{
    /**
     * @param array $config
     *
     * @throws \InvalidArgumentException
     * @return string
     */
    public static function build(ConfigDTO $config)
    {
        return $config->getDriver() . ":dbname=" . $config->getDbName() . ";host=" . $config->getHost() . ";";
    }

    /**
     * @param array $config
     * @throws \InvalidArgumentException
     *
     * @return PDO
     */
    public static function getPDO(ConfigDTO $config)
    {
        return new PDO(self::build($config), $config->getUsername(), $config->getPassword());
    }
}
