<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NoteRepository")
 */
class Note
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
     * @var float
     *
     * @ORM\Column(name="note_ds", type="float")
     */
    private $noteDs;

    /**
     * @var float
     *
     * @ORM\Column(name="note_examen", type="float")
     */
    private $noteExamen;

    /**
     * @var float
     *
     * @ORM\Column(name="moyen", type="float")
     */
    private $moyen;


    /**
     * @ORM\ManyToOne(targetEntity=User::class,inversedBy="note")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class)
     */
    private $matiere;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at=new \DateTime();
    }


    public function __toString()
    {
        return ''.$this->getId();
    }


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
     * Set noteDs
     *
     * @param float $noteDs
     *
     * @return Note
     */
    public function setNoteDs($noteDs)
    {
        $this->noteDs = $noteDs;

        return $this;
    }

    /**
     * Get noteDs
     *
     * @return float
     */
    public function getNoteDs()
    {
        return $this->noteDs;
    }

    /**
     * Set noteExamen
     *
     * @param float $noteExamen
     *
     * @return Note
     */
    public function setNoteExamen($noteExamen)
    {
        $this->noteExamen = $noteExamen;

        return $this;
    }

    /**
     * Get noteExamen
     *
     * @return float
     */
    public function getNoteExamen()
    {
        return $this->noteExamen;
    }

    /**
     * Set moyen
     *
     * @param float $moyen
     *
     * @return Note
     */
    public function setMoyen($moyen)
    {
        $this->moyen = $moyen;

        return $this;
    }

    /**
     * Get moyen
     *
     * @return float
     */
    public function getMoyen()
    {
        return $this->moyen;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\User $users
     *
     * @return Note
     */
    public function setUsers(\AppBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Note
     */
    public function setMatiere(\AppBundle\Entity\Matiere $matiere = null)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \AppBundle\Entity\Matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Note
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
