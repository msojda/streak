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

namespace Streak\Infrastructure\Testing\Command;

use PHPUnit\Framework\Assert;
use Streak\Application;
use Streak\Domain;
use Streak\Infrastructure\EventStore\InMemoryEventStore;
use Streak\Infrastructure\Testing\Command\Scenario\Given;
use Streak\Infrastructure\UnitOfWork;

/**
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 *
 * @codeCoverageIgnore
 */
class Scenario implements Scenario\Given, Scenario\When, Scenario\Then
{
    private $handler;
    private $store;
    private $uow;
    private $id;
    private $events = [];

    public function __construct(Application\CommandHandler $handler, InMemoryEventStore $store, UnitOfWork $uow)
    {
        $this->handler = $handler;
        $this->store = $store;
        $this->uow = $uow;
    }

    public function for(Domain\Id $id) : Given
    {
        $this->id = $id;

        return $this;
    }

    public function given(Domain\Event ...$events) : Scenario\When
    {
        $this->events = $events;
        $this->store->add($this->id, null, ...$events);

        return $this;
    }

    public function when(Application\Command $command) : Scenario\Then
    {
        $this->handler->handle($command);

        return $this;
    }

    public function then(Domain\Event ...$expected) : void
    {
        $this->events = array_merge($this->events, $expected);

        Assert::assertNotEmpty($this->events, 'No events provided for scenario.');

        $this->store->clear();
        iterator_to_array($this->uow->commit());

        $actual = iterator_to_array($this->store->stream());

        Domain\Event\Metadata::clear(...$actual);

        Assert::assertEquals($expected, $actual, 'Expected events don\'t match produced events.');
    }
}
