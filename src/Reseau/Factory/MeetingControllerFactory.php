<?php

declare(strict_types=1);

namespace Reseau\Factory;

use Reseau\Controller\MeetingController;
use Reseau\Repository\ReseauRepository;
use Psr\Container\ContainerInterface;

final class MeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : MeetingController
    {
        $reseauRepository = $container->get(ReseauRepository::class);

        return new MeetingController($reseauRepository);
    }
}
