<?php

namespace App\Form;

use DateTime;
use App\Form\UserType;
use DateTimeImmutable;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options: [
                'label' => 'Nom'
            ])
            ->add('description')
            ->add('price', MoneyType::class, options:[
                'label' => 'Prix',
                'divisor' => 100,
                'constraints' => [
                    new Positive(
                        message: 'Le prix ne peut pas être négatif'
                    )
                ]
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image (uniquement en format .jpeg, .jpg ou .png)',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'required' => false,
            ])

            ->add('discount', options:[
                'label' => '% de la promotion',
                'constraints' => [
                    new Positive([
                        'message' => 'La promotion ne peux pas être négative'
                    ]),
                    new LessThan([
                        'value' => 100,
                        'message' => 'La promotion doit être inférieure à 100%',
                    ]),
                ]
            ])
            ->add('start_date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de début de la promotion (sous la forme AAAA-MM-JJ)',
                'html5' => false,
                'required' => false,
                'format' => 'YYYY-MM-dd',
            ])
            ->add('end_date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de fin de la promotion (sous la forme AAAA-MM-JJ)',
                'html5' => false,
                'required' => false,
                'format' => 'YYYY-MM-dd',
            ])
            ->add('user', options: [
                'label' => 'Utilisateur',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'label',
                'label' => 'Choisissez la catégorie du produit',
                'query_builder' => function(CategoryRepository $cr){
                    return $cr->createQueryBuilder('c')
                        ->orderBy('c.label', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
