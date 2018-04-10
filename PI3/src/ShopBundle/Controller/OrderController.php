<?php

namespace ShopBundle\Controller;

use Proxies\__CG__\UserBundle\Entity\User;
use ShopBundle\Entity\Commande;
use ShopBundle\Entity\Order;
use ShopBundle\Entity\test;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OrderController extends Controller
{

    public function AddOrderAction()
    {
        $em=$this->getDoctrine()->getManager();
        $lines=$em->getRepository(test::class)->showCart(0);

        $p=0;
        foreach ($lines as $line)
        {
            $total=$line->getQuantity()*$line->getPrice();
            $p=$p+$total;


        }





        $o=new Commande();
        if($this->getUser()==null)
        {
            $lines=$em->getRepository(test::class)->showCart(0);

            $p=0;
            foreach ($lines as $line)
            {
                $total=$line->getQuantity()*$line->getPrice();
                $p=$p+$total;

            }
            echo "<script  type=\"text/javascript\">"
                . "alert(\" connectez-vous! \");"
                . "</script>";

            return $this->render('ShopBundle:CommandLine:add_line_cart.html.twig', array(
                'lines'=>$lines
            ));
        }
        else
        {
            $o->setPrice($p);
            $o->setIduser($this->getUser()->getId());
            $o->setDate(new \DateTime());


            $em->persist($o);
            $em->flush();



            foreach ($lines as $line)
            {
                $line->setOrderId($o->getId());
                $em->flush();
            }

        }








        return $this->render('ShopBundle:Order:Payment.html.twig', array(
            'prixTotal'=>$p
        ));

    }


}
