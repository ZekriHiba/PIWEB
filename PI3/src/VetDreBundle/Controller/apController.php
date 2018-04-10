<?php

namespace VetDreBundle\Controller;

use BaseBundle\Entity\Appointment;
use BaseBundle\Entity\Veto;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class apController extends Controller
{
    public function ajoutpAction(Request $req)
    {
        $em=$this->getDoctrine();
        $vetos2=$em->getRepository(Veto::class)->findAll();
        $ap = new Appointment();
        if($req->isXmlHttpRequest())
        {
            $l=$req->get("input");
            $l1=$req->get("input1");
            $createDate = new DateTime($l);
            $em=$this->getDoctrine();
            $times= $em->getRepository(Appointment::class)->dateCompare($createDate,$l1);
            $se = new Serializer([new ObjectNormalizer()]);
            $data=$se->normalize($times);
            return new JsonResponse($data);

        }
            if (isset($_POST['add'])) {
                $em=$this->getDoctrine()->getManager();
                $s=$req->get('somedate');
                dump($s);
                //$createDate = new DateTime($s);
                $createDate= DateTime::createFromFormat('Y-m-d', $s);
               // $strip = $s->format('Y-m-d');
                $ap->setDate($createDate);
                $ap->setTime($req->get('time'));
                $ap->setUserId($this->getUser()->getId());
                $ap->setVetid($req->get('vet'));
                $em->persist($ap);
                $em->flush();
                return $this->redirectToRoute('lirep');
            }

        return $this->render('VetDreBundle:ap:ajoutp.html.twig', array(
            'vetos2'=>$vetos2
        ));
    }

    public function suppAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $l=$request->get("input");
            $em=$this->getDoctrine()->getManager();
            $model=$em->getRepository(Appointment::class)->find($l);
            $em->remove($model);
            $em->flush();
            return new JsonResponse();

        }
        return $this->render('VetDreBundle:ap:supp.html.twig', array(
            // ...
        ));
    }

    public function modifpAction()
    {

        return $this->render('VetDreBundle:ap:modifp.html.twig', array(
            // ...
        ));
    }

    public function rechpAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $annonce=$em->getRepository(Veto::class)->find($id);
        return $this->render('VetDreBundle:ap:rechp.html.twig', array(
            // ...
        ));
    }

    public function lirepAction()
    {
        $em=$this->getDoctrine();
        $i=$this->getUser()->getId();
        $apts=$em->getRepository(Appointment::class)->aptUser($i);
        return $this->render('VetDreBundle:ap:lirep.html.twig', array(
            'apts'=>$apts
        ));
    }

}
