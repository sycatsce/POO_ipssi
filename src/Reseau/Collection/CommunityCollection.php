<?php

declare(strict_types=1);

namespace Reseau\Collection;

use Reseau\Entity\Community;
use ArrayIterator;
use Iterator;
use IteratorIterator;

final class CommunityCollection extends IteratorIterator implements Iterator
{
    public function __construct(Community ...$communities)
    {
        parent::__construct(new ArrayIterator($communities));
    }

    public function current() : ?Community
    {
        return parent::current();
    }
}