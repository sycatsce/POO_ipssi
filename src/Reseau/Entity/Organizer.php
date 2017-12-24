<?php

declare(strict_types=1);

namespace Reseau\Entity;

class Organizer extends User
{
    public function __construct($name, $id)
    {
        parent::__construct($name, $id);
    }

    public function addAttendee(User $attendee)
    {

    }

    public function addOrganizer(User $organize)
    {

    }

    public function deleteMeetup(Meetup $meetup)
    {

    }
}