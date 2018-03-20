<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Title", type="integer", nullable=true)
     */
    private $Title = '0';
    
    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=50, nullable=true)
     */
    private $LastName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="BrandMarkets", type="string", length=150, nullable=true)
     */
    private $BrandMarkets;
    
    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=50, nullable=true)
     */
    private $FirstName;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BirthDate", type="datetime", nullable=true)
     */
    private $BirthDate;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Gender", type="integer", nullable=true)
     */
    private $Gender;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Street1", type="string", length=50, nullable=true)
     */
    private $Street1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Street2", type="string", length=50, nullable=true)
     */
    private $Street2;
    
    /**
     * @var string
     *
     * @ORM\Column(name="CityCode", type="string", length=50, nullable=true)
     */
    private $CityCode;
    
    /**
     * @var string
     *
     * @ORM\Column(name="RegionCode", type="string", length=5, nullable=true)
     */
    private $RegionCode;
    
    /**
     * @var string
     *
     * @ORM\Column(name="StateProvinceCode", type="string", length=20, nullable=true)
     */
    private $StateProvinceCode;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Zip", type="string", length=20, nullable=true)
     */
    private $Zip;
    
    /**
     * @var string
     *
     * @ORM\Column(name="AspNetUserId", type="string", length=128, nullable=true)
     */
    private $AspNetUserId;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="TeamId", type="bigint", nullable=true)
     */
    private $TeamId = '0';
    
    /**
     * Set Title
     *
     * @param integer $Title
     *
     * @return User
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
        
        return $this;
    }
    
    /**
     * Get Title
     *
     * @return integer
     */
    public function getTitle()
    {
        return $this->Title;
    }
    
    /**
     * Set LastName
     *
     * @param string $LastName
     *
     * @return User
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        
        return $this;
    }
    
    /**
     * Get LastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }
    
    /**
     * Set BrandMarkets
     *
     * @param string $BrandMarkets
     *
     * @return User
     */
    public function setBrandMarkets($BrandMarkets)
    {
        $this->BrandMarkets = $BrandMarkets;
        
        return $this;
    }
    
    /**
     * Get BrandMarkets
     *
     * @return string
     */
    public function getBrandMarkets()
    {
        return $this->BrandMarkets;
    }
    
    /**
     * Set FirstName
     *
     * @param string $FirstName
     *
     * @return User
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        
        return $this;
    }
    
    /**
     * Get FirstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }
    
    /**
     * Set BirthDate
     *
     * @param \DateTime $BirthDate
     *
     * @return User
     */
    public function setBirthDate($BirthDate)
    {
        $this->BirthDate = $BirthDate;
        return $this;
    }
    
    /**
     * Get BirthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->BirthDate;
    }
    
    /**
     * Set Gender
     *
     * @param integer $Gender
     *
     * @return User
     */
    public function setGender($Gender)
    {
        $this->Gender = $Gender;
        
        return $this;
    }
    
    /**
     * Get Gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->Gender;
    }
    
    /**
     * Set Street1
     *
     * @param string $Street1
     *
     * @return User
     */
    public function setStreet1($Street1)
    {
        $this->Street1 = $Street1;
        
        return $this;
    }
    
    /**
     * Get Street1
     *
     * @return string
     */
    public function getStreet1()
    {
        return $this->Street1;
    }
    
    /**
     * Set Street2
     *
     * @param string $Street2
     *
     * @return User
     */
    public function setStreet2($Street2)
    {
        $this->Street2 = $Street2;
        
        return $this;
    }
    
    /**
     * Get Street2
     *
     * @return string
     */
    public function getStreet2()
    {
        return $this->Street2;
    }
    
    /**
     * Set CityCode
     *
     * @param string $CityCode
     *
     * @return User
     */
    public function setCityCode($CityCode)
    {
        $this->CityCode = $CityCode;
        
        return $this;
    }
    
    /**
     * Get CityCode
     *
     * @return string
     */
    public function getCityCode()
    {
        return $this->CityCode;
    }
    
    /**
     * Set RegionCode
     *
     * @param string $RegionCode
     *
     * @return User
     */
    public function setRegionCode($RegionCode)
    {
        $this->RegionCode = $RegionCode;
        return $this;
    }
    
    /**
     * Get RegionCode
     *
     * @return string
     */
    public function getRegionCode()
    {
        return $this->RegionCode;
    }
    
    /**
     * Set StateProvinceCode
     *
     * @param string $StateProvinceCode
     *
     * @return User
     */
    public function setStateProvinceCode($StateProvinceCode)
    {
        $this->StateProvinceCode = $StateProvinceCode;
        
        return $this;
    }
    
    /**
     * Get StateProvinceCode
     *
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->StateProvinceCode;
    }
    
    /**
     * Set Zip
     *
     * @param string $Zip
     *
     * @return User
     */
    public function setZip($Zip)
    {
        $this->Zip = $Zip;
        
        return $this;
    }
    
    /**
     * Get Zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->Zip;
    }
    
    
    /**
     * Set AspNetUserId
     *
     * @param string $AspNetUserId
     *
     * @return User
     */
    public function setAspNetUserId($AspNetUserId)
    {
        $this->AspNetUserId = $AspNetUserId;
        
        return $this;
    }
    
    /**
     * Get AspNetUserId
     *
     * @return string
     */
    public function getAspNetUserId()
    {
        return $this->AspNetUserId;
    }
    
    
    /**
     * Set TeamId
     *
     * @param string $TeamId
     *
     * @return User
     */
    public function setTeamId($TeamId)
    {
        $this->TeamId = $TeamId;
        
        return $this;
    }
    
    /**
     * Get TeamId
     *
     * @return string
     */
    public function getTeamId()
    {
        return $this->TeamId;
    }
}