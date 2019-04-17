<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/{_locale}/articles", name="articles")
     */
    public function articles(ArticleManager $articleManager)
    {
        $articles = $articleManager->getArticles();

        return $this->render('articles.html.twig', [
            'articles' => $articles,
            'environment' => $articleManager->getEnvironment(),
        ]);
    }
}
