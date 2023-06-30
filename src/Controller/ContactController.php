<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
{
    $form = $this->createForm(ContactType::class);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $data = $form->getData();

        $userEmail = $data['userEmail'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $subject = $data['subject'];
        $content = $data['message'];

        $email = (new Email())
            ->from($userEmail)
            ->to('fortuna@hotel.com')
            ->subject($subject)
            ->text("Bonjour Madame, Monsieur,\n\nJe suis $firstName $lastName.\n\n$content");

        $mailer->send($email);

        return $this->redirectToRoute('contact');
    }

    return $this->renderForm('contact/index.html.twig', [
        'controller_name' => 'ContactController',
        'form' => $form
    ]);
}



    // public function index(Request $request, MailerInterface $mailer): Response
    // {
    //     $form = $this->createForm(ContactType::class);

    //     $form->handleRequest($request);

    //     if($form->isSubmitted() && $form->isValid())
    //     {
    //         $data = $form->getData();

    //         // $name = $data['name'];
    //         // $firstname = $data['firstname'];
    //         // $address = $data['email'];
    //         $subject = $data['subject'];
    //         $content = $data['message'];
    //         // $category = $data['category'];


    //         $email = (new Email())
    //             ->from('fortuna@hotel.com')
    //             ->to('rd46wzx@gmail.com')

    //             ->subject($subject)
    //             ->text($content);

    //         $mailer->send($email);

    //         return $this->redirectToRoute('contact');
    //     }

    //     return $this->renderForm('contact/index.html.twig', [
    //         'controller_name' => 'ContactController',
    //         'form' => $form
    //     ]);
    // }
}
//* $name,$firstname,$address,$category,