<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Users
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Users implements AdvancedUserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255,nullable=true)
     */
    private $avatar;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime")
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="string", length=255,nullable=true)
     */
    private $presentation;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="Achieved", mappedBy="user", cascade={"remove", "persist"})
     */
    protected $achieveds;

    /**
     * @ORM\OneToMany(targetEntity="Publication", mappedBy="user", cascade={"remove", "persist"})
     */
    protected $publications;

    /**
     * @ORM\OneToMany(targetEntity="Albums", mappedBy="user", cascade={"remove", "persist"})
     */
    protected $albums;

    /**
     * @ORM\OneToMany(targetEntity="Friends", mappedBy="user", cascade={"remove", "persist"})
     */
    protected $friends;

    /**
     * @ORM\OneToMany(targetEntity="Feels", mappedBy="user", cascade={"remove", "persist"})
     */
    protected $feels;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
    * @var string
    * @ORM\Column(name="role", type="string", length=32)
    */
    private $role;


   /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

  public function __sleep()
    {
        return array('id');
    }
    /**
     * Set login
     *
     * @param string $login
     * @return Users
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Users
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Users
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Users
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    public function isActive(){
        return $isActive;
    }

    
    public function setIsActive($active){
        $this->isActive = $active;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Users
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Users
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->achieveds = new \Doctrine\Common\Collections\ArrayCollection();
           $this->salt = md5(uniqid(null, true));

    }
    
    /**
     * Add achieveds
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Achieved $achieveds
     * @return Users
     */
    public function addAchieved(\ssn\Bundle\SuperAdminBundle\Entity\Achieved $achieveds)
    {
        $this->achieveds[] = $achieveds;
    
        return $this;
    }

    /**
     * Remove achieveds
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Achieved $achieveds
     */
    public function removeAchieved(\ssn\Bundle\SuperAdminBundle\Entity\Achieved $achieveds)
    {
        $this->achieveds->removeElement($achieveds);
    }

    /**
     * Get achieveds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAchieveds()
    {
        return $this->achieveds;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add publications
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Publication $publications
     * @return Users
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


    /**
     * Add albums
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Albums $albums
     * @return Users
     */
    public function addAlbum(\ssn\Bundle\SuperAdminBundle\Entity\Albums $albums)
    {
        $this->albums[] = $albums;
    
        return $this;
    }

    /**
     * Remove albums
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Albums $albums
     */
    public function removeAlbum(\ssn\Bundle\SuperAdminBundle\Entity\Albums $albums)
    {
        $this->albums->removeElement($albums);
    }

    /**
     * Get albums
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * Add friends
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Friends $friends
     * @return Users
     */
    public function addFriend(\ssn\Bundle\SuperAdminBundle\Entity\Friends $friends)
    {
        $this->friends[] = $friends;
    
        return $this;
    }

    /**
     * Remove friends
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Friends $friends
     */
    public function removeFriend(\ssn\Bundle\SuperAdminBundle\Entity\Friends $friends)
    {
        $this->friends->removeElement($friends);
    }

    /**
     * Get friends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriends()
    {
        return $this->friends;
    }


    public function getSalt()
    {
        return $this->salt;
    }
  
   /**
     * Get role
     *
     * @return string 
     */
    public function getUserRoles()
    {
        return $this->role;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRoles()
    {
        $r = array($this->getUserRoles());
        return $r;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Users
     */
    public function setRoles($role){
        $this->role = $role;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     * @return Users
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    
        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Users
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Users
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    
        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }



    public function isCredentialsNonExpired(){
        return true;
    }

    public function isAccountNonLocked(){
        return true;
    }

    public function isAccountNonExpired(){
        return true;
    }

    public function isEnabled(){
        return true;    
    }

     public function getAbsolutePath()
    {
        return null === $this->avatar ? null : $this->getUploadRootDir().'/'.$this->avatar;
    }

    public function getWebPath()
    {
        return null === $this->avatar ? null : $this->getUploadDir().'/'.$this->avatar;
    }

    protected function getUploadRootDir()
    {
        return '.'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads/documents';
    }

    /**
     */
    protected $file;


    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add feels
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Feels $feels
     * @return Users
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

    /**
     * Set name
     *
     * @param string $name
     * @return Users
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Users
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Users
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
}