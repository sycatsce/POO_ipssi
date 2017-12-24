<?php

declare(strict_types=1);

namespace Reseau\Factory;

use Reseau\Controller\ReseauController;
use Reseau\Repository\ReseauRepository;
use Psr\Container\ContainerInterface;

final class ReseauControllerFactory
{
    public function __invoke(ContainerInterface $container) : ReseauController
    {
        $reseauRepository = $container->get(ReseauRepository::class);

        return new ReseauController($reseauRepository);
    }
}
