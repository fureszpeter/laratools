#laratools


If you are using phpmig, you need to create a *phpmig.php* into your *project* root folder or *PROJECT_ROOT/config folder*
 
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