<?php

declare(strict_types=1);

namespace Reseau\Entity;
use PDO;

class Community
{
    private $community_name;
    private $nbMeetup;

    public function __construct(string $community_name, int $nbMeetup)
    {
        $this->community_name = $community_name;
        $this->nbMeetup = $nbMeetup;
    }

    public function getCommunityName(): String
    {
        return $this->community_name;
    }

    public function getNbMeetup(): int
    {
        return $this->nbMeetup;
    }
}
