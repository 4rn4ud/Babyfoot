<?php

namespace App\Controller\Admin;

use App\Entity\Partie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class PartieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partie::class;
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
        yield AssociationField::new('idRouge');
        yield AssociationField::new('idBleu');

        if (Crud::PAGE_INDEX === $pageName) {
            yield IdField::new('id');
        }

        $currentDate = new \DateTime();

        $createdAt = DateTimeField::new('dateDebut')->setFormTypeOption('widget', 'single_text');
        $updatedAt = DateTimeField::new('dateFin')->setFormTypeOption('widget', 'single_text');

        if (Crud::PAGE_NEW === $pageName) {
            yield AssociationField::new('idGagnant')->setDisabled(true);
            yield $createdAt->setFormTypeOptions([
                'data' => $currentDate,
                'attr' => ['readonly' => true],
            ]);
            yield $updatedAt->setFormTypeOptions([
                'attr' => ['readonly' => true],
            ]);
            yield IntegerField::new('scoreBleu')->setFormTypeOptions([
                'data' => 0,
                'attr' => ['readonly' => true],
            ]);
            yield IntegerField::new('scoreRouge')->setFormTypeOptions([
                'data' => 0,
                'attr' => ['readonly' => true],
            ]);
            yield BooleanField::new('partieFinie')->setFormTypeOptions([
                'data' => false,
                'attr' => ['readonly' => true],
            ]);
        } else if (Crud::PAGE_EDIT === $pageName) {
            yield DateTimeField::new('dateDebut')->setFormTypeOption('attr', ['readonly' => true]);
            yield $updatedAt->setFormTypeOptions([
                'data' => $currentDate,
                'attr' => ['readonly' => true],
            ]);
            yield IntegerField::new('scoreBleu');
            yield IntegerField::new('scoreRouge');
            yield AssociationField::new('idGagnant');
            yield BooleanField::new('partieFinie')->setFormTypeOptions([
                'data' => true,
                'attr' => ['readonly' => true],
            ]);
        } else {
            yield DateTimeField::new('dateDebut');
            yield DateTimeField::new('dateFin');
            yield IntegerField::new('scoreBleu');
            yield IntegerField::new('scoreRouge');
            yield AssociationField::new('idGagnant');
            // yield BooleanField::new('partieFinie');
        }
    }
}
