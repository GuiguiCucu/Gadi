<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enseignant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\EnseignantRepository")
 */
class Enseignant
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
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\TypeEnseignant")
   * @ORM\JoinColumn(nullable=false)
   */
   private $TypeEnseignant;	
    /**
     * @var string
     *
     * @ORM\Column(name="nomEn", type="string", length=50)
     */
    private $nomEn;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomEn", type="string", length=50)
     */
    private $prenomEn;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="heureAnnee", type="integer")
     */
    private $heureAnnee;

	public function __construct()
	  {
		$this->NomEn = " ";
		$this->setPrenomEn = " ";
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
     * Set nomEn
     *
     * @param string $nomEn
     * @return Enseignant
     */
    public function setNomEn($nomEn)
    {
        $this->nomEn = $nomEn;
    
        return $this;
    }

    /**
     * Get nomEn
     *
     * @return string 
     */
    public function getNomEn()
    {
        return $this->nomEn;
    }

    /**
     * Set prenomEn
     *
     * @param string $prenomEn
     * @return Enseignant
     */
    public function setPrenomEn($prenomEn)
    {
        $this->prenomEn = $prenomEn;
    
        return $this;
    }

    /**
     * Get prenomEn
     *
     * @return string 
     */
    public function getPrenomEn()
    {
        return $this->prenomEn;
    }

    /**
     * Set typeEnseignant
     *
     * @param \Gadi\SiteBundle\Entity\TypeEnseignant $typeEnseignant
     * @return Enseignant
     */
    public function setTypeEnseignant(\Gadi\SiteBundle\Entity\TypeEnseignant $typeEnseignant)
    {
        $this->typeEnseignant = $typeEnseignant;
    
        return $this;
    }

    /**
     * Get typeEnseignant
     *
     * @return \Gadi\SiteBundle\Entity\TypeEnseignant 
     */
    public function getTypeEnseignant()
    {
        return $this->typeEnseignant;
    }
	
    /**
     * Set heureAnnee
     *
     * @param integer $heureMaxAnn
     * @return TypeEnseignant
     */
    public function setHeureAnnee($heureAnnee)
    {
        $this->heureAnnee = $heureAnnee;
    
        return $this;
    }

    /**
     * Get heureAnnee
     *
     * @return integer 
     */
    public function getHeureAnnee()
    {
        return $this->heureAnnee;
    }
}