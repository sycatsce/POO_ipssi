<?php

declare(strict_types=1);

namespace Reseau\Controller;

use Reseau\Repository\ReseauRepository;

final class ReseauController
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

        $meetings = $this->reseauRepository->getAllMeetups();
        $users = $this->reseauRepository->getAllUsers();
        $communities = $this->reseauRepository->getAllCommunities();

        ob_start();
        include __DIR__.'/../../../views/reseau.phtml';
        return ob_get_clean();

    }
}
