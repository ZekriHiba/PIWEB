<?php

namespace VetDreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientVetController extends Controller
{
    public function vetDetailsAction($id)
    {
        return $this->render('VetDreBundle:ClientVet:vet_details.html.twig', array(
            // ...
        ));
    }

    public function v1Action()
    {
        return $this->render('VetDreBundle:ClientVet:v1.html.twig', array(
            // ...
        ));
    }

    public function v2Action()
    {
        return $this->render('VetDreBundle:ClientVet:v2.html.twig', array(
            // ...
        ));
    }

    public function v3Action()
    {
        return $this->render('VetDreBundle:ClientVet:v3.html.twig', array(
            // ...
        ));
    }

}
