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

namespace Streak\Domain\Event\Sourced\Subscription;

use Streak\Domain\Clock;
use Streak\Domain\Event;
use Streak\Domain\Event\Subscription;

/**
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 */
class Factory implements Subscription\Factory
{
    private $clock;

    public function __construct(Clock $clock)
    {
        $this->clock = $clock;
    }

    public function create(Event\Listener $listener) : Event\Subscription
    {
        $subscription = new Event\Sourced\Subscription($listener, $this->clock);

        return $subscription;
    }
}
