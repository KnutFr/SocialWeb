<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feels
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Feels
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
     * @var boolean
     *
     * @ORM\Column(name="thumbup", type="boolean")
     */
    private $thumbup;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ththumbdown", type="boolean")
     */
    private $thumbdown;

    /**
     * @ORM\ManyToOne(targetEntity="Publication", inversedBy="feels", cascade={"remove"})
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     */
    protected $publication;

    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="feels", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

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
     * Set thumbup
     *
     * @param boolean $thumbup
     * @return Feels
     */
    public function setThumbup($thumbup)
    {
        $this->thumbup = $thumbup;
    
        return $this;
    }

    /**
     * Get thumbup
     *
     * @return boolean 
     */
    public function getThumbup()
    {
        return $this->thumbup;
    }

    /**
     * Set ththumbdown
     *
     * @param boolean $ththumbdown
     * @return Feels
     */
    public function setThthumbdown($ththumbdown)
    {
        $this->ththumbdown = $ththumbdown;
    
        return $this;
    }

    /**
     * Get ththumbdown
     *
     * @return boolean 
     */
    public function getThthumbdown()
    {
        return $this->ththumbdown;
    }

    /**
     * Set publication
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Publication $publication
     * @return Feels
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

    /**
     * Set user
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Users $user
     * @return Feels
     */
    public function setUser(\ssn\Bundle\SuperAdminBundle\Entity\Users $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \ssn\Bundle\SuperAdminBundle\Entity\Users 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set thumbdown
     *
     * @param boolean $thumbdown
     * @return Feels
     */
    public function setThumbdown($thumbdown)
    {
        $this->thumbdown = $thumbdown;
    
        return $this;
    }

    /**
     * Get thumbdown
     *
     * @return boolean 
     */
    public function getThumbdown()
    {
        return $this->thumbdown;
    }
}