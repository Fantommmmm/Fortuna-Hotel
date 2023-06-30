<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalController extends AbstractController
{
    #[Route('/fortuna/legal', name: 'fortuna_legal')]
    public function legalPage(): Response
    {
        // Obtenez les informations nécessaires pour les mentions légales
        $legalData = [
            'company_name' => 'Fortuna Hotels',
            'address' => ': 149 Av. Gallieni, 93170 Bagnolet',
            'email' => 'contact@fortuna-hotels.com',
            'phone' => '+33 (0)1.23.45.67.89',
            'vat_number' => 'FR01 234 567 890',
            'siret' => '123 456 789 00001',
            'director' => 'Fantomm',
            'host_name' => 'Fortuna Hosting Services',
            'host_address' => '456 Street, City',
            'host_vat_number' => 'FR98 765 432 109',
            'host_phone' => '+33 (0)9.87.65.43.21',
        ];
        
        // Renvoyez la page des mentions légales en utilisant un template Twig
        return $this->render('legal/index.html.twig', [
            'legal_data' => $legalData,
        ]);
    }
}


