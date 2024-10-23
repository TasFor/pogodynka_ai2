<?php

namespace App\Controller;

use App\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MeasurmentRepository;
use App\Repository\LocationRepository;


//class WeatherController extends AbstractController
//{
//    #[Route('/weather/{city}/{country?}', name: 'app_weather')]
//    public function city(Location $location, MeasurmentRepository $repository): Response
//    {
//        $measurements = $repository->findByLocation($location);
//
//        return $this->render('weather/city.html.twig', [
//            'location' => $location,
//            'measurements' => $measurements,
//        ]);
//    }
//
//
//}

class WeatherController extends AbstractController
{
    #[Route('/weather/{city}/{country?}', name: 'app_weather')]
    public function city(string $city, ?string $country, LocationRepository $locationRepository, MeasurmentRepository $repository): Response
    {
        $location = $locationRepository->findOneBy(['city' => $city, 'country' => $country]);

        if (!$location) {
            throw $this->createNotFoundException('Location not found');
        }

        $measurements = $repository->findByLocation($location);

        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'measurements' => $measurements,
        ]);
    }
}

