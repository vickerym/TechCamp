<?php

namespace techcampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Camp
 *
 * @ORM\Table(name="camp")
 * @ORM\Entity(repositoryClass="techcampBundle\Repository\CampRepository")
 */
class Camp
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
     * @ORM\Column(name="campName", type="string", length=255)
     */
    private $campName;

    /**
     * @var string
     *
     * @ORM\Column(name="campDescription", type="text")
     */
    private $campDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="campDates", type="string", length=255)
     */
    private $campDates;

    /**
     * @var string
     *
     * @ORM\Column(name="campGradeLevel", type="string", length=255)
     */
    private $campGradeLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="campPrice", type="string", length=255)
     */
    private $campPrice;
	
	 /**
     * @ORM\Column(type="boolean")
     */
    private $displayedOnHome;
    
	/**
	 * @ORM\OneToMany(targetEntity="Application", mappedBy="camp")
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
     * Set campName
     *
     * @param string $campName
     * @return Camp
     */
    public function setCampName($campName)
    {
        $this->campName = $campName;

        return $this;
    }

    /**
     * Get campName
     *
     * @return string 
     */
    public function getCampName()
    {
        return $this->campName;
    }

    /**
     * Set campDescription
     *
     * @param string $campDescription
     * @return Camp
     */
    public function setCampDescription($campDescription)
    {
        $this->campDescription = $campDescription;

        return $this;
    }

    /**
     * Get campDescription
     *
     * @return string 
     */
    public function getCampDescription()
    {
        return $this->campDescription;
    }

    /**
     * Set campDates
     *
     * @param string $campDates
     * @return Camp
     */
    public function setCampDates($campDates)
    {
        $this->campDates = $campDates;

        return $this;
    }

    /**
     * Get campDates
     *
     * @return string 
     */
    public function getCampDates()
    {
        return $this->campDates;
    }

    /**
     * Set campGradeLevel
     *
     * @param string $campGradeLevel
     * @return Camp
     */
    public function setCampGradeLevel($campGradeLevel)
    {
        $this->campGradeLevel = $campGradeLevel;

        return $this;
    }

    /**
     * Get campGradeLevel
     *
     * @return string 
     */
    public function getCampGradeLevel()
    {
        return $this->campGradeLevel;
    }

    /**
     * Set campPrice
     *
     * @param string $campPrice
     * @return Camp
     */
    public function setCampPrice($campPrice)
    {
        $this->campPrice = $campPrice;

        return $this;
    }

    /**
     * Get campPrice
     *
     * @return string 
     */
    public function getCampPrice()
    {
        return $this->campPrice;
    }
	
	/**
     * @param boolean $displayedOnHome
     *
     * @return Camp
     */
    public function setDisplayedOnHome($displayedOnHome)
    {
        $this->displayedOnHome = $displayedOnHome;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDisplayedOnHome()
    {
        return $this->displayedOnHome;
    }
	
	public function setApplication($application)
	{
		$this->application[] = $application;
		
		return $this;
	}
	public function getApplications()
	{
		return $this->applications;
	}
	
	public function __toString()
	{
		return $this->campName;
	}
	
	public function getApprovedApplications()
	{
		$count = 0;
		foreach($this->applications as $application)
		{
			if($application->getReviewed()==true) {
				$count++;
			}
		}
		return $count;
	}
	
}
