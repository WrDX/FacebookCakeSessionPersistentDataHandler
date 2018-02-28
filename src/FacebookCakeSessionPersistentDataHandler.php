<?php

namespace WrDX\Facebook;

/**
 * Class FacebookCakeSessionPersistentDataHandler
 */
class FacebookCakeSessionPersistentDataHandler implements \Facebook\PersistentData\PersistentDataInterface {

    /**
     * @var object Session handler
     */
    private $_CakeSession;

    /**
     * @var string Prefix to use for session variables.
     */
    protected $sessionPrefix = null;

    /**
     * FacebookCakeSessionPersistentDataHandler constructor.
     *
     * @param object $CakeSession
     * @param bool   $enableSessionCheck
     * @param string $sessionPrefix
     *
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function __construct($CakeSession, $enableSessionCheck = true, $sessionPrefix = 'Facebook.php-graph-sdk') {

        $this->_CakeSession = $CakeSession;

        # Session check
        if ($enableSessionCheck && ( ! $this->_CakeSession->valid() || ! $this->_CakeSession->started())) {
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
        return $this->_CakeSession->read($this->sessionPrefix . $key);
    }

    /**
     * Set a value in the persistent data store
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function set($key, $value) {
        return $this->_CakeSession->write($this->sessionPrefix . $key, $value);
    }

}
