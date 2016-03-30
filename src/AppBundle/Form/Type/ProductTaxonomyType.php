<?php
// src/AppBundle/Form/Type/ProductTaxonomyType.php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use AppBundle\Entity\Taxonomy\Category;

class ProductTaxonomyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('category', EntityType::class, array(
                'choice_label' => 'name',
                'class' => 'AppBundle:Taxonomy\Category',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->where('c.isActive=1');
                },
                'expanded' => false,
                'multiple' => false,
                'label' => 'Category',
                'placeholder' => '  --    None    --  ',
            ));
            ;
            
            $builder->add('subCategory', EntityType::class, array(
                'choice_label' => 'name',
                'class' => 'AppBundle:Taxonomy\SubCategory',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->where('c.isActive=1');
                },
                'expanded' => false,
                'multiple' => false,
                'label' => 'Sub-CatI',
                'placeholder' => '  --    None    --  ',
                'required' => false,
            ));
            ;
            
            $builder->add('subSubCategory', EntityType::class, array(
                'choice_label' => 'name',
                'class' => 'AppBundle:Taxonomy\SubsubCategory',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->where('c.isActive=1');
                },
                'expanded' => false,
                'multiple' => false,
                'label' => 'Sub-CatII',
                'placeholder' => '  --    None    --  ',
                'required' => false,
            ));
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product\ProductTaxonomy',
        ));
    }
}