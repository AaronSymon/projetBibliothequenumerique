<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
    /**
     * @Route("/livre", name="app_listeLivre")
     */
    public function lister(LivreRepository $livreRepo): Response
    {
        $livres = $livreRepo->findAll();

        return $this->render('livre/listeLivre.html.twig', compact("livres")
        );
    }

    /**
     * @Route("/livre/ajouter", name="app_livre_ajouter")
     */
    public function ajouter(): Response
    {
        return $this->render('livre/ajouterLivre.html.twig', [
            'controller_name' => 'LivreController',
        ]);
    }
}
