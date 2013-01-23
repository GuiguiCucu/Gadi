<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationModule
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\EvaluationModuleRepository")
 */
class EvaluationModule
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer")
     */
    private $coefficient;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;
	
  	/**
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Semestre")
   * @ORM\JoinColumn(nullable=false)
   */
   private $semestre;


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
     * @return EvaluationModule
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
     * Set coefficient
     *
     * @param integer $coefficient
     * @return EvaluationModule
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;
    
        return $this;
    }

    /**
     * Get coefficient
     *
     * @return integer 
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return EvaluationModule
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
     * Set module
     *
     * @param \Gadi\SiteBundle\Entity\Module $module
     * @return Module
     */
    public function setSemestre(\Gadi\SiteBundle\Entity\Module $module)
    {
        $this->module = $module;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return \Gadi\SiteBundle\Entity\Module 
     */
    public function getModule()
    {
        return $this->module;
    }
}
