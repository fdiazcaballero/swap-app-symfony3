<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ProductType;
use AppBundle\Entity\Product\Product;
use AppBundle\Entity\Product\ProductLocation;
use AppBundle\Entity\User;

class ProductController extends Controller
{
    
    /**
     * @Route("/new-product", name="new_product")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function newProductAction(Request $request)
    {
    // http://stackoverflow.com/questions/23409600/symfony2-dropdown-form-from-database    
        
//        This is another way of doing      * @Security("is_granted('IS_AUTHENTICATED_FULLY')")   
//        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
//            throw $this->createAccessDeniedException();
//        }

        $user = $this->getUser();
        $product = new Product();
        $productLocation = new ProductLocation();
        $product->setProductLocation($productLocation);
        $product->setUser($user);
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


