<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwitController extends AbstractController
{
    /**
     * @Route("/twit", name="twit")
     */
    public function index(): Response
    {
        return $this->render('twit/index.html.twig', [
            'controller_name' => 'TwitController',
        ]);
    }
}
