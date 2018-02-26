<?php

namespace WrDX\Facebook;

/**
 * Class FacebookCakeSessionPersistentDataHandler
 */
class FacebookCakeSessionPersistentDataHandler implements \Facebook\PersistentData\PersistentDataInterface {

    /**
     * @var string
     */
    protected $sessionPrefix = null;

    function __construct($sessionPrefix = 'Facebook.php-graph-sdk') {
        $this->sessionPrefix = $sessionPrefix . '.';
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get($key) {
        return \CakeSession::read($this->sessionPrefix . $key);
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value) {
        \CakeSession::write($this->sessionPrefix . $key, $value);
    }
}
