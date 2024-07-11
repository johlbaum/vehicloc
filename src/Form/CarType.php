<?php

namespace App\Form;

use App\Entity\Car;
use App\Enum\NumberOfSeats;
use App\Enum\GearBox;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture'
            ])
            ->add('description', TextType::class)
            ->add('monthlyPrice', NumberType::class, [
                'label' => 'Prix mensuel'
            ])
            ->add('dailyPrice', NumberType::class, [
                'label' => 'Prix journalier'
            ])
            ->add('numberOfSeats', EnumType::class, [
                'class' => NumberOfSeats::class,
                'label' => 'Nombre de places',
                'choice_label' => function (NumberOfSeats $choice) {
                    return $choice->getLabel();
                },
            ])
            ->add('gearbox', EnumType::class, [
                'class' => GearBox::class,
                'label' => 'Boîte de vitesse',
                'choice_label' => function (GearBox $choice) {
                    return $choice->getLabel();
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
