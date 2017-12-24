<?php

declare(strict_types=1);

namespace Reseau\Factory;

use Reseau\Controller\AjoutController;
use Reseau\Repository\ReseauRepository;
use Psr\Container\ContainerInterface;

final class AjoutControllerFactory
{
    public function __invoke(ContainerInterface $container) : AjoutController
    {
        $reseauRepository = $container->get(ReseauRepository::class);

        return new AjoutController($reseauRepository);
    }
}
