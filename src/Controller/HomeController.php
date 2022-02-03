<?php

namespace App\Controller;

use App\Repository\TwitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
        public function index(TwitRepository $twitRepository): Response
    {
        $twits = $twitRepository->findLatsTen();
        return $this->render('home/home.html.twig', [
            'twits' => $twits,
        ]);
    }



}
