<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Access
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Access
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @ORM\OneToMany(targetEntity="Publication", mappedBy="access", cascade={"remove", "persist"})
     */
    protected $publications;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Access
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->publications = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add publications
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Publication $publications
     * @return Access
     */
    public function addPublication(\ssn\Bundle\SuperAdminBundle\Entity\Publication $publications)
    {
        $this->publications[] = $publications;
    
        return $this;
    }

    /**
     * Remove publications
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Publication $publications
     */
    public function removePublication(\ssn\Bundle\SuperAdminBundle\Entity\Publication $publications)
    {
        $this->publications->removeElement($publications);
    }

    /**
     * Get publications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPublications()
    {
        return $this->publications;
    }
}