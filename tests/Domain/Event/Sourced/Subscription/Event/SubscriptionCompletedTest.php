<?php

/**
 * This file is part of the streak package.
 *
 * (C) Alan Gabriel Bem <alan.bem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Streak\Domain\Event\Sourced\Subscription\Event;

use PHPUnit\Framework\TestCase;
use Streak\Domain\Event;

/**
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 *
 * @covers \Streak\Domain\Event\Sourced\Subscription\Event\SubscriptionCompleted
 */
class SubscriptionCompletedTest extends TestCase
{
    private $event;

    protected function setUp()
    {
        $this->event = $this->getMockBuilder(Event::class)->getMockForAbstractClass();
    }

    public function testObject()
    {
        $event = new SubscriptionCompleted(1, $now = new \DateTimeImmutable());

        $this->assertSame(1, $event->subscriptionVersion());
        $this->assertEquals($now, $event->timestamp());
    }
}
