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

use Streak\Domain\Event\Sourced\Subscription;

/**
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 */
class SubscriptionCompleted implements Subscription\Event
{
    const DATE_FORMAT = 'U.u';

    private $version;
    private $timestamp;

    public function __construct(int $version, \DateTimeInterface $timestamp)
    {
        $this->version = $version;
        $this->timestamp = $timestamp->format(self::DATE_FORMAT);
    }

    public function subscriptionVersion() : int
    {
        return $this->version;
    }

    public function timestamp() : \DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $this->timestamp);
    }
}
