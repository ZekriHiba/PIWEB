<?php

namespace VetDreBundle\Controller;

use BaseBundle\Entity\Appointment;
use BaseBundle\Entity\Veto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppointmentController extends Controller
{
    public function createAPAction(Request $request)
    {
        $em=$this->getDoctrine();
        $vetos=$em->getRepository(Veto::class)->findAll();
        $ap = new Appointment();

        if($request->isXmlHttpRequest())
        {
               $em2=$this->getDoctrine()->getManager();

            $ap->setDate($request->get('input1'));
            $ap->setTime($request->get('input2'));


            $ap->setUserId(1);
            $ap->setVetid($request->get('input'));
            $em2->persist($ap);
            $em2->flush();

        }


        return $this->render('VetDreBundle:Appointment:create_ap.html.twig', array(
            'vetos'=>$vetos
        ));
    }

    public function readAPAction()
    {
        return $this->render('VetDreBundle:Appointment:read_ap.html.twig', array(
            // ...
        ));
    }

    public function updateAPAction()
    {
        return $this->render('VetDreBundle:Appointment:update_ap.html.twig', array(
            // ...
        ));
    }

    public function deleteAPAction()
    {
        return $this->render('VetDreBundle:Appointment:delete_ap.html.twig', array(
            // ...
        ));
    }

    public function SearchAPAction()
    {
        return $this->render('VetDreBundle:Appointment:search_ap.html.twig', array(
            // ...
        ));
    }

}
