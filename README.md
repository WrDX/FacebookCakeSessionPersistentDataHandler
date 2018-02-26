# FacebookCakeSessionPersistentDataHandler

[![Latest Stable Version](https://poser.pugx.org/wrdx/facebook-cake-session-persistent-data-handler/v/stable?format=flat-square)](https://packagist.org/packages/wrdx/facebook-cake-session-persistent-data-handler) [![License](https://poser.pugx.org/wrdx/facebook-cake-session-persistent-data-handler/license?format=flat-square)](https://packagist.org/packages/wrdx/facebook-cake-session-persistent-data-handler)

CakePHP 2.x session handler for Facebook php-graph-sdk. 

Let Facebook php-graph-sdk use CakeSession for session access.

```
composer require wrdx/dev-facebook-cake-session-persistent-data-handler
```

Use as following:

```
$fb = new \Facebook\Facebook([
  'app_id' => '{app-id}',
  'app_secret' => '{app-secret}',
  'default_graph_version' => '{default-graph-version}',
  'persistent_data_handler' => new \WrDX\Facebook\FacebookCakeSessionPersistentDataHandler(),
]);
```

Make sure your CakePHP installation uses the Composer autoloader. In your Config/bootstrap.php file add the following:

```
# Load Composer autoload.
require APP . 'Vendor/autoload.php';

# Remove and re-prepend CakePHP's autoloader as Composer thinks it is the most important.
# See: http://goo.gl/kKVJO7
spl_autoload_unregister(array('App', 'load'));
spl_autoload_register(array('App', 'load'), true, true);
```

See https://book.cakephp.org/2.0/en/installation/advanced-installation.html for more information about CakePHP 2 and composer.
