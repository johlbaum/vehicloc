<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarsController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(CarRepository $repository): Response
    {
        $cars = $repository->findAll();

        return $this->render('main/index.html.twig', [
            'cars' => $cars
        ]);
    }

    #[Route('/voiture/{id}', name: 'app_car', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id, CarRepository $repository): Response
    {
        $car = $repository->find($id);

        if (!$car) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render('car/show.html.twig', [
            'car' => $car
        ]);
    }
}
