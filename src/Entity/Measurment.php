<?php

namespace App\Entity;

use App\Repository\MeasurmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: MeasurmentRepository::class)]
class Measurment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'measurments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;



    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $celcius = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data_time = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }




    public function getCelcius(): ?string
    {
        return $this->celcius;
    }

    public function setCelcius(string $celcius): static
    {
        $this->celcius = $celcius;

        return $this;
    }

    public function getDataTime(): ?\DateTimeInterface
    {
        return $this->data_time;
    }

    public function setDataTime(\DateTimeInterface $data_time): static
    {
        $this->data_time = $data_time;

        return $this;
    }

}
