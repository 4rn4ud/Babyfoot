<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class EquipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipe::class;
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

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) {
            yield IdField::new('id');
        }

        yield TextField::new('nom');
        yield TextField::new('slogan');

        $currentDate = new \DateTime();

        $createdAt = DateField::new('dateCreation')->setFormTypeOption('widget', 'single_text');

        if (Crud::PAGE_NEW === $pageName) {
            yield $createdAt->setFormTypeOptions([
                'data' => $currentDate,
                'attr' => ['readonly' => true],
            ]);
        } else if (Crud::PAGE_EDIT === $pageName) {
            yield DateField::new('dateCreation')->setFormTypeOption('attr', ['readonly' => true]);
        } else {
            yield DateField::new('dateCreation');
        }
    }
}
