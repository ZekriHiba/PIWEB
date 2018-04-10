<?php

namespace RecBundle\Controller;

use BaseBundle\Entity\Animal;
use BaseBundle\Entity\Users;
use RecBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class AnimalController extends Controller
{
    public function afficherAction()
    {
        $em=$this->getDoctrine();
        $animaux=$em->getRepository(Animal::class)->findByStatus('perdu');

        return $this->render('RecBundle:Animal:afficher.html.twig', array(
            'animaux'=>$animaux
        ));
    }

    public function afficherAnimPAction()
    {
        $em=$this->getDoctrine();

        $animaux=$em->getRepository(Animal::class)->findByIdUtilisateur($this->getUser()->getId());

        return $this->render('RecBundle:Animal:afficherAnimP.html.twig', array(
            'animaux'=> $animaux

        ));
    }

    public function detailAction($id)
    {
        $em=$this->getDoctrine();
        $animaux=$em->getRepository(Animal::class)->find($id);
        $user=$em->getRepository(User::class)->find($animaux->getIdUtilisateur());

        return $this->render('RecBundle:Animal:detail.html.twig', array(
            'animaux'=>$animaux,'a'=>$user->getEmail(), 'b'=>$user->getUsername()

        ));
    }
    public function contactAction(Request $request)
    {
        $msg= new Message();
        $em = $this->getDoctrine()->getManager();
        if (isset($_POST['ajouter'])) {
            $msg->setSujet($request->get('sujet'));
            $msg->setContenu($request->get('contenu'));
            $msg->setDate(new \DateTime('now'));

            $em->persist($msg);
            $em->flush();
            return $this->redirectToRoute('contact');
        }
        return $this->render('RecBundle:Animal:contact.html.twig', array(

        ));
    }

    public function ajoutAction(Request $request)
    {

        $anim = new Animal();
        $em = $this->getDoctrine()->getManager();
        if (isset($_POST['ajout'])) {
            $anim->setImage("/PI3/web/img/".$request->get('image'));
            $anim->setWeight($request->get('poids'));
            $anim->setNickName($request->get('surnom'));
            $anim->setColor($request->get('couleur'));
            $anim->setGender($request->get('sexe'));
            $anim->setDescription($request->get('description'));
            $anim->setStatus('perdu');
            $anim->setIdUtilisateur($this->getUser()->getId());
            $em->persist($anim);
            $em->flush();
            return $this->redirectToRoute('ajout');
        }
        return $this->render('RecBundle:Animal:ajout.html.twig', array());
    }

    public function deleteAction($id)
    {
        $en = $this->getDoctrine()->getManager();
        $an = $en->getRepository(Animal::class)->find($id);
        $en->remove($an);
        $en->flush();
        return $this->redirectToRoute('afficherper');
    }


    public function updateAction(Request $request,$id){

        $em=$this->getDoctrine();
        $em=$this->getDoctrine()->getManager();
        $anim=$em->getRepository(Animal::class)->find($id);
        if (isset($_POST['modif'])) {
            $anim->setImage("/PI3/web/img/".$request->get('image'));
            $anim->setWeight($request->get('poids'));
            $anim->setNickName($request->get('surnom'));
            $anim->setColor($request->get('couleur'));
            $anim->setGender($request->get('sexe'));
            $anim->setDescription($request->get('description'));
            $em->flush();
            return $this->redirectToRoute('afficherper');
        }

        return $this->render('RecBundle:Animal:modif.html.twig', array(
            'anim'=>$anim
        ));

    }


    public function adminAction()
    {
        $em=$this->getDoctrine();
        $msg=$em->getRepository(Message::class)->findAll();
        return $this->render('RecBundle:Admin:message.html.twig', array(
            'msg'=>$msg

        ));
    }

    public function msgAction($id)
    {
        $em=$this->getDoctrine();
        $animaux=$em->getRepository(Message::class)->find($id);

        return $this->render('RecBundle:Admin:msgD.html.twig', array(
            'msg'=>$animaux
        ));
    }

    public function msgdelAction($id)
    {
        $en = $this->getDoctrine()->getManager();
        $an = $en->getRepository(Message::class)->find($id);
        $en->remove($an);
        $en->flush();
        return $this->redirectToRoute('admin');
    }
    public function gererAction()
    {
        $em=$this->getDoctrine();
        $animaux=$em->getRepository(Animal::class)->findByStatus('perdu');

        return $this->render('RecBundle:Admin:gererA.html.twig', array(
            'animaux'=>$animaux
        ));
    }

    public function admindelAction($id)
    {
        $en = $this->getDoctrine()->getManager();
        $an = $en->getRepository(Animal::class)->find($id);
        $en->remove($an);
        $en->flush();
        return $this->redirectToRoute('gererA');
    }


}
