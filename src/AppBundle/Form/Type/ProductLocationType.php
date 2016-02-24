<?php
// src/AppBundle/Form/Type/ProductLocationType.php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class ProductLocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {                  
        $builder->add('country', EntityType::class, array(
                'choice_label' => 'name',
                'class' => 'AppBundle:Location\Country',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->where('c.isActive=1');
                },
                'expanded' => false,
                'multiple' => false,
                'label' => 'Country'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product\ProductLocation',
        ));
    }
}