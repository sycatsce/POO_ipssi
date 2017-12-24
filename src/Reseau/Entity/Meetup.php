<?php

declare(strict_types=1);

namespace Reseau\Entity;

class Meetup
{
    private $title;
    private $description;
    private $date_begin;
    private $date_end;
    private $commu;

    public function __construct(String $title, String $description, String $date_begin, String $date_end, String $commu, int $id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->date_begin = $date_begin;
        $this->date_end = $date_end;
        $this->commu = $commu;
        $this->id = $id;
    }

    public function getTitle(): String
    {
        return $this->title;
    }

    public function getDescription(): String
    {
        return $this->description;
    }

    public function getDate_begin(): String
    {
        return $this->date_begin;
    }

    public function getDate_end(): String
    {
        return $this->date_end;
    }

    public function getCommu(): String
    {
        return $this->commu;
    }

    public function getId(): int
    {
        return $this->id;
    }
}