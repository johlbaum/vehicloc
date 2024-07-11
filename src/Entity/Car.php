<?php

namespace App\Entity;

use App\Enum\GearBox;
use App\Enum\NumberOfSeats;
use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?float $monthlyPrice = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?float $dailyPrice = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?NumberOfSeats $numberOfSeats = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull]
    private ?GearBox $gearbox = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthlyPrice(): ?float
    {
        return $this->monthlyPrice;
    }

    public function setMonthlyPrice(float $monthlyPrice): static
    {
        $this->monthlyPrice = $monthlyPrice;

        return $this;
    }

    public function getDailyPrice(): ?float
    {
        return $this->dailyPrice;
    }

    public function setDailyPrice(float $dailyPrice): static
    {
        $this->dailyPrice = $dailyPrice;

        return $this;
    }

    public function getNumberOfSeats(): ?NumberOfSeats
    {
        return $this->numberOfSeats;
    }

    public function setNumberOfSeats(NumberOfSeats $numberOfSeats): static
    {
        $this->numberOfSeats = $numberOfSeats;

        return $this;
    }

    public function getGearbox(): ?GearBox
    {
        return $this->gearbox;
    }

    public function setGearbox(GearBox $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }
}
