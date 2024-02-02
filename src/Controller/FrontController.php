<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FormationRepository;
use App\Repository\ExperienceRepository;
use App\Repository\ProjetWebRepository;
use App\Repository\StackRepository;
use App\Entity\ProjetWeb;

#[Route('/', name: 'portefolio_')]
class FrontController extends AbstractController
{
    #[Route('/accueil', name: 'index')]
    public function index(
        FormationRepository $formationRepo,
        ExperienceRepository $xpRepo,
        ProjetWebRepository $projetWebRepo,
        StackRepository $stackRepo,
    ): Response {

        return $this->render('front/portefolio.html.twig', [
            'formations' => $formationRepo->findAll(),
            'experiences' => $xpRepo->findAll(),
            'projets' => $projetWebRepo->findAll(),
            'stacks' => $stackRepo->findAll(),
        ]);
    }

    #[Route('projet/{id}', methods: ['GET'], name: 'projet')]
    public function showProjets(ProjetWeb $projet): Response
    {
        return $this->render('front/detail-projet4.html.twig', [
            'projets' => $projet,
        ]);
    }
}
