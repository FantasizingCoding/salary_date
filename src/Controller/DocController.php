<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DocController extends AbstractController
{
    #[Route('/doc')]
    public function showDoc(): Response
    {
        return $this->render('doc.html.twig', [

        ]);
    }
}