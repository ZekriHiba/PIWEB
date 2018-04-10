<?php

namespace VetDreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MailController extends Controller
{
    public function envoiAction()
    {
        $mail = new Mail();
        if (isset($_POST['send'])) {

        }
        return $this->render('VetDreBundle:Mail:envoi.html.twig', array(

        ));
    }

    public function succesAction()
    {
        return $this->render('VetDreBundle:Mail:succes.html.twig', array(
            // ...
        ));
    }

    public function rescueAction()
    {
        return $this->render('VetDreBundle:Mail:rescue.html.twig', array(
            // ...
        ));
    }

}
