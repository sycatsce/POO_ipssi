<?php

declare(strict_types=1);

namespace Reseau\Controller;

use Reseau\Repository\ReseauRepository;

final class MeetingController
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
        if (!isset($_POST['id'])){ header('Location: reseau');}

        $admin = 0;
        $id = intval($_POST['id']);
        $meetup = $this->reseauRepository->getMeetup($id);
        $community = $this->reseauRepository->getCommunity(intval($meetup->getCommu()));

        $organizers = $this->reseauRepository->getMeetupOrganizers($id);
        $attendees = $this->reseauRepository->getMeetupAttendees($id);

        foreach($organizers as $organizer){
            if ($organizer->getName() == "Emmanuel" ){
                $admin = 1;
            }
        }

        ob_start();
        include __DIR__.'/../../../views/meeting.phtml';
        return ob_get_clean();

    }
}
