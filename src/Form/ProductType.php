<?php

namespace App\Form;

use App\Entity\Product;
use DateTime;
use DateTimeImmutable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price', MoneyType::class, options:[
                'label' => 'Prix',
                'divisor' => 100,
                'constraints' => [
                    new Positive(
                        message: 'Le prix ne peut être négatif'
                    )
                ]
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image du produit',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'required' => false
            ])

            ->add('discount')
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
            ->add('user')
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
