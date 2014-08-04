<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friends
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Friends
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
     * @var \DateTime
     *
     * @ORM\Column(name="begin", type="datetime")
     */
    private $begin;

    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="friends", cascade={"refresh"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Users", cascade={"refresh"})
     * @ORM\JoinColumn(name="friendwith", referencedColumnName="id")
     */
    protected $friendwith;

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
     * Set begin
     *
     * @param \DateTime $begin
     * @return Friends
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;
    
        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime 
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set user
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Users $user
     * @return Friends
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
     * Set friendwith
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Users $friendwith
     * @return Friends
     */
    public function setFriendwith(\ssn\Bundle\SuperAdminBundle\Entity\Users $friendwith = null)
    {
        $this->friendwith = $friendwith;
    
        return $this;
    }

    /**
     * Get friendwith
     *
     * @return \ssn\Bundle\SuperAdminBundle\Entity\Users 
     */
    public function getFriendwith()
    {
        return $this->friendwith;
    }
}