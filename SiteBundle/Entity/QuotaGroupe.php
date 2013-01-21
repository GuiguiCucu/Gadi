<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuotaGroupe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\QuotaGroupeRepository")
 */
class QuotaGroupe
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
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Groupe")
   * @ORM\JoinColumn(nullable=false)
   */
   private $groupe;
   
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
     * @return QuotaGroupe
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
     * Set Groupe
     *
     * @param \Gadi\SiteBundle\Entity\Groupe $groupe
     * @return Groupe
     */
    public function setGroupe(\Gadi\SiteBundle\Entity\Groupe $groupe)
    {
        $this->groupe = $groupe;
    
        return $this;
    }

    /**
     * Get Groupe
     *
     * @return \Gadi\SiteBundle\Entity\Groupe 
     */
    public function getGroupe()
    {
        return $this->groupe;
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
	
	public function __construct()
	  {
		$this->heureSemaine = 0;
		
	  }

}
