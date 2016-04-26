<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ProductType;
use AppBundle\Entity\Product\Product;
use AppBundle\Entity\Product\ProductLocation;
use AppBundle\Entity\Product\ProductTaxonomy;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Product controller.
 * @Route("/product")
*/
class ProductController extends Controller
{
    
    /**
     * 
     * Index Action
     * 
     * @Route("/new", name="admin_product_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function newAction(Request $request)
    {
    // http://stackoverflow.com/questions/23409600/symfony2-dropdown-form-from-database    
        
//        This is another way of doing      * @Security("is_granted('IS_AUTHENTICATED_FULLY')")   
//        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
//            throw $this->createAccessDeniedException();
//        }

        $user = $this->getUser();
        $product = new Product();
        $productLocation = new ProductLocation();
        $productTaxonomy = new ProductTaxonomy();
        $product->setProductLocation($productLocation);
        $product->setProductTaxonomy($productTaxonomy);
        $product->setUser($user);
        $form = $this->createForm(ProductType::class, $product, array(
            'action' => $this->generateUrl('new_product'),
        ));
        $form->handleRequest($request);
        

        if ($form->isValid()) {
                      
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->persist($productLocation);
            $em->persist($productTaxonomy);
            $em->flush();
            return $this->redirectToRoute('blog_index');
        }
        
//        if($request->isXmlHttpRequest()) {
//            return json_encode($form->createView());
//        } else {        
            return $this->render('admin/blog/new.html.twig', array(
                'form' => $form->createView(),
            )); 
//        }
    }  
    
    /**
     * @Route("/", defaults={"page": 1}, name="blog_index")
     * @Route("/page/{page}", requirements={"page": "[1-9]\d*"}, name="blog_index_paginated")
     * @Method("GET")
     * @Cache(smaxage="10")
     */
    public function indexAction($page)
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Product\Product')->findLatest($page);

        return $this->render('admin/blog//index.html.twig', array('products' => $products));
    }
    
   /**
     * Displays a form to edit an existing Product entity.
     *
     * @Route("/{id}/edit", requirements={"id": "\d+"}, name="admin_product_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Product $product, Request $request)
    {
//        if (null === $this->getUser() || !$product->isOwner($this->getUser())) {
//            throw $this->createAccessDeniedException('Products can only be edited by their authors.');
//        }

        $entityManager = $this->getDoctrine()->getManager();

        $editForm = $this->createForm('AppBundle\Form\Type\ProductType', $product);
        $deleteForm = $this->createDeleteForm($product);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $product->setSlug($this->get('slugger')->slugify($product->getTitle()));
            $entityManager->flush();

            $this->addFlash('success', 'Product Updated Successfully');

            return $this->redirectToRoute('blog_index');
        }

        return $this->render('admin/blog/edit.html.twig', array(
            'product'        => $product,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Product entity.
     *
     * @Route("/{id}", name="admin_product_delete")
     * @Method("DELETE")
     * @Security("product.isOwner(user)")
     *
     * The Security annotation value is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the AppBundle\Entity\Product entity.
     */
    public function deleteAction(Request $request, Product $product)
    {
        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->remove($product);
            $entityManager->flush();

//            $this->addFlash('success', 'product.deleted_successfully');
        }

//        return $this->redirectToRoute('admin_product_index');
        return $this->redirectToRoute('blog_index');
    }

    /**
     * Creates a form to delete a Product entity by id.
     *
     * This is necessary because browsers don't support HTTP methods different
     * from GET and POST. Since the controller that removes the blog products expects
     * a DELETE method, the trick is to create a simple form that *fakes* the
     * HTTP DELETE method.
     * See http://symfony.com/doc/current/cookbook/routing/method_parameters.html.
     *
     * @param Product $product The product object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Product $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_product_delete', array('id' => $product->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
     /**
     * Finds and displays a Product entity.
     *
     * @Route("/{id}", requirements={"id": "\d+"}, name="admin_product_show")
     * @Method("GET")
     */
    public function showAction(Product $product)
    {
        // This security check can also be performed:
        //   1. Using an annotation: @Security("post.isAuthor(user)")
        //   2. Using a "voter" (see http://symfony.com/doc/current/cookbook/security/voters_data_permission.html)
//        if (null === $this->getUser() || !$post->isOwner($this->getUser())) {
//            throw $this->createAccessDeniedException('Posts can only be shown to their authors.');
//        }

        $deleteForm = $this->createDeleteForm($product);

        return $this->render('admin/blog/show.html.twig', array(
            'product'        => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
}


