<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         IdField::new('id'),
    //         // AssociationField::new('chambre'),
    //         DateField::new('date_arrivee'),
    //         DateField::new('date_depart'),
    //         IntegerField::new('prix_total'),
    //         TextField::new('prenom'),
    //         TextField::new('nom'),
    //         TextField::new('telephone'),
    //         EmailField::new('email'),
    //         DateTimeField::new('date_enregistrement')->setFormat('d/m/Y à H:m:s')->hideOnForm(),
    //     ];
    // }

    // public function createEntity(string $entityFqcn)
    // {
    //     $commande = new $entityFqcn;
    //     $commande->setDateEnregistrement(new DateTime);
    //     return $commande;
    // }
}
