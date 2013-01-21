<?php

namespace Gadi\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeEnseignant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gadi\SiteBundle\Entity\TypeEnseignantRepository")
 */
class TypeEnseignant
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
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;

    /**
     * @var integer
     *
     * @ORM\Column(name="heureMaxSem", type="integer")
     */
    private $heureMaxSem;

    /**
     * @var integer
     *
     * @ORM\Column(name="heureMaxAnn", type="integer")
     */
    private $heureMaxAnn;


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
     * Set intitule
     *
     * @param string $intitule
     * @return TypeEnseignant
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set heureMaxSem
     *
     * @param integer $heureMaxSem
     * @return TypeEnseignant
     */
    public function setHeureMaxSem($heureMaxSem)
    {
        $this->heureMaxSem = $heureMaxSem;
    
        return $this;
    }

    /**
     * Get heureMaxSem
     *
     * @return integer 
     */
    public function getHeureMaxSem()
    {
        return $this->heureMaxSem;
    }

    /**
     * Set heureMaxAnn
     *
     * @param integer $heureMaxAnn
     * @return TypeEnseignant
     */
    public function setHeureMaxAnn($heureMaxAnn)
    {
        $this->heureMaxAnn = $heureMaxAnn;
    
        return $this;
    }

    /**
     * Get heureMaxAnn
     *
     * @return integer 
     */
    public function getHeureMaxAnn()
    {
        return $this->heureMaxAnn;
    }
}
