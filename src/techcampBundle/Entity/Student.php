<?php

namespace techcampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="techcampBundle\Repository\StudentRepository")
 */
class Student
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="gradeLevel", type="integer")
     */
    private $gradeLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="schoolName", type="string", length=255)
     */
    private $schoolName;

    /**
     * @var string
     *
     * @ORM\Column(name="ethnicity", type="string", length=255)
     */
    private $ethnicity;

    /**
     * @var string
     *
     * @ORM\Column(name="shirtSize", type="string", length=255)
     */
    private $shirtSize;
    
        /**
     * @var string
     *
     * @ORM\Column(name="canPickUp", type="string", length=255, nullable=true)
     */
    private $canPickUp;

    /**
     * @var string
     *
     * @ORM\Column(name="canPickUp2", type="string", length=255, nullable=true)
     */
    private $canPickUp2;

    /**
     * @var string
     *
     * @ORM\Column(name="canNotPickUp", type="string", length=255, nullable=true)
     */
    private $canNotPickUp;

    /**
     * @var string
     *
     * @ORM\Column(name="CanNotPickUp2", type="string", length=255, nullable=true)
     */
    private $canNotPickUp2;

    /**
     * @var string
     *
     * @ORM\Column(name="emergencyName", type="string", length=255)
     */
    private $emergencyName;

    /**
     * @var string
     *
     * @ORM\Column(name="relationship", type="string", length=255)
     */
    private $relationship;

    /**
     * @var int
     *
     * @ORM\Column(name="emergencyNumber", type="integer")
     */
    private $emergencyNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="emergencyAdditionalPhone", type="integer", nullable=true)
     */
    private $emergencyAdditionalPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="emergencyAdditionalComments", type="text", nullable=true)
     */
    private $emergencyAdditionalComments;
	
	/**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reviewed;
	
	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="students")
	 */
	private $user;
	
	/**
	 * @ORM\OneToMany(targetEntity="Application", mappedBy="student")
	 */
	private $applications;
	
	public function __construct()
	{
		$this->applications = new ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Student
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set gradeLevel
     *
     * @param integer $gradeLevel
     * @return Student
     */
    public function setGradeLevel($gradeLevel)
    {
        $this->gradeLevel = $gradeLevel;

        return $this;
    }

    /**
     * Get gradeLevel
     *
     * @return integer 
     */
    public function getGradeLevel()
    {
        return $this->gradeLevel;
    }

    /**
     * Set schoolName
     *
     * @param string $schoolName
     * @return Student
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    /**
     * Get schoolName
     *
     * @return string 
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * Set ethnicity
     *
     * @param string $ethnicity
     * @return Student
     */
    public function setEthnicity($ethnicity)
    {
        $this->ethnicity = $ethnicity;

        return $this;
    }

    /**
     * Get ethnicity
     *
     * @return string 
     */
    public function getEthnicity()
    {
        return $this->ethnicity;
    }

    /**
     * Set shirtSize
     *
     * @param string $shirtSize
     * @return Student
     */
    public function setShirtSize($shirtSize)
    {
        $this->shirtSize = $shirtSize;

        return $this;
    }

    /**
     * Get shirtSize
     *
     * @return string 
     */
    public function getShirtSize()
    {
        return $this->shirtSize;
    }
	
	    /**
     * Set canPickUp
     *
     * @param string $canPickUp
     * @return User
     */
    public function setCanPickUp($canPickUp)
    {
        $this->canPickUp = $canPickUp;

        return $this;
    }

    /**
     * Get canPickUp
     *
     * @return string 
     */
    public function getCanPickUp()
    {
        return $this->canPickUp;
    }

    /**
     * Set canPickUp2
     *
     * @param string $canPickUp2
     * @return User
     */
    public function setCanPickUp2($canPickUp2)
    {
        $this->canPickUp2 = $canPickUp2;

        return $this;
    }

    /**
     * Get canPickUp2
     *
     * @return string 
     */
    public function getCanPickUp2()
    {
        return $this->canPickUp2;
    }

    /**
     * Set canNotPickUp
     *
     * @param string $canNotPickUp
     * @return User
     */
    public function setCanNotPickUp($canNotPickUp)
    {
        $this->canNotPickUp = $canNotPickUp;

        return $this;
    }

    /**
     * Get canNotPickUp
     *
     * @return string 
     */
    public function getCanNotPickUp()
    {
        return $this->canNotPickUp;
    }

    /**
     * Set canNotPickUp2
     *
     * @param string $canNotPickUp2
     * @return User
     */
    public function setCanNotPickUp2($canNotPickUp2)
    {
        $this->canNotPickUp2 = $canNotPickUp2;

        return $this;
    }

    /**
     * Get canNotPickUp2
     *
     * @return string 
     */
    public function getCanNotPickUp2()
    {
        return $this->canNotPickUp2;
    }

    /**
     * Set emergencyName
     *
     * @param string $emergencyName
     * @return User
     */
    public function setEmergencyName($emergencyName)
    {
        $this->emergencyName = $emergencyName;

        return $this;
    }

    /**
     * Get emergencyName
     *
     * @return string 
     */
    public function getEmergencyName()
    {
        return $this->emergencyName;
    }

    /**
     * Set relationship
     *
     * @param string $relationship
     * @return User
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;

        return $this;
    }

    /**
     * Get relationship
     *
     * @return string 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set emergencyNumber
     *
     * @param integer $emergencyNumber
     * @return User
     */
    public function setEmergencyNumber($emergencyNumber)
    {
        $this->emergencyNumber = $emergencyNumber;

        return $this;
    }

    /**
     * Get emergencyNumber
     *
     * @return integer 
     */
    public function getEmergencyNumber()
    {
        return $this->emergencyNumber;
    }

    /**
     * Set emergencyAdditionalPhone
     *
     * @param integer $emergencyAdditionalPhone
     * @return User
     */
    public function setEmergencyAdditionalPhone($emergencyAdditionalPhone)
    {
        $this->emergencyAdditionalPhone = $emergencyAdditionalPhone;

        return $this;
    }

    /**
     * Get emergencyAdditionalPhone
     *
     * @return integer 
     */
    public function getEmergencyAdditionalPhone()
    {
        return $this->emergencyAdditionalPhone;
    }

    /**
     * Set emergencyAdditionalComments
     *
     * @param string $emergencyAdditionalComments
     * @return User
     */
    public function setEmergencyAdditionalComments($emergencyAdditionalComments)
    {
        $this->emergencyAdditionalComments = $emergencyAdditionalComments;

        return $this;
    }

    /**
     * Get emergencyAdditionalComments
     *
     * @return string 
     */
    public function getEmergencyAdditionalComments()
    {
        return $this->emergencyAdditionalComments;
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
	
	
	public function setUser($user)
	{
		$this->user = $user;
		
		return $this;
	}
	public function getUser()
	{
		return $this->user;
	}
	
	public function setApplication($application)
	{
		$this->application = $application;
		
		return $this;
	}
	public function getApplication()
	{
		return $this->application;
	}
	
	public function __toString()
	{
		return $this->firstName . " " . $this->lastName;
	}
}
