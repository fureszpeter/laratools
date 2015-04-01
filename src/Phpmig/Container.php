<?php

namespace Phpmig;

use PDO;
use Pimple;
use Illuminate\Database\Capsule\Manager as Capsule;


class Container extends Pimple
{
    const MIGRATIONS_TABLE_NAME = "migrations";

    /**
     * @param array $path
     */
    public function __construct($path)
    {
        parent::__construct([]);
        $this['phpmig.migrations_path'] = $path;
    }

    /**
     * @param PDO $connection
     */
    public function setAdapter(PDO $connection){
        $this['phpmig.adapter'] = $this->share(function () use ($connection){
            return new Adapter\PDO\Sql($connection, self::MIGRATIONS_TABLE_NAME);
        });
    }

    /**
     * @param $dbKey
     * @param ConfigDTO $config
     *
     * @return PDO
     */
    public function setDatabaseConnection($dbKey, ConfigDTO $config)
    {
        $this[$dbKey] = $this->share(function () use ($config) {
            /** @var PDO $dbh */
            $dbh = ConnectionManager::getPDO($config);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbh;
        });

        return $this[$dbKey];
    }

    /**
     * @param $keyName
     * @param ConfigDTO $config
     *
     * @return \Illuminate\Database\Capsule\Manager
     */
    public function setEloquentCapsule($keyName, ConfigDTO $config)
    {
        $this[$keyName] = $this->share(function () use ($config) {
            /* Bootstrap Eloquent */
            $capsule = new Capsule;
            $capsule->addConnection($config->toArray());
            $capsule->setAsGlobal();

            /* Bootstrap end */
            return $capsule;
        });

        return $this[$keyName];
    }
}
