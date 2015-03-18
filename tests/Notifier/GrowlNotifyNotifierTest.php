<?php

/**
 * This file is part of the JoliNotif project.
 *
 * (c) Loïck Piera <pyrech@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JoliNotif\tests\Notifier;

use JoliNotif\Notifier;
use JoliNotif\Notifier\GrowlNotifyNotifier;

class GrowlNotifyNotifierTest extends NotifierTestCase
{
    const BINARY = 'growlnotify';

    use CliBasedNotifierTestTrait;

    protected function getNotifier()
    {
        return new GrowlNotifyNotifier();
    }

    public function testGetBinary()
    {
        $notifier = $this->getNotifier();

        $this->assertSame(self::BINARY, $notifier->getBinary());
    }

    public function testGetPriority()
    {
        $notifier = $this->getNotifier();

        $this->assertSame(Notifier::PRIORITY_HIGH, $notifier->getPriority());
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedCommandLineForNotification()
    {
        return "'growlnotify' '--message' 'I'\\''m the notification body'";
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedCommandLineForNotificationWithATitle()
    {
        return "'growlnotify' '--message' 'I'\\''m the notification body' '--title' 'I'\\''m the notification title'";
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedCommandLineForNotificationWithAnIcon()
    {
        return "'growlnotify' '--message' 'I'\\''m the notification body' '--image' '/home/toto/Images/my-icon.png'";
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedCommandLineForNotificationWithAllOptions()
    {
        return "'growlnotify' '--message' 'I'\\''m the notification body' '--title' 'I'\\''m the notification title' '--image' '/home/toto/Images/my-icon.png'";
    }
}