#laratools


If you are using phpmig, you need to create a *phpmig.php* into your **project** root folder or **PROJECT_ROOT/config folder**

 ##phpmig
 Example:

```<php>
use Phpmig\ConfigDTO;

$configAsterisk = new ConfigDTO("mysql", "127.0.0.1", "dbname", "username", "password");

$container = new Phpmig\Container(__DIR__ . "/../migrations");
$container->setDatabaseConnection("db", $configAsterisk);
$container->setEloquentCapsule("capsule", $configAsterisk);

$container->setAdapter($container["db"]);

return $container;

```

##Config

You can define your environment in a .env file in PROJECT_ROOT

Example **.env** file:
```
ENVIRONMENT=local
```

If environment is defined and we use during the object creation

**Config file format**
```
return [
    "driver" => "mysql"
];
```

**Read config files, without the .env file**
```
$config = new Config\Config(new \Symfony\Component\Finder\Finder(), __DIR__ . "/../config/development/");
echo $config->get("test.driver");
```

**Read config files, with the .env file**
```
$config = new Config\Config(new \Symfony\Component\Finder\Finder(), __DIR__ . "/../");
echo $config->get("test.driver");
```
