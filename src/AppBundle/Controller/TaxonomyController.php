<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ProductType;
use AppBundle\Entity\Product\Product;
use AppBundle\Entity\Product\ProductLocation;
use AppBundle\Entity\Product\ProductTaxonomy;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Taxonomy controller.
 * @Route("/taxonomy")
*/
class TaxonomyController extends Controller
{
    
    /**
     * 
     * AjaxGetSubCategoriesForm Action
     * 
     * @Route("/ajax/get_sub_categories_form", name="get_sub_categories_form", options={"expose"=true}, condition="request.isXmlHttpRequest()")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function productAjaxGetSubCategoriesFormAction(Request $request)
    {   
        try{
        $em = $this->getDoctrine()->getManager();
        $subcategories = $em->getRepository('AppBundle:Taxonomy\SubCategory')
            ->findByParentId($request->request->get('parent', '1'));
        $response=['data' => $subcategories , 'is_success' => true];
        }
        catch(Exception $e){
            $response=['data' =>$e, 'is_success' => false];
        }
        return new JsonResponse($response);
    }
    
    /**
     * 
     * AjaxGetSubsubCategoriesForm Action
     * 
     * @Route("/ajax/get_subsub_categories_form", name="get_subsub_categories_form", options={"expose"=true}, condition="request.isXmlHttpRequest()")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function productAjaxGetSubsubCategoriesFormAction(Request $request)
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $sub_sub_categories = $em->getRepository('AppBundle:Taxonomy\SubsubCategory')
                ->findByParentId($request->request->get('parent', '1'));
            $response=['data' => $sub_sub_categories , 'is_success' => true];
        }
        catch(Exception $e){
            $response=['data' =>$e, 'is_success' => false];
        }
        return new JsonResponse($response);
    }  
    
    /**
     * 
     * AjaxGetSubsubsubCategoriesForm Action
     * 
     * @Route("/ajax/get_subsubsub_categories_form", name="get_subsubsub_categories_form", options={"expose"=true}, condition="request.isXmlHttpRequest()")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function productAjaxGetSubsubsubCategoriesFormAction(Request $request)
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $sub_sub_categories = $em->getRepository('AppBundle:Taxonomy\SubsubsubCategory')
                ->findByParentId($request->request->get('parent', '1'));
            $response=['data' => $sub_sub_categories , 'is_success' => true];
        }
        catch(Exception $e){
            $response=['data' =>$e, 'is_success' => false];
        }
        return new JsonResponse($response);
    }    
    
    /**
     * 
     * AjaxGetFurthersubCategoriesForm Action
     * 
     * @Route("/ajax/get_furthersub_categories_form", name="get_furthersub_categories_form", options={"expose"=true}, condition="request.isXmlHttpRequest()")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function productAjaxGetFurthersubCategoriesFormAction(Request $request)
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $sub_sub_categories = $em->getRepository('AppBundle:Taxonomy\FurtherSubCategory')
                ->findByParentId($request->request->get('parent', '1'));
            $response=['data' => $sub_sub_categories , 'is_success' => true];
        }
        catch(Exception $e){
            $response=['data' =>$e, 'is_success' => false];
        }
        return new JsonResponse($response);
    }    
    
}

