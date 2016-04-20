<?php

namespace techcampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use techcampBundle\Entity\Student;
use techcampBundle\Entity\Camp;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="techcampBundle\Repository\ApplicationRepository")
 */
class Application
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
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="applications")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="Camp", inversedBy="applications")
     */
    private $camp;
	
	/**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reviewed;
	
	/**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $accepted;
	


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
     * Set student
     *
     * @param string $student
     * @return Application
     */
    public function setStudent(Student $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return string 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set camp
     *
     * @param string $camp
     * @return Application
     */
    public function setCamp(Camp $camp)
    {
        $this->camp = $camp;

        return $this;
    }

    /**
     * Get camp
     *
     * @return string 
     */
    public function getCamp()
    {
        return $this->camp;
    }
	
	/**
     * @param boolean $reviewed
     *
     * @return Student
     */
    public function setReviewed($reviewed)
    {
        $this->reviewed = $reviewed;

        return $this;
    }
	
	 /**
     * @return boolean
     */
    public function getReviewed()
    {
        return $this->reviewed;
    }
	
	/**
     * @param boolean $accepted
     *
     * @return Student
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }
	
	 /**
     * @return boolean
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

}
