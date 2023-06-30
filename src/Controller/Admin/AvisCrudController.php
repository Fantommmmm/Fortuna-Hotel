<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Avis;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AvisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Avis::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
        TextField::new('auteur'),
        TextareaField::new('contenu'),
        TextField::new('categorie'),
        IntegerField::new('note'),
        DateTimeField::new('date_enregistrement'),
        ];
    }
    
    public function createEntity(string $entityFqcn)
    {
        $produit = new $entityFqcn;
        $produit->setDateEnregistrement(new DateTime);
        return $produit;
    }
    
}
