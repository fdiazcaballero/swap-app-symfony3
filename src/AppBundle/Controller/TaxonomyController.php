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

class TaxonomyController extends Controller
{
    /**
     * @Route("/taxonomy/ajax/get_sub_sub_categories_form", name="get_sub_sub_categories_form")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function productAjaxGetSubSubCategoriesFormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $subcategories = $em->getRepository('AppBundle:Taxonomy\SubsubCategory')
            ->findByParentId($request->request->get('parent', '1'));
        
        if ($request->isXMLHttpRequest()) {         
            return new JsonResponse(array('data' => $subcategories , 'is_success' => true));
        }

        return new Response('This is not ajax!', 400);
    }
}

