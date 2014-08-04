<?php

namespace ssn\Bundle\SecurityBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use ssn\Bundle\SecurityBundle\Entity\Users;

class Registration
{
    /**
     * @Assert\Type(type="ssn\Bundle\SecurityBundle\Entity\Users")
     */
    protected $users;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setUsers(Users $user)
    {
        $this->users = $user;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}

?>