<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Publication
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="publications", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="publication", cascade={"remove", "persist"})
     */
    protected $comments;


    /**
     * @ORM\OneToMany(targetEntity="Feels", mappedBy="publication", cascade={"remove", "persist"})
     */
    protected $feels;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Publication
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Publication
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Access", inversedBy="publications", cascade={"remove"})
     * @ORM\JoinColumn(name="access_id", referencedColumnName="id")
     */
    protected $access;

    /**
     * Set access
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Access $access
     * @return Publication
     */
    public function setAccess(\ssn\Bundle\SuperAdminBundle\Entity\Access $access = null)
    {
        $this->access = $access;
    
        return $this;
    }

    /**
     * Get access
     *
     * @return \ssn\Bundle\SuperAdminBundle\Entity\Access 
     */
    public function getAccess()
    {
        return $this->access;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set user
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Users $user
     * @return Publication
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
     * Add comments
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Comments $comments
     * @return Publication
     */
    public function addComment(\ssn\Bundle\SuperAdminBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Comments $comments
     */
    public function removeComment(\ssn\Bundle\SuperAdminBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add feels
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Feels $feels
     * @return Publication
     */
    public function addFeel(\ssn\Bundle\SuperAdminBundle\Entity\Feels $feels)
    {
        $this->feels[] = $feels;
    
        return $this;
    }

    /**
     * Remove feels
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Feels $feels
     */
    public function removeFeel(\ssn\Bundle\SuperAdminBundle\Entity\Feels $feels)
    {
        $this->feels->removeElement($feels);
    }

    /**
     * Get feels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeels()
    {
        return $this->feels;
    }
}