<?php

namespace WrDX\Facebook\Tests;

use WrDX\Facebook\FacebookCakeSessionPersistentDataHandler;

class FacebookCakeSessionPersistentDataHandlerTest extends \PHPUnit_Framework_TestCase {

    /**
     * @expectedException \Facebook\Exceptions\FacebookSDKException
     */
    public function testInactiveSessionsWillThrowFacebooksdkxception() {
        $CakeSession = $this
            ->getMockBuilder('CakeSession')
            ->setMethods(['start'])
            ->getMock();

        $CakeSession
            ->expects($this->once())
            ->method('start')
            ->will($this->returnValue(false));

        new FacebookCakeSessionPersistentDataHandler($CakeSession);
    }

    public function testCanSetAValue() {

        $CakeSession = $this
            ->getMockBuilder('CakeSession')
            ->setMethods(['write'])
            ->getMock();

        $CakeSession
            ->expects($this->once())
            ->method('write')
            ->will($this->returnValue(true));

        $handler = new FacebookCakeSessionPersistentDataHandler($CakeSession, $enableSessionCheck = false, 'Test');
        $value = $handler->set('foo', 'bar');
        $this->assertTrue($value);

    }

    public function testCanGetAValue() {

        $CakeSession = $this
            ->getMockBuilder('CakeSession')
            ->setMethods(['read'])
            ->getMock();

        $CakeSession
            ->expects($this->once())
            ->method('read')
            ->will($this->returnValue('baz'));

        $handler = new FacebookCakeSessionPersistentDataHandler($CakeSession, $enableSessionCheck = false, 'Test');
        $value = $handler->get('faz');
        $this->assertEquals('baz', $value);

    }

    public function testGettingAValueThatDoesntExistWillReturnNull() {
        $CakeSession = $this
            ->getMockBuilder('CakeSession')
            ->setMethods(['read'])
            ->getMock();

        $CakeSession
            ->expects($this->once())
            ->method('read')
            ->will($this->returnValue(null));

        $handler = new FacebookCakeSessionPersistentDataHandler($CakeSession, $enableSessionCheck = false);
        $value = $handler->get('does_not_exist');
        $this->assertNull($value);
    }

}

