<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\CommandLine;

use ShopBundle\Entity\Product;
use ShopBundle\Entity\test;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CommandLineController extends Controller
{
    public function  AddLineAction($id)
    {

        $em=$this->getDoctrine();

        $product=$em->getRepository(Product::class)->find($id);
        $l=$em->getRepository(test::class)->proExiste(0,$product->getIdProduct());

       if($l==null)
       {
           $line=new CommandLine();
           $line->setQuantity(1);
           $line->setPoductId($product->getIdProduct());
           $line->setOrderId(0);
           $line->setImage($product->getImage());
           $line->setPrice($product->getPrice());
           $line->setName($product->getName());

           $product->setQuantity($product->getQuantity()-1);

           $em->getManager()->persist($line);

       }
       else
       {
           foreach($l as $li)
           {
               $li->setQuantity($li->getQuantity()+1);

           }
           $product->setQuantity($product->getQuantity()-1);

       }

        $em->getManager()->flush();

        return $this->redirectToRoute('_show_line');

    }

    public function ShowLineAction()
    {
        $em=$this->getDoctrine();
        $lines=$em->getRepository(test::class)->showCart(0);

        $p=0;
        foreach ($lines as $line)
        {
            $total=$line->getQuantity()*$line->getPrice();
            $p=$p+$total;

        }


        return $this->render('ShopBundle:CommandLine:add_line_cart.html.twig', array(
            'lines'=>$lines

        ));

    }

    public function UpdateLineAction($id,$body)
    {
        $em=$this->getDoctrine()->getManager();
        $line=$em->getRepository(CommandLine::class)->find($id);
        $line->setQuantity($body);
        $em->flush();

        $newPrice=$line->getPrice()*$body;

        $product=$em->getRepository(Product::class)->findByName($line->getName());

        foreach ($product as $p)
        {
            if($body>$p->getQuantity())
            {
                $line->setQuantity(1);
                $em->flush();
                $i=1;
            }
            else {$i=0;}
        }


        return new JsonResponse(array("newPrice"=>$newPrice,"i"=>$i,"price"=>$line->getPrice()));
       // return $this->redirectToRoute('_show_line');



    }

    public function DeleteLineAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $line=$em->getRepository(CommandLine::class)->find($id);

        $em->remove($line);
        $em->flush();

        return $this->redirectToRoute('_show_line');
    }
}
