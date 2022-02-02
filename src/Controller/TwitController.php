<?php

namespace App\Controller;

use App\Entity\Twit;
use App\Form\TwitFormType;
use App\Repository\TwitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @route("/create", name="create")
     * @param Request $request
     * @param TwitRepository $twitRepository
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        //récupération de la route pour la redirection dans twitt
        $routeName = $request->get('_route');
        //création d'un objet twit
        $twit = new Twit();
        //récupération de l'user pour le mettre en auteur
        $twit->setUser($this->getUser());
        //hydratation des attributs qui ne font partis du formulaire
        $twit->setCreatedAt(new \DateTimeImmutable());
        $twit->setModifiedAt(new \DateTimeImmutable());
        //Utilisation du form de sortie
        $form = $this->createForm(TwitFormType::class, $twit);
        //et envoie du forme en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($twit);
            $entityManager->flush();
            return $this->redirectToRoute('home');

        }

        return $this->render
        ('twit/ajouter.html.twig', [
            'route' => $routeName,
            'user' => $this->getUser(),
            'formTwit' => $form->createView(),
        ]);
    }


}
