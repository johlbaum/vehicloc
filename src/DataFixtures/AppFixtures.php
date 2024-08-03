<?php

namespace App\DataFixtures;

use App\Factory\CarFactory;
use App\Enum\GearBox;
use App\Enum\NumberOfSeats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CarFactory::createOne([
            'name' => 'Renault Twingo',
            'description' => 'La Renault Twingo est une petite voiture citadine pratique et agile. Idéale pour la conduite en milieu urbain, elle combine une maniabilité exceptionnelle avec un design moderne et élégant. Sa taille compacte et son moteur efficace en font un choix parfait pour les trajets quotidiens.',
            'monthlyPrice' => 39.14,
            'dailyPrice' => 900.00,
            'numberOfSeats' => NumberOfSeats::Four,
            'gearbox' => GearBox::Manual,
        ]);

        CarFactory::createOne([
            'name' => 'Renault Clio',
            'description' => 'La Renault Clio est une voiture polyvalente et élégante qui offre un confort de conduite optimal. Avec un design moderne et une technologie avancée, elle est équipée pour répondre aux besoins des conducteurs urbains comme des amateurs de routes plus longues. Sa performance fiable et son intérieur spacieux en font un choix populaire.',
            'monthlyPrice' => 38.64,
            'dailyPrice' => 850.00,
            'numberOfSeats' => NumberOfSeats::Four,
            'gearbox' => GearBox::Automatic,
        ]);

        CarFactory::createOne([
            'name' => 'BMX IX (Electric)',
            'description' => 'La BMX IX est un SUV électrique haut de gamme qui allie puissance et luxe. Avec une puissance variant de 326 ch (BMX iX 40) à 523 ch (BMX iX 50) et une autonomie de 408 à 590 kilomètres, ce modèle offre une conduite exceptionnelle et une technologie avancée. La BMX IX est idéale pour ceux qui recherchent une expérience de conduite sophistiquée et écologique.',
            'monthlyPrice' => 42.40,
            'dailyPrice' => 950.00,
            'numberOfSeats' => NumberOfSeats::Five,
            'gearbox' => GearBox::Automatic,
        ]);

        CarFactory::createOne([
            'name' => 'Renault Zoé',
            'description' => 'La Renault Zoé est une voiture électrique qui se distingue par son autonomie et sa performance en ville. Avec une batterie offrant une autonomie impressionnante, la Zoé allie confort et efficacité énergétique. Elle est parfaite pour les trajets quotidiens et offre une conduite agréable et silencieuse.',
            'monthlyPrice' => 39.14,
            'dailyPrice' => 900.00,
            'numberOfSeats' => NumberOfSeats::Five,
            'gearbox' => GearBox::Automatic,
        ]);

        CarFactory::createOne([
            'name' => 'Citroën Ami',
            'description' => 'La Citroën Ami est une voiture électrique compacte et innovante, conçue pour faciliter les déplacements urbains. Avec son design unique et sa petite taille, elle est idéale pour naviguer facilement dans les rues animées et les espaces réduits. La Citroën Ami offre une solution pratique et écologique pour les trajets quotidiens.',
            'monthlyPrice' => 28.59,
            'dailyPrice' => 799.00,
            'numberOfSeats' => NumberOfSeats::Four,
            'gearbox' => GearBox::Automatic,
        ]);

        CarFactory::createOne([
            'name' => 'Opel Corsa',
            'description' => 'L’Opel Corsa est une voiture compacte offrant un excellent rapport qualité-prix. Avec son design dynamique et son confort de conduite, elle est adaptée aussi bien aux trajets urbains qu’aux routes plus longues. L’Opel Corsa combine performance, économie de carburant et technologie moderne pour une conduite agréable.',
            'monthlyPrice' => 36.38,
            'dailyPrice' => 820.00,
            'numberOfSeats' => NumberOfSeats::Four,
            'gearbox' => GearBox::Automatic,
        ]);
    }
}
