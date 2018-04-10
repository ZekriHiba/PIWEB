<?php

namespace VetDreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VetDreBundle:Default:index.html.twig');
    }
}
