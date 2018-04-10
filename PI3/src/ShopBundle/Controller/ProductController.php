<?php

namespace ShopBundle\Controller;

use BaseBundle\Entity\Rating;
use ShopBundle\Entity\Product;
use ShopBundle\Entity\test;
use ShopBundle\Form\GarderieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function aaAction()
    {


            if ($this->getUser()->getId()==1)
            {
                return $this->redirectToRoute('_show_stock');
            }
            else
            {
                return $this->redirectToRoute('_show_product');
            }



    }
    public function ShowProductAction()
    {

        $em=$this->getDoctrine()->getRepository(Product::class);
        $products=$em->findAll();

        return $this->render('ShopBundle:Product:show_product.html.twig', array(
            'products'=>$products,'rating', RatingType::class, [

                'stars' => 4,

            ]
        ));

    }

    public function ShowProductByPriceDAction()
    {
        $em=$this->getDoctrine()->getRepository(test::class);
        $products=$em->filterPriceD();
        return $this->render('ShopBundle:Product:show_product.html.twig', array(
            'products'=>$products,'rating', RatingType::class, [

                'stars' => 4,

            ]
        ));
    }

    public function ShowProductByPriceAAction()
    {
        $em=$this->getDoctrine()->getRepository(test::class);
        $products=$em->filterPriceA();
        return $this->render('ShopBundle:Product:show_product.html.twig', array(
            'products'=>$products,'rating', RatingType::class, [

                'stars' => 4,

            ]
        ));
    }

    public function ShowProductByRatingAction()
    {
        $em=$this->getDoctrine()->getRepository(test::class);
        $products=$em->filterRating();
        return $this->render('ShopBundle:Product:show_product.html.twig', array(
            'products'=>$products,'rating', RatingType::class, [

                'stars' => 4,

            ]
        ));
    }

    public function ShowSingleProductAction($id,Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $product=$em->getRepository(Product::class)->find($id);

        $form=$this->createForm(GarderieType::class,$product);
        $rating=new Rating();

        if($form->handleRequest($request)->isValid())
        {
            $y=$product->getRating();

            $rating->setRate($y);
            $rating->setIdUser($this->getUser()->getId());
            $rating->setIdProduct($id);

           // $product->setRating($em->getRepository(test::class)->moyRate($id));
            var_dump($em->getRepository(test::class)->moyRate($id));

            $em->persist($rating);
            $em->flush();

        }
        return $this->render('ShopBundle:Product:show_single_product.html.twig', array(
            'product'=>$product,'form'=>$form->createView()
        ));

    }
    public function AddProductAction(Request $request)
    {
        $product=new Product();
        $product->setDescription($request->request->get('description'));
        $product->setName($request->request->get('nom'));
        $product->setPrice($request->request->get('prix'));
        $product->setQuantity($request->request->get('quantite'));
        $product->setType($request->request->get('type'));
        $product->setImage($request->request->get('image'));

        if(isset($_POST['save']))
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('_show_stock');
        }
        return $this->render('ShopBundle:Product:add_product.html.twig', array(
            // ...
        ));
    }

    public function ShowStockAction()
    {
        $em=$this->getDoctrine()->getRepository(Product::class);
        $products=$em->findAll();

        return $this->render('ShopBundle:Product:show_stock.html.twig', array(
          'products'=>$products
        ));
    }

    public function DeleteProductAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $product=$em->getRepository(Product::class)->find($id);

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('_show_stock');
    }

    public function UpdateProductAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $product=$em->getRepository(Product::class)->find($id);



        if(isset($_POST['save']))
        {
            $product->setDescription($request->request->get('description'));
            $product->setName($request->request->get('nom'));
            $product->setPrice($request->request->get('prix'));
            $product->setQuantity($request->request->get('quantite'));
            $product->setType($request->request->get('type'));
            if($request->request->get('img')==null)
            {
                $product->setImage($request->request->get('image'));
            }
            else
            {
                $product->setImage($request->request->get('img'));
            }

            $em=$this->getDoctrine()->getManager();
            $em->flush();


            return $this->redirectToRoute('_show_stock');
        }



        return $this->render('ShopBundle:Product:update_product.html.twig', array(
            'product'=>$product
        ));
    }

}
