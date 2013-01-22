<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuotaEnseignant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\QuotaEnseignantRepository")
 */
class QuotaEnseignant
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
     * @var integer
     *
     * @ORM\Column(name="heureSemaine", type="integer")
     */
    private $heureSemaine;

	/**
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Enseignant")
   * @ORM\JoinColumn(nullable=false)
   */
   private $enseignant;
   
  	/**
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Semaine")
   * @ORM\JoinColumn(nullable=false)
   */
   private $semaine;

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
     * Set heureSemaine
     *
     * @param integer $heureSemaine
     * @return QuotaEnseignant
     */
    public function setHeureSemaine($heureSemaine)
    {
        $this->heureSemaine = $heureSemaine;
    
        return $this;
    }

    /**
     * Get heureSemaine
     *
     * @return integer 
     */
    public function getHeureSemaine()
    {
        return $this->heureSemaine;
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
     * Set Semaine
     *
     * @param \Gadi\SiteBundle\Entity\Semaine $semaine
     * @return Semaine
     */
    public function setSemaine(\Gadi\SiteBundle\Entity\Semaine $semaine)
    {
        $this->semaine = $semaine;
    
        return $this;
    }

    /**
     * Get Semaine
     *
     * @return \Gadi\SiteBundle\Entity\Semaine 
     */
    public function getSemaine()
    {
        return $this->semaine;
    }
	
	/**
     * constructeur
     *
     */
	public function __construct()
	{
		$this->heureSemaine = 0;
		
	}
}
