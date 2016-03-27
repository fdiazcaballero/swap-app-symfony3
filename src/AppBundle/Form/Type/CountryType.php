<?php
// src/AppBundle/Form/Type/ProductTaxonomyType.php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
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
                'label' => 'Country',
                'placeholder' => '',
            ));
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Location\Country',
        ));
    }
}

