<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semaine
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\SemaineRepository")
 */
class Semaine
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
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Semestre")
   * @ORM\JoinColumn(nullable=false)
   */
   private $semestre;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

	public function __construct($semestre, $numero, $dateDebut, $dateFin)
	  {
	    $this->semestre = $semestre;
		$this->numero = $numero;
		$this->dateDebut = $dateDebut;
		$this->dateFin = $dateFin;
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
     * Set numero
     *
     * @param integer $numero
     * @return Semaine
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Semaine
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    
        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Semaine
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
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
