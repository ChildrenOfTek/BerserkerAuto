<?php

namespace TeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="TeamBundle\Repository\TeamRepository")
 */
class Team
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255, unique=true)
     */
    private $tag;

    /**
     * @var int
     *
     * @ORM\Column(name="victoires", type="integer", nullable=true)
     */
    private $victoires;

    /**
     * @var int
     *
     * @ORM\Column(name="defaites", type="integer", nullable=true)
     */
    private $defaites;
    
    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\User", mappedBy="team")
     */
    private $users;


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Team
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return Team
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set victoires
     *
     * @param integer $victoires
     * @return Team
     */
    public function setVictoires($victoires)
    {
        $this->victoires = $victoires;

        return $this;
    }

    /**
     * Get victoires
     *
     * @return integer 
     */
    public function getVictoires()
    {
        return $this->victoires;
    }

    /**
     * Set defaites
     *
     * @param integer $defaites
     * @return Team
     */
    public function setDefaites($defaites)
    {
        $this->defaites = $defaites;

        return $this;
    }

    /**
     * Get defaites
     *
     * @return integer 
     */
    public function getDefaites()
    {
        return $this->defaites;
    }

    /**
     * Add users
     *
     * @param \UserBundle\Entity\User $users
     * @return Team
     */
    public function addUser(\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \UserBundle\Entity\User $users
     */
    public function removeUser(\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
