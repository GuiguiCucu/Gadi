<?php
// src/Gadi/UserBundle/Entity/User.php
 
namespace Gadi\UserBundle\Entity;
 
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="gadi_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
   * @ORM\OneToOne(targetEntity="Gadi\SiteBundle\Entity\Enseignant", mappedBy="user")
   * @ORM\JoinColumn(nullable=true)
   */
	private $enseignant;
	
	/**
     * Set enseignant
     *
     * @param \Gadi\SiteBundle\Entity\Enseignant $enseignant
     * @return User
     */
    public function setEnseignant(\Gadi\SiteBundle\Entity\Enseignant $enseignant)
    {
        $this->enseignant = $enseignant;
    
        return $this;
    }

    /**
     * Get enseignant
     *
     * @return \Gadi\SiteBundle\Entity\Enseignant 
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }
}