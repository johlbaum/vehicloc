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
    public function __construct(
        private CarRepository $carRepository,
        private EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Page d'accueil avec la liste des voitures.
     */
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(): Response
    {
        $cars = $this->carRepository->findAll();

        return $this->render('main/index.html.twig', [
            'cars' => $cars
        ]);
    }

    /**
     * Page de détail d'une voiture
     */
    #[Route('/voiture/{id}', name: 'app_car', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id): Response
    {
        $car = $this->carRepository->find($id);

        if (!$car) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render('car/show.html.twig', [
            'car' => $car
        ]);
    }

    /**
     * Création d'une voiture
     */
    #[Route('/voiture/ajouter', name: 'app_car_add', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $car = new Car();

        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();

            $this->entityManager->persist($car);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_car', ['id' => $car->getId()]);
        }

        return $this->render('car/new.html.twig', [
            'form' => $form,
        ]);
    }

    /**
     * Suppression d'une voiture
     */
    #[Route('/voiture/{id}/supprimer', name: 'app_car_delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $car = $this->carRepository->find($id);

        if (!$car) {
            return $this->redirectToRoute('app_home');
        }

        $this->entityManager->remove($car);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
}
