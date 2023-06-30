<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Repository\SliderRepository;
use App\Repository\ChambreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PresentFotelController extends AbstractController
{

    #[Route('/', name: 'fortuna_hotel')]
    public function hotel(SliderRepository $sliderRepository): Response
    {
        $slides = $sliderRepository->findBy([], ['ordre' => 'ASC']);

        return $this->render('present_fotel/index.html.twig', [
            'slides' => $slides,
        ]);
    }

    #[Route('/fortuna/chambres', name: 'fortuna_chambres')]
    public function chambres(ChambreRepository $repo): Response
    {
        $chambres = $repo->findAll();

        return $this->render('present_fotel/chambres.html.twig',[
            'chambres' => $chambres
        ]);
    }

    #[Route('/fortuna/chambre/{id}', name: 'fortuna_chambre', methods: ['GET'])]
    public function show(Chambre $chambre, ChambreRepository $repo): Response
    {
        

        return $this->render('present_fotel/voirChambre.html.twig', [
            'chambre' => $chambre,
        ]);
    }

    #[Route('/fortuna/restaurant', name: 'fortuna_restaurant')]
    public function restaurant(): Response
    {

        return $this->render('present_fotel/restaurant.html.twig');
    }

    #[Route('/fortuna/spa', name: 'fortuna_spa')]
    public function spa(): Response
    {
        return $this->render('present_fotel/spa.html.twig');
    }
    

    #[Route('/fortuna/qui-sommes-nous', name: 'fortuna_qui_sommes_nous')]
    public function quiSommesNous(): Response
    {
        return $this->render('present_fotel/qui_sommes_nous.html.twig');
    }

    #[Route('/fortuna/acces', name: 'fortuna_acces')]
    public function acces(): Response
    {
        return $this->render('present_fotel/acces.html.twig');
    }

    #[Route('/fortuna/actualites', name: 'fortuna_actualites')]
    public function actualites(): Response
    {
        return $this->render('present_fotel/actualites.html.twig');
    }
}
