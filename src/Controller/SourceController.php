<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractController
{
    /**
     * @Route("/source", name="source")
     */
    public function index(): Response
    {
        return $this->render('source/index.html.twig', [
            'controller_name' => 'SourceController',
        ]);
    }
}
