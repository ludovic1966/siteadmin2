<?php

namespace Siteadmin2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Siteadmin2Type extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','textarea', array('attr' => array('rows' => '2')))
            ->add('image1')
            ->add('file', 'file', array('multiple' => true, 'data_class' => null,))


        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Siteadmin2Bundle\Entity\Siteadmin2'
        ));
    }
}
