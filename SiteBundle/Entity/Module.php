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
     * @ORM\Column(name="heureCM", type="integer")
     */
    private $heureCM;

    /**
     * @var string
     *
     * @ORM\Column(name="typeSalleCM", type="string", length=255)
     */
    private $typeSalleCM;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbGroupes", type="integer")
     */
    private $nbGroupes;

    /**
     * @var integer
     *
     * @ORM\Column(name="heureTD", type="integer")
     */
    private $heureTD;

    /**
     * @var string
     *
     * @ORM\Column(name="typeSalleTD", type="string", length=255)
     */
    private $typeSalleTD;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbGroupesTD", type="integer")
     */
    private $nbGroupesTD;

    /**
     * @var integer
     *
     * @ORM\Column(name="heureTP", type="integer")
     */
    private $heureTP;

    /**
     * @var string
     *
     * @ORM\Column(name="typeSalleTP", type="string", length=255)
     */
    private $typeSalleTP;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbGroupesTP", type="integer")
     */
    private $nbGroupesTP;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefGlobal", type="integer")
     */
    private $coefGlobal;
	
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
     * Set heureCM
     *
     * @param integer $heureCM
     * @return Module
     */
    public function setHeureCM($heureCM)
    {
        $this->heureCM = $heureCM;
    
        return $this;
    }

    /**
     * Get heureCM
     *
     * @return integer 
     */
    public function getHeureCM()
    {
        return $this->heureCM;
    }

    /**
     * Set typeSalleCM
     *
     * @param string $typeSalleCM
     * @return Module
     */
    public function setTypeSalleCM($typeSalleCM)
    {
        $this->typeSalleCM = $typeSalleCM;
    
        return $this;
    }

    /**
     * Get typeSalleCM
     *
     * @return string 
     */
    public function getTypeSalleCM()
    {
        return $this->typeSalleCM;
    }

    /**
     * Set nbGroupes
     *
     * @param integer $nbGroupes
     * @return Module
     */
    public function setNbGroupes($nbGroupes)
    {
        $this->nbGroupes = $nbGroupes;
    
        return $this;
    }

    /**
     * Get nbGroupes
     *
     * @return integer 
     */
    public function getNbGroupes()
    {
        return $this->nbGroupes;
    }

    /**
     * Set heureTD
     *
     * @param integer $heureTD
     * @return Module
     */
    public function setHeureTD($heureTD)
    {
        $this->heureTD = $heureTD;
    
        return $this;
    }

    /**
     * Get heureTD
     *
     * @return integer 
     */
    public function getHeureTD()
    {
        return $this->heureTD;
    }

    /**
     * Set typeSalleTD
     *
     * @param string $typeSalleTD
     * @return Module
     */
    public function setTypeSalleTD($typeSalleTD)
    {
        $this->typeSalleTD = $typeSalleTD;
    
        return $this;
    }

    /**
     * Get typeSalleTD
     *
     * @return string 
     */
    public function getTypeSalleTD()
    {
        return $this->typeSalleTD;
    }

    /**
     * Set nbGroupesTD
     *
     * @param integer $nbGroupesTD
     * @return Module
     */
    public function setNbGroupesTD($nbGroupesTD)
    {
        $this->nbGroupesTD = $nbGroupesTD;
    
        return $this;
    }

    /**
     * Get nbGroupesTD
     *
     * @return integer 
     */
    public function getNbGroupesTD()
    {
        return $this->nbGroupesTD;
    }

    /**
     * Set heureTP
     *
     * @param integer $heureTP
     * @return Module
     */
    public function setHeureTP($heureTP)
    {
        $this->heureTP = $heureTP;
    
        return $this;
    }

    /**
     * Get heureTP
     *
     * @return integer 
     */
    public function getHeureTP()
    {
        return $this->heureTP;
    }

    /**
     * Set typeSalleTP
     *
     * @param string $typeSalleTP
     * @return Module
     */
    public function setTypeSalleTP($typeSalleTP)
    {
        $this->typeSalleTP = $typeSalleTP;
    
        return $this;
    }

    /**
     * Get typeSalleTP
     *
     * @return string 
     */
    public function getTypeSalleTP()
    {
        return $this->typeSalleTP;
    }

    /**
     * Set nbGroupesTP
     *
     * @param integer $nbGroupesTP
     * @return Module
     */
    public function setNbGroupesTP($nbGroupesTP)
    {
        $this->nbGroupesTP = $nbGroupesTP;
    
        return $this;
    }

    /**
     * Get nbGroupesTP
     *
     * @return integer 
     */
    public function getNbGroupesTP()
    {
        return $this->nbGroupesTP;
    }

    /**
     * Set coefGlobal
     *
     * @param integer $coefGlobal
     * @return Module
     */
    public function setCoefGlobal($coefGlobal)
    {
        $this->coefGlobal = $coefGlobal;
    
        return $this;
    }

    /**
     * Get coefGlobal
     *
     * @return integer 
     */
    public function getCoefGlobal()
    {
        return $this->coefGlobal;
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
