<?php

declare(strict_types=1);

namespace Reseau\Factory;

use Reseau\Controller\UserController;
use Reseau\Repository\ReseauRepository;
use Psr\Container\ContainerInterface;

final class UserControllerFactory
{
    public function __invoke(ContainerInterface $container) : UserController
    {
        $reseauRepository = $container->get(ReseauRepository::class);

        return new UserController($reseauRepository);
    }
}
