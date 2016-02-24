<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ProductType;
use AppBundle\Entity\Product\Product;
use AppBundle\Entity\Product\ProductLocation;

class ProductController extends Controller
{
    
    /**
     * @Route("/new-product", name="new_product")
     */
    public function newProductAction(Request $request)
    {
    // http://stackoverflow.com/questions/23409600/symfony2-dropdown-form-from-database    
        
        $product = new Product();
        $productLocation = new ProductLocation();
        $product->setProductLocation($productLocation);
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->persist($productLocation);
            $em->flush();
        }
        
        return $this->render('default/newProduct.html.twig', array(
            'form' => $form->createView(),
        ));       
    }
}


