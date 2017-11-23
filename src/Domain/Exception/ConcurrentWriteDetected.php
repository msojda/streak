<?php

/*
 * This file is part of the streak package.
 *
 * (C) Alan Gabriel Bem <alan.bem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Streak\Domain\Exception;

use Streak\Domain;

/**
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 */
class ConcurrentWriteDetected extends \RuntimeException
{
    private $aggregate;

    public function __construct(Domain\AggregateRoot $aggregate, \Throwable $previous = null)
    {
        $this->aggregate = $aggregate;

        $message = sprintf('Concurrent write detected when tried to persist "%s#%s" aggregate.', get_class($aggregate), $aggregate->id()->toString());

        parent::__construct($message, 0, $previous);
    }

    public function aggregate() : Domain\AggregateRoot
    {
        return $this->aggregate;
    }
}