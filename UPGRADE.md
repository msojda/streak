Changes introduced via https://github.com/streakphp/streak/pull/49
- Classes implementing `Streak\Application\ProcessManager` should implement `Event\Listener`, `Event\Listener\Replayable` & `Event\Listener\Completable` instead.
- Classes implementing `Streak\Application\ProcessManager\Id` should implement `Streak\Domain\Event\Listener\Id` instead.
- Classes implementing `Streak\Application\ProcessManager\Factory` should implement `Streak\Domain\Event\Listener\Factory` instead.
- Classes implementing `Streak\Application\Saga` should implement `Event\Listener` & `Event\Listener\Completable` instead.
- Classes implementing `Streak\Application\Saga\Id` should implement `Streak\Domain\Event\Listener\Id` instead.
- Classes implementing `Streak\Application\Saga\Factory` should implement `Streak\Domain\Event\Listener\Factory` instead.
- Classes implementing `Streak\Application\Projector` should implement `Event\Listener` & `Event\Listener\Resettable` instead.
- Classes implementing `Streak\Application\Projector\Id` should implement `Streak\Domain\Event\Listener\Id` instead.
- Classes implementing `Streak\Application\Projector\Factory` should implement `Streak\Domain\Event\Listener\Factory` instead.
- Classes using `Streak\Application\ProcessManager\Identification` should use `Streak\Domain\Event\Listener\Identifying` instead.
- Classes using `Streak\Application\ProcessManager\Listening` should use `Streak\Domain\Event\Listener\Listening`, `Streak\Domain\Event\Listener\Replaying` &  `Streak\Domain\Event\Listener\Commanding` instead.
- Classes using `Streak\Application\Saga\Identification` should use `Streak\Domain\Event\Listener\Identifying` instead.
- Classes using `Streak\Application\Saga\Listening` should use `Streak\Domain\Event\Listener\Listening` & `Streak\Domain\Event\Listener\Commanding` instead.
- Classes using `Streak\Domain\Event\Projecting` should use `Streak\Domain\Event\Listener\Listening` instead.
- Trait `Streak\Domain\Event\Listening` no longer exists and has no direct replacement.
