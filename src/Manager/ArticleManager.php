<?php

namespace App\Manager;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

class ArticleManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var string
     */
    private $environment;

    public function __construct(EntityManagerInterface $entityManager, string $environment)
    {
        $this->entityManager = $entityManager;
        $this->environment = $environment;
    }

    public function getArticles(): array
    {
        return $this->entityManager->getRepository(Article::class)->findAll();
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }
}