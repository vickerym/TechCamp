<?php

namespace techcampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="techcampBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->students = new ArrayCollection();
    }

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
     * @ORM\Column(name="phoneNumber", type="integer")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="streetName", type="string", length=255)
     */
    private $streetName;

    /**
     * @var string
     *
     * @ORM\Column(name="cityName", type="string", length=255)
     */
    private $cityName;

    /**
     * @var string
     *
     * @ORM\Column(name="stateName", type="string", length=255)
     */
    private $stateName;

    /**
     * @var int
     *
     * @ORM\Column(name="zipCode", type="integer")
     */
    private $zipCode;
	
	/**
	 * @ORM\OneToMany(targetEntity="Student", mappedBy="user")
	 */
	private $students;
	


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
     * @return User
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
     * @return User
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
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set streetName
     *
     * @param string $streetName
     * @return User
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * Get streetName
     *
     * @return string 
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set cityName
     *
     * @param string $cityName
     * @return User
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string 
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Set stateName
     *
     * @param string $stateName
     * @return User
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;

        return $this;
    }

    /**
     * Get stateName
     *
     * @return string 
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     * @return User
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
	
	/*
	 * 
	 */
	public function addStudent($student)
	{
		$this->students[] = $student;
		
		return $this;
	}
	/*
	 * Get students
	 */
	public function getStudents()
	{
		return $this->students;
	}
}
