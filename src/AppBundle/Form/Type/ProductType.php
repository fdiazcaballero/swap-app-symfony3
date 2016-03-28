<?php

// src/AppBundle/Form/Type/ProductType.php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Product\ProductCondition;
use AppBundle\Entity\Product\ProductLocation;
use AppBundle\Entity\Product\ProductTaxonomy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Form\Type\VichImageType;
//use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //http://symfony.com/doc/current/reference/forms/types/entity.html
        $builder
            ->add('name')
            ->add('description')            
            ->add('productCondition', EntityType::class, array(
                'choice_label' => 'name',
                'class' => 'AppBundle:Product\ProductCondition',
                'expanded' => false,
                'multiple' => false,
                'label' => 'Condition'
            ))
            ->add('imageFile', VichImageType::class, array(
            'required'      => false,
            'allow_delete'  => true, // not mandatory, default is true
            'download_link' => true, // not mandatory, default is true
            ))   
            ->add('productLocation', ProductLocationType::class)
            ->add('productTaxonomy', ProductTaxonomyType::class)
            ->add('save', SubmitType::class)
        ;
    }
}