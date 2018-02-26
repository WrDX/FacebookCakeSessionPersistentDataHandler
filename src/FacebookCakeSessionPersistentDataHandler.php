<?php

namespace WrDX\Facebook;

/**
 * Class FacebookCakeSessionPersistentDataHandler
 */
class FacebookCakeSessionPersistentDataHandler implements \Facebook\PersistentData\PersistentDataInterface {

    /**
     * @var string Prefix to use for session variables.
     */
    protected $sessionPrefix = null;

    /**
     * Init the session handler
     *
     * @param boolean $enableSessionCheck
     * @param string  $sessionPrefix
     *
     * @throws FacebookSDKException
     */
    public function __construct($enableSessionCheck = true, $sessionPrefix = 'Facebook.php-graph-sdk') {

        # CakeSession::start() will determine if Session has been started
        # If not, it will start the Session
        if ($enableSessionCheck && ! \CakeSession::start()) {
            throw new \Facebook\Exceptions\FacebookSDKException('Sessions are not active.', 720);
        }

        $this->sessionPrefix = $sessionPrefix . '.';

    }

    /**
     * Get a value from a persistent data store
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key) {
        return \CakeSession::read($this->sessionPrefix . $key);
    }

    /**
     * Set a value in the persistent data store
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value) {
        \CakeSession::write($this->sessionPrefix . $key, $value);
    }

}
