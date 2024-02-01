<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\ProjetWeb;
use App\Entity\Stack;
use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(DashboardController::class)
        ->generateUrl();

        return $this->redirect($url);
        //return $this->render('admin/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Checkpoint 4')
            ->setFaviconPath('fas fa-moon');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Portefolio');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Formations');
        yield MenuItem::subMenu('Mes actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Ajoutez une formation', 'fas fa-plus-circle', Formation::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les formations', 'fas fa-eye', Formation::class),
        ]);

        yield MenuItem::section('Expériences');
        yield MenuItem::subMenu('Mes actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Ajoutez une expérience', 'fas fa-plus-circle', Experience::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les expériences', 'fas fa-eye', Experience::class),
        ]);

        yield MenuItem::section('Stacks');
        yield MenuItem::subMenu('Mes actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Ajoutez une stack', 'fas fa-plus-circle', Stack::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les stacks', 'fas fa-eye', Stack::class),
        ]);

        yield MenuItem::section('Projets Web');
        yield MenuItem::subMenu('Mes actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Ajoutez un projet', 'fas fa-plus-circle', ProjetWeb::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Détails des projets', 'fas fa-eye', ProjetWeb::class),
        ]);
    }
}
