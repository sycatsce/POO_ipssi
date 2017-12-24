<?php

declare(strict_types=1);

namespace Reseau\Exception;

use LogicException;

final class MeetupsNotFoundException extends LogicException
{
    public function __construct($message = "Aucun meetup enregistré dans la base de donnée"){
        parent::__construct($message);
    }
}
