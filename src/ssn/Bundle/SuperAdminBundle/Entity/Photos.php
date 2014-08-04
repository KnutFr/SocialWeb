<?php

namespace ssn\Bundle\SuperAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Photos
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Photos
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
     * @Assert\File(maxSize="6000000", mimeTypes = { 
     *   "image/png", 
     *   "image/pjpeg", 
     *   "image/jpeg", 
     *   "image/gif" 
     * }) 
     *     mimeTypesMessage = "Please upload a valid img"
     */
    public $file;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    public function getAbsolutePath()
    {
      return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
      return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
      // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
      return __DIR__.'/../../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
      // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
      // le document/image dans la vue.
      return 'uploads/documents';
    }

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
     * @ORM\ManyToOne(targetEntity="Albums", inversedBy="photos", cascade={"refresh"})
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     */
    protected $album;

    /**
     * Set url
     *
     * @param string $url
     * @return Photos
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set album
     *
     * @param \ssn\Bundle\SuperAdminBundle\Entity\Albums $album
     * @return Photos
     */
    public function setAlbum(\ssn\Bundle\SuperAdminBundle\Entity\Albums $album = null)
    {
        $this->album = $album;
    
        return $this;
    }

    /**
     * Get album
     *
     * @return \ssn\Bundle\SuperAdminBundle\Entity\Albums 
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Photos
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

   /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // faites ce que vous voulez pour générer un nom unique
            $this->path = sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // s'il y a une erreur lors du déplacement du fichier, une exception
        // va automatiquement être lancée par la méthode move(). Cela va empêcher
        // proprement l'entité d'être persistée dans la base de données si
        // erreur il y a
        $this->file->move($this->getUploadRootDir(), $this->path);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

}