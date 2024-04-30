<?php

namespace App\Controller\Admin;

use App\Entity\Joueur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class JoueurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Joueur::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    // public function configureFields(string $pageName): iterable
    // {
    //     if (Crud::PAGE_INDEX === $pageName) {
    //         yield IdField::new('id');
    //     }

    //     yield TextField::new('nom');
    //     yield TextField::new('prenom');
    //     yield EmailField::new('email');

    //     if (Crud::PAGE_INDEX === $pageName) {
    //         yield ArrayField::new('roles');
    //     }

    //     if (Crud::PAGE_NEW === $pageName or Crud::PAGE_EDIT === $pageName) {
    //         yield TextField::new('password');
    //     }
    // }
}
