<?php

namespace WarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * War
 *
 * @ORM\Table(name="war")
 * @ORM\Entity(repositoryClass="WarBundle\Repository\WarRepository")
 */
class War
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
     * @var int
     *
     * @ORM\Column(name="members", type="integer")
     */
    private $members;

    /**
     * @var int
     *
     * @ORM\Column(name="opponents", type="integer", unique=true)
     */
    private $opponents;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;


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
     * Set members
     *
     * @param integer $members
     *
     * @return War
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * Get members
     *
     * @return int
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Set opponents
     *
     * @param integer $opponents
     *
     * @return War
     */
    public function setOpponents($opponents)
    {
        $this->opponents = $opponents;

        return $this;
    }

    /**
     * Get opponents
     *
     * @return int
     */
    public function getOpponents()
    {
        return $this->opponents;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return War
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
}

