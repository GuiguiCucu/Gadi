<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\GroupeRepository")
 */
class Groupe
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
     * @ORM\Column(name="nomG", type="string", length=5)
     */
    private $nomG;

	/**
   * @ORM\ManyToOne(targetEntity="Gadi\SiteBundle\Entity\Semestre")
   * @ORM\JoinColumn(nullable=false)
   */
   private $semestre;
   
   
     /**
     * @ORM\ManyToMany(targetEntity="Gadi\SiteBundle\Entity\Cours", cascade={"persist"})
     */
    private $courss;

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
     * Set nomG
     *
     * @param string $nomG
     * @return Groupe
     */
    public function setNomG($nomG)
    {
        $this->nomG = $nomG;
    
        return $this;
    }

    /**
     * Get nomG
     *
     * @return string 
     */
    public function getNomG()
    {
        return $this->nomG;
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
	
	  /**
		* Add cours
		*
		* @param Gadi\SiteBundle\Entity\Cours $categories
		*/
	  public function addCategorie(\Gadi\SiteBundle\Entity\Cours $categorie) // addCategorie sans « s » !
	  {
		// Ici, on utilise l'ArrayCollection vraiment comme un tableau, avec la syntaxe []
		$this->courss[] = $cours;
	  }
	 
	  /**
		* Remove cours
		*
		* @param Gadi\SiteBundle\Entity\Cours $cours
		*/
	  public function removeCategorie(\Gadi\SiteBundle\Entity\Cours $cours) // removeCategorie sans « s » !
	  {
		// Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
		$this->cours->removeElement($cours);
	  }
	 
	  /**
		* Get courss
		*
		* @return Doctrine\Common\Collections\Collection
		*/
	  public function getCourss() // Notez le « s », on récupère une liste de catégories ici !
	  {
		return $this->courss;
	  }
}
