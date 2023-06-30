<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Entity\Chambre;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvisController extends AbstractController
{


    #[Route('/fortuna/avis', name: 'fortuna_avis')]
    public function admincommentaire(AvisRepository $repo,EntityManagerInterface $manager, Request $request, Chambre $chambre = null)

    {

        $avis = new Avis();

        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $avis

                ->setDateEnregistrement(new \DateTime());
            $manager->persist($avis);
            $manager->flush();

            return $this->redirectToRoute('fortuna_avis');

        }

        $colonnes = $manager->getClassMetadata(Avis::class)->getFieldNames();
        $categorie = $request->query->get('categorie');

    // Récupérer les commentaires filtrés par catégorie
    if ($categorie) {
        $commentaires = $repo->findByCategorie($categorie);
    } else {
        $commentaires = $repo->findAll();
    }


        
        return $this->render('avisN/index.html.twig', [
            "chambre" => $chambre,
            "colonnes" => $colonnes,
            "aviss" => $commentaires,
            "form" => $form->createView(),
        ]);


    }
}