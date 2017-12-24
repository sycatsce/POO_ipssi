<?php

declare(strict_types=1);

namespace Reseau\Collection;

use Reseau\Entity\User;
use ArrayIterator;
use Iterator;
use IteratorIterator;

final class UserCollection extends IteratorIterator implements Iterator
{
    public function __construct(User ...$users)
    {
        parent::__construct(new ArrayIterator($users));
    }

    public function current() : ?User
    {
        return parent::current();
    }
}