<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\AjouterLivreFormType;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function ajouter(EntityManagerInterface  $em, LivreRepository  $livreRepo, Request $request): Response
    {
        $livre = New Livre();

        $livreForm = $this->createForm(AjouterLivreFormType::class,$livre);
        $livreForm->handleRequest($request);

        if($livreForm->isSubmitted() && $livreForm->isValid()){

            dump($livre);


            $livreRepo->add($livre,true);
            $this->addFlash("success","Livre successfully added!");

            return $this->redirectToRoute('app_livre_ajouter');
        }


        return $this->render('livre/ajouterLivre.html.twig', [
            'livreForm'=> $livreForm-> createView()
        ]);
    }
}
