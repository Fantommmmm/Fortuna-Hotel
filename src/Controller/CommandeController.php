<?php

namespace App\Controller;

use DateTime;
use App\Entity\Chambre;
use App\Entity\Commande;
use App\Form\CommandeType;
use Symfony\Component\Mime\Email;
use App\Repository\CommandeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CommandeController extends AbstractController
{
    #[Route('/sayonara/commandes', name: 'app_commande_index', methods: ['GET'])]
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    #[Route('/commande/new/{id}', name: 'app_commande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CommandeRepository $commandeRepository, Chambre $chambre, MailerInterface $mailer): Response
{
    $commande = new Commande();
    $form = $this->createForm(CommandeType::class, $commande);
    $form->handleRequest($request);

    
    if ($form->isSubmitted() && $form->isValid()) {
        $dateArrivee = $commande->getDateArrivee();
        $dateDepart = $commande->getDateDepart();
        $commande->setChambre($chambre);

        $diff = $dateDepart->diff($dateArrivee);
        $nombreJours = $diff->days;


        $prixChambre = $commande->getChambre()->getPrixJournalier();


        $prixTotal = $nombreJours * $prixChambre;

$commande->setPrixTotal($prixTotal)
            ->setDateEnregistrement(new DateTime);       

        $commandeRepository->save($commande, true);

         // Récupérer le nom et le prénom de l'utilisateur depuis le formulaire
         $lastName = $form->get('nom')->getData();
         $firstName = $form->get('prenom')->getData();
 
         // Construire le contenu de l'e-mail
         $emailContent = "Bonjour $lastName $firstName,\n\nNous vous confirmons que votre commande a été validée avec succès. Vous séjournerez dans notre hôtel Fortuna.\n\nNuméro de chambre : 123\n\nDate d'arrivée : " . $dateArrivee->format('d/m/Y') . "\nDate de départ : " . $dateDepart->format('d/m/Y') . "\n\nNous vous remercions pour votre réservation et vous souhaitons un agréable séjour.\n\nCordialement,\nL'équipe de l'Hôtel Fortuna";
 
         // Envoyer l'e-mail à l'utilisateur
         $email = (new Email())
             ->from('fortuna@hotel.com')
             ->to($commande->getEmail())
             ->subject('Confirmation de commande')
             ->text($emailContent);
 
         $mailer->send($email);

        return $this->redirectToRoute('fortuna_hotel', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('commande/new.html.twig', [
        'commande' => $commande,
        'form' => $form,
    ]);
}


    #[Route('/commande/{id}', name: 'app_commande_show', methods: ['GET'])]
    public function show(Commande $commande): Response
    {
        return $this->render('commande/show.html.twig', [
            'commande' => $commande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeRepository->save($commande, true);

            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    #[Route('/commande/{id}', name: 'app_commande_delete', methods: ['POST'])]
    public function delete(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $commandeRepository->remove($commande, true);

        return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);

        }

        return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
    }
}
