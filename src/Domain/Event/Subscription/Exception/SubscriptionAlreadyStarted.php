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

namespace Streak\Domain\Event\Subscription\Exception;

use Streak\Domain\Event\Subscription;

/**
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 */
class SubscriptionAlreadyStarted extends \RuntimeException implements Subscription\Exception
{
    private $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
        $id = $this->subscription->subscriptionId();

        $message = sprintf('Subscription "%s#%s" is already started.', get_class($id), $id->toString());

        parent::__construct($message);
    }

    public function subscription() : Subscription
    {
        return $this->subscription;
    }
}
