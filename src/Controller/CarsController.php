<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;


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

    #[Route('/voiture/ajouter', name: 'app_add', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();

            $manager->persist($car);
            $manager->flush();

            return $this->redirectToRoute('app_car', ['id' => $car->getId()]);
        }

        return $this->render('car/new.html.twig', [
            'form' => $form,
        ]);
    }
}