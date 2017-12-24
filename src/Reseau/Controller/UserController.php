<?php

declare(strict_types=1);

namespace Reseau\Controller;

use Reseau\Repository\ReseauRepository;

final class UserController
{
    /**
     * @var ReseauRepository
     */
    private $reseauRepository;

    public function __construct(ReseauRepository $reseauRepository)
    {
        $this->reseauRepository = $reseauRepository;
    }

    public function indexAction() : string
    {
        $meetupsOrganized = $this->reseauRepository->getUserMeetupOrganizer(intval($_POST['id']));
        $meetupsAttendeed = $this->reseauRepository->getUserMeetupAttendee(intval($_POST['id']));
        $user = $this->reseauRepository->getUser(intval($_POST['id']));

        ob_start();
        include __DIR__.'/../../../views/user.phtml';
        return ob_get_clean();
    }
}
