<?php

namespace VetDreBundle\Controller;

use BaseBundle\Entity\Annonce;
use BaseBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\User;

class VetController extends Controller
{
    public function ajouterAnnonceAction(Request $request)
    {
        $annonce = new Annonce();
        $em = $this->getDoctrine()->getManager();
        if (isset($_POST['ajouter'])) {
            $annonce->setTitle($request->get('titre'));
            $annonce->setContent($request->get('contenu'));
            $em2 = $this->getDoctrine()->getManager();
            $user = $em2->getRepository(Users::class)->find(3);

            $annonce->setUserId($user);
            $annonce->setViews(0);
            $em->persist($annonce);
            $em->flush();
            return $this->redirectToRoute('ajouter_annonce');
        }
        return $this->render('VetDreBundle:Vet:ajouter_annonce.html.twig', array(// ...
        ));
    }
}
