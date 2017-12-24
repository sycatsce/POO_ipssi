<?php

declare(strict_types=1);

namespace Reseau\Entity;

class Attendee extends User
{
    public function __construct($name, $id)
    {
        parent::__construct($name, $id);
    }
}