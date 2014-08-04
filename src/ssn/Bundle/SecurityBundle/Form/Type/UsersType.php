<?php

namespace ssn\Bundle\SecurityBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use ssn\Bundle\SuperAdminBundle\Entity\Users;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('username', 'text');


        $builder->add('password', 'repeated', array(
           'first_name' => 'password',
           'second_name' => 'confirm',
           'type' => 'password',
        ));
            $builder->add('mail', 'text');

        $builder->add('birthday', 'birthday');
        $builder->add('city', 'text');
        $builder->add('country', 'text');
        $builder->add('country', 'text');
        $builder->add('phone', 'text');
        $builder->add('presentation', 'textarea');
        $builder->add('avatar', 'file');


    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ssn\Bundle\SuperAdminBundle\Entity\Users'
        ));
    }

    public function getName()
    {
        return 'users';
    }
}

?>