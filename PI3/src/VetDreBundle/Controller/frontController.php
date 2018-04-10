<?php

namespace VetDreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class frontController extends Controller
{
    public function vetDAction()
    {
        return $this->render('VetDreBundle:front:vet_d.html.twig', array(
            // ...
        ));
    }

    public function vD2Action()
    {
        return $this->render('VetDreBundle:front:v_d2.html.twig', array(
            // ...
        ));
    }

}
