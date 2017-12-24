<?php

declare(strict_types=1);

namespace Reseau\Entity;
use PDO;

class User
{
    private $name;

    public function __construct(string $name, int $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getId(): Int
    {
        return $this->id;
    }
}
