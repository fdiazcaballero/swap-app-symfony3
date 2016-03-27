<?php
// src/AppBundle/Form/Type/ProductLocationType.php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use AppBundle\Entity\Location\Country;

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
                'label' => 'Country',
                'placeholder' => '  --    None    --  ',
            ));
            ;
            
        $formModifier = function (FormInterface $form, Country $country = null) {
            $states = null === $country ? array() : $country->getStates();

            $form->add('state', EntityType::class, array(
                'choice_label' => 'name',
                'class'       => 'AppBundle:Location\State',
                'placeholder' => '  --    None    --  ',
                'choices'     => $states,
                'label' => 'County',
                'required' => false,
            ));
        };
        
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getCountry());
            }
        );
        
        $builder->get('country')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $country = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $country);
            }
        );
            
//            ->add('state', EntityType::class, array(
//                'choice_label' => 'name',
//                'class' => 'AppBundle:Location\State',
//                'query_builder' => function (EntityRepository $er) {
//                    return $er->createQueryBuilder('c')
//                        ->where('1=1');
//                },
//                'expanded' => false,
//                'multiple' => false,
//                'label' => 'County'
//            ));
    }   

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product\ProductLocation',
        ));
    }
}