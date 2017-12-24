<?php

declare(strict_types=1);

namespace Reseau\Collection;

use Reseau\Entity\Meetup;
use ArrayIterator;
use Iterator;
use IteratorIterator;

final class MeetupCollection extends IteratorIterator implements Iterator
{
    public function __construct(Meetup ...$meetups)
    {
        parent::__construct(new ArrayIterator($meetups));
    }

    public function current() : ?Meetup
    {
        return parent::current();
    }
}