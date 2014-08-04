<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achieved
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Achieved
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
     * @ORM\Column(name="dateof", type="datetime")
     */
    private $dateof;

    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="achieveds", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToOne(targetEntity="Achievements", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="achievement_id", referencedColumnName="id")
     */
    private $achievement;

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
     * Set dateof
     *
     * @param \DateTime $dateof
     * @return Achieved
     */
    public function setDateof($dateof)
    {
        $this->dateof = $dateof;
    
        return $this;
    }

    /**
     * Get dateof
     *
     * @return \DateTime 
     */
    public function getDateof()
    {
        return $this->dateof;
    }

    /**
     * Set user
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\User $user
     * @return Achieved
     */
    public function setUser(\ssn\Bundle\SuperAdminBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \ssn\Bundle\SuperAdminBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set achievement
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Achievements $achievement
     * @return Achieved
     */
    public function setAchievement(\ssn\Bundle\SuperAdminBundle\Entity\Achievements $achievement = null)
    {
        $this->achievement = $achievement;
    
        return $this;
    }

    /**
     * Get achievement
     *
     * @return \ssn\Bundle\SuperAdminBundle\Entity\Achievements 
     */
    public function getAchievement()
    {
        return $this->achievement;
    }
}