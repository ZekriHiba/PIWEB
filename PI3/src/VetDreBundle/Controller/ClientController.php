<?php

namespace VetDreBundle\Controller;

use BaseBundle\Entity\Appointment;
use Swift_Message;
use BaseBundle\Entity\Mail;
use BaseBundle\Entity\Veto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ClientController extends Controller
{
    public function readAction(Request $request)
    {
        $em=$this->getDoctrine();
        $vetos=$em->getRepository(Veto::class)->findAll();
        if (isset($_POST['afficher'])) {
            $vet=$request->get('vetid');
            $this->redirect($this->generateUrl('searsh', array('id' => $vet )));        }
        return $this->render('VetDreBundle:Client:read.html.twig', array(

            'vetos'=>$vetos

        ));
    }



    public function searshAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $annonce=$em->getRepository(Veto::class)->find($id);
        return $this->render('VetDreBundle:Client:searsh.html.twig', array(
            'veto'=>$annonce

        ));
    }

    public function filterAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $l=$request->get("input");
            $em=$this->getDoctrine();
            $models= $em->getRepository(Veto::class)->searchnomp($l);
            $se = new Serializer([new ObjectNormalizer()]);
            $data=$se->normalize($models);
            return new JsonResponse($data);
        }
        return $this->render('VetDreBundle:Client:read.html.twig', array(
            // ...
        ));
    }

    public function contactAction(Request $request)
    {
        $mail = new Mail();
        if (isset($_POST['send'])) {
            $message = Swift_Message::newInstance()
                ->setSubject('Accusé de réception')
                ->setFrom('zanimopi2@gmail.com')
                ->setTo($request->get('mail'))
                ->setBody(
                    $request->get('body')
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('read'));
        }
        return $this->render('VetDreBundle:Client:contact.html.twig', array(
            // ...
        ));
    }



}
