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
     * @Route("/product/new", name="new_product")
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
        $form = $this->createForm(ProductType::class, $product, array(
            'action' => $this->generateUrl('new_product'),
            'method' => 'GET',
        ));
        $form->handleRequest($request);
        

        if ($form->isValid()) {
            
//            // $file stores the uploaded PDF file
//            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
//            $file = $product->getPicture();
//            // Generate a unique name for the file before saving it
//            $fileName = md5(uniqid()).'.'.$file->guessExtension();
//            // Move the file to the directory where pictures are stored
//            $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/pictures';
//            $file->move($brochuresDir, $fileName);
//
//            // Update the 'brochure' property to store the PDF file name
//            // instead of its contents
//            $product->setBrochure($fileName);            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->persist($productLocation);
            $em->flush();
        }
        
//        if($request->isXmlHttpRequest()) {
//            return json_encode($form->createView());
//        } else {        
            return $this->render('default/newProduct.html.twig', array(
                'form' => $form->createView(),
            )); 
//        }
    }
}


