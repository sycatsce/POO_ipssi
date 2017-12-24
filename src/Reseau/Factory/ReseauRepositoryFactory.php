<?php

declare(strict_types=1);

namespace Reseau\Factory;

use Reseau\Repository\ReseauRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class ReseauRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : ReseauRepository
    {
        $pdo = $container->get(PDO::class);

        return new ReseauRepository($pdo);
    }
}
