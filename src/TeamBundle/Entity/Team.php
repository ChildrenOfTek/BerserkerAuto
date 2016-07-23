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
     * @ORM\OneToMany(targetEntity="MemberBundle\Entity\User", mappedBy="team")
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
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
     *
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
     *
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
     * @return int
     */
    public function getVictoires()
    {
        return $this->victoires;
    }

    /**
     * Set defaites
     *
     * @param integer $defaites
     *
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
     * @return int
     */
    public function getDefaites()
    {
        return $this->defaites;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add member
     *
     * @param \MemberBundle\Entity\Member $member
     *
     * @return Team
     */
    public function addMember(\MemberBundle\Entity\Member $member)
    {
        $this->members[] = $member;

        return $this;
    }

    /**
     * Remove member
     *
     * @param \MemberBundle\Entity\Member $member
     */
    public function removeMember(\MemberBundle\Entity\Member $member)
    {
        $this->members->removeElement($member);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembers()
    {
        return $this->members;
    }
}
