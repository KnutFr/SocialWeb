<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comments
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
     * @ORM\ManyToOne(targetEntity="Publication", inversedBy="comments", cascade={"remove"})
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     */
    protected $publication;

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
     * @return Comments
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
     * Set publication
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Publication $publication
     * @return Comments
     */
    public function setPublication(\ssn\Bundle\SuperAdminBundle\Entity\Publication $publication = null)
    {
        $this->publication = $publication;
    
        return $this;
    }

    /**
     * Get publication
     *
     * @return \ssn\Bundle\SuperAdminBundle\Entity\Publication 
     */
    public function getPublication()
    {
        return $this->publication;
    }
}