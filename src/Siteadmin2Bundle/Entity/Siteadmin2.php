<?php

namespace Siteadmin2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siteadmin2
 */
class Siteadmin2
{
    public $file;

    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->image1 ? null : $this->getUploadDir().'/'.$this->image1;
        return null === $this->image2 ? null : $this->getUploadDir().'/'.$this->image2;
        return null === $this->image3 ? null : $this->getUploadDir().'/'.$this->image3;
    }

    public function getAbsolutePath()
    {
        return null === $this->image1 ? null : $this->getUploadRootDir().'/'.$this->image1;
        return null === $this->image2 ? null : $this->getUploadRootDir().'/'.$this->image2;
        return null === $this->image3 ? null : $this->getUploadRootDir().'/'.$this->image3;
    }

    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image1 = uniqid().'.'.$this->file->guessExtension();
            $this->image2 = uniqid().'.'.$this->file->guessExtension();
            $this->image3 = uniqid().'.'.$this->file->guessExtension();
        }
    }

    public function upload()
    {
        if (null === $this->file) {
            return;
        }
        $this->file->move($this->getUploadRootDir(), $this->image1);
        $this->file->move($this->getUploadRootDir(), $this->image3);
        $this->file->move($this->getUploadRootDir(), $this->image3);

        unset($this->file);

    }


    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    /** fin maj lq */
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $image1;

    /**
     * @var string
     */
    private $image2;

    /**
     * @var string
     */
    private $image3;


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
     * Set name
     *
     * @param string $name
     * @return Siteadmin2
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
     * Set image1
     *
     * @param string $image1
     * @return Siteadmin2
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * Get image1
     *
     * @return string 
     */
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * Set image2
     *
     * @param string $image2
     * @return Siteadmin2
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * Get image2
     *
     * @return string 
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set image3
     *
     * @param string $image3
     * @return Siteadmin2
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * Get image3
     *
     * @return string 
     */
    public function getImage3()
    {
        return $this->image3;
    }
    
}
