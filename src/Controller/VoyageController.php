<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VoyageController extends AbstractController
{
    /**
     * @Route("/voyage", name="voyage")
     */
    public function index()
    {
        return $this->render('User/voyage.html.twig', [
            'controller_name' => 'VoyageController',
        ]);
    }
}