<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="typeSalle", type="string", length=50)
     */
    private $typeSalle;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Enseignant")
   * @ORM\JoinColumn(nullable=false)
   */
   private $enseignant;
   
	/**
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Module")
   * @ORM\JoinColumn(nullable=false)
   */
   private $module;
   
	public function __construct()
	  {
		$this->date = new \DateTime;
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
     * Set type
     *
     * @param string $type
     * @return Cours
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set typeSalle
     *
     * @param string $typeSalle
     * @return Cours
     */
    public function setTypeSalle($typeSalle)
    {
        $this->typeSalle = $typeSalle;
    
        return $this;
    }

    /**
     * Get typeSalle
     *
     * @return string 
     */
    public function getTypeSalle()
    {
        return $this->typeSalle;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Cours
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    
        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }
	
    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Cours
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
     * Set Enseignant
     *
     * @param \Gadi\SiteBundle\Entity\Enseignant $enseignant
     * @return Enseignant
     */
    public function setEnseignant(\Gadi\SiteBundle\Entity\Enseignant $enseignant)
    {
        $this->enseignant = $enseignant;
    
        return $this;
    }

    /**
     * Get Enseignant
     *
     * @return \Gadi\SiteBundle\Entity\Enseignant 
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }
	
    /**
     * Set Module
     *
     * @param \Gadi\SiteBundle\Entity\Module $module
     * @return Module
     */
    public function setModule(\Gadi\SiteBundle\Entity\Module $module)
    {
        $this->module = $module;
    
        return $this;
    }

    /**
     * Get Module
     *
     * @return \Gadi\SiteBundle\Entity\Module 
     */
    public function getModule()
    {
        return $this->module;
    }
}
