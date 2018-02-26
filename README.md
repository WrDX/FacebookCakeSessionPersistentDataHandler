# FacebookCakeSessionPersistentDataHandler

[![Latest Stable Version](https://poser.pugx.org/wrdx/facebook-cake-session-persistent-data-handler/v/stable)](https://packagist.org/packages/wrdx/facebook-cake-session-persistent-data-handler)
[![Latest Unstable Version](https://poser.pugx.org/wrdx/facebook-cake-session-persistent-data-handler/v/unstable)](https://packagist.org/packages/wrdx/facebook-cake-session-persistent-data-handler#dev-master) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/WrDX/FacebookCakeSessionPersistentDataHandler/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/WrDX/FacebookCakeSessionPersistentDataHandler/?branch=master) 
[![License](https://poser.pugx.org/wrdx/facebook-cake-session-persistent-data-handler/license)](https://github.com/WrDX/FacebookCakeSessionPersistentDataHandler/blob/master/LICENCE.md)

CakePHP 2.x session handler for Facebook php-graph-sdk. 

Let Facebook php-graph-sdk use CakeSession for session access.

## Installation

```
composer require wrdx/dev-facebook-cake-session-persistent-data-handler
```

## Usage

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
