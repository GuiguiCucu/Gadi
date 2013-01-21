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
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\TypeEnseignant")
   * @ORM\JoinColumn(nullable=false)
   */
   private $TypeEnseignant;
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
     * @ORM\Column(name="nomEn", type="string", length=50)
     */
    private $nomEn;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomEn", type="string", length=50)
     */
    private $prenomEn;

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
     * Set TypeEnseignant
     *
     * @param \Gadi\SiteBundle\Entity\TypeEnseignant $typeEnseignant
     * @return Enseignant
     */
    public function setTypeEnseignant(\Gadi\SiteBundle\Entity\TypeEnseignant $typeEnseignant)
    {
        $this->TypeEnseignant = $typeEnseignant;
    
        return $this;
    }

    /**
     * Get TypeEnseignant
     *
     * @return \Gadi\SiteBundle\Entity\TypeEnseignant 
     */
    public function getTypeEnseignant()
    {
        return $this->TypeEnseignant;
    }
}