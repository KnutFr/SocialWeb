<?php
namespace ssn\Bundle\SecurityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('users', new UsersType());
        $builder->add('terms', 'checkbox', array('property_path' => 'termsAccepted'));
    }

    public function getName()
    {
        return 'registration';
    }
}
?>