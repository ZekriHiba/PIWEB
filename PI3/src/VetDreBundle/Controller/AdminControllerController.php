<?php

namespace VetDreBundle\Controller;

use BaseBundle\Entity\Veto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AdminControllerController extends Controller
{
    public function addAnnonceAction(Request $request)
    {
        $annonce = new Veto();
        $em = $this->getDoctrine()->getManager();
        if (isset($_POST['ajouter'])) {
            $annonce->setNomp($request->get('nomp'));
            $annonce->setLat($request->get('latit'));
            $annonce->setMail($request->get('mail'));
            $annonce->setLat($request->get('latit'));
            $annonce->setPrix($request->get('prix'));

            $annonce->setPhone($request->get('tel'));

            $annonce->setDescription($request->get('description'));
            $annonce->setImage("/PIWeb/web/Back/dist/img/".$request->get('image'));
            $annonce->setGouv($request->get('gouvernorat'));
            $annonce->setVille($request->get('ville'));
            $annonce->setVue(0);

            $annonce->setLongit($request->get('longit'));
            $em->persist($annonce);
            $em->flush();
            return $this->redirectToRoute('show_annonce');
        }


    }



    public function deleteAnnoceAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $l=$request->get("input");
            $em=$this->getDoctrine()->getManager();
            $model=$em->getRepository(Veto::class)->find($l);
            $em->remove($model);
            $em->flush();
            return new JsonResponse();

        }
        return $this->render('VetDreBundle:AdminController:show_annonce.html.twig', array(
            // ...
        ));
    }

    public function showAnnonceAction()
    {

        $em=$this->getDoctrine();
        $vetos=$em->getRepository(Veto::class)->findAll();

        return $this->render('VetDreBundle:AdminController:show_annonce.html.twig', array(
            'vetos'=>$vetos
        ));
    }
        public function detailsAnnonceAction(Request $request, $id)
        {

            $em=$this->getDoctrine();
            $em=$this->getDoctrine()->getManager();
            $annonce=$em->getRepository(Veto::class)->find($id);
            if(isset($_POST['modifier'])){

                $annonce->setNomp($request->get('nomp'));
                $annonce->setLat($request->get('latit'));
                $annonce->setMail($request->get('mail'));
                $annonce->setLat($request->get('latit'));
                $annonce->setPrix($request->get('prix'));

                $annonce->setPhone($request->get('tel'));

                $annonce->setDescription($request->get('description'));
                $annonce->setGouv($request->get('gouvernorat'));
                $annonce->setVille($request->get('ville'));
                $annonce->setLongit($request->get('longit'));

                $em->flush();
                return $this->redirectToRoute('show_annonce');


            }
            return $this->render('VetDreBundle:AdminController:details_annoce.html.twig', array(
                'veto'=>$annonce
            ));
        }


}
