<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarsController extends AbstractController
{
    #[Route('/', name: 'app_cars')]
    public function index(CarRepository $repository): Response
    {
        $cars = $repository->findAll();

        return $this->render('main/index.html.twig', [
            'cars' => $cars
        ]);
    }
}
