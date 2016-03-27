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
use AppBundle\Entity\Location\State;

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
            
        $formModifierCountry = function (FormInterface $form, Country $country = null) {
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
        
//        $formModifierState = function (FormInterface $form, State $state = null) {
//            $cities = null === $state ? array() : $state->getCities();
//
//            $form->add('city', EntityType::class, array(
//                'choice_label' => 'name',
//                'class'       => 'AppBundle:Location\City',
//                'placeholder' => '  --    None    --  ',
//                'choices'     => $cities,
//                'label' => 'City',
//                'required' => false,
//            ));
//        };
        
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifierCountry) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifierCountry($event->getForm(), $data->getCountry());
            }
//        )
//        ->addEventListener(
//            FormEvents::PRE_SET_DATA,
//            function (FormEvent $event) use ($formModifierState) {
//                // this would be your entity, i.e. SportMeetup
//                $data = $event->getData();
//
//                $formModifierState($event->getForm(), $data->getState());
//            }
        );
        
        $builder->get('country')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifierCountry) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $country = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifierCountry($event->getForm()->getParent(), $country);
            }
        );
        
//        $builder->get('state')->addEventListener(
//            FormEvents::POST_SUBMIT,
//            function (FormEvent $event) use ($formModifierState) {
//                // It's important here to fetch $event->getForm()->getData(), as
//                // $event->getData() will get you the client data (that is, the ID)
//                $state = $event->getForm()->getData();
//
//                // since we've added the listener to the child, we'll have to pass on
//                // the parent to the callback functions!
//                $formModifierState($event->getForm()->getParent(), $state);
//            }
//        );
            

    }   

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product\ProductLocation',
        ));
    }
}