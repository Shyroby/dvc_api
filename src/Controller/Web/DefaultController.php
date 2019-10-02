<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        // does a permanent - 301 redirect
        return $this->redirectToRoute('home', [], 301);
    }
    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function getAll()
    {
        return $this->render('default/index.html.twig');
    }
}
