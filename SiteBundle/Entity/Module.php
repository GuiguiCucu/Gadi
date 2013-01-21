<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\ModuleRepository")
 */
class Module
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
     * @ORM\Column(name="ue", type="string", length=5)
     */
    private $ue;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreHeures", type="integer")
     */
    private $nombreHeures;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer")
     */
    private $coefficient;
	
	/**
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Enseignant")
   * @ORM\JoinColumn(nullable=false)
   */
   private $enseignant;
   
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
     * Set ue
     *
     * @param string $ue
     * @return Module
     */
    public function setUe($ue)
    {
        $this->ue = $ue;
    
        return $this;
    }

    /**
     * Get ue
     *
     * @return string 
     */
    public function getUe()
    {
        return $this->ue;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Module
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set nombreHeures
     *
     * @param integer $nombreHeures
     * @return Module
     */
    public function setNombreHeures($nombreHeures)
    {
        $this->nombreHeures = $nombreHeures;
    
        return $this;
    }

    /**
     * Get nombreHeures
     *
     * @return integer 
     */
    public function getNombreHeures()
    {
        return $this->nombreHeures;
    }

    /**
     * Set coefficient
     *
     * @param integer $coefficient
     * @return Module
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
     * Set semestre
     *
     * @param \Gadi\SiteBundle\Entity\Semestre $semestre
     * @return Semestre
     */
    public function setSemestre(\Gadi\SiteBundle\Entity\Semestre $semestre)
    {
        $this->semestre = $semestre;
    
        return $this;
    }

    /**
     * Get Semestre
     *
     * @return \Gadi\SiteBundle\Entity\Semestre 
     */
    public function getSemestre()
    {
        return $this->semestre;
    }
}
