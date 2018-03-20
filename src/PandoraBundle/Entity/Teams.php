<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teams
 *
 * @ORM\Table(name="Teams")
 * @ORM\Entity
 */
class Teams
{
    /**
     * @var string
     *
     * @ORM\Column(name="TeamCode", type="string", length=50, nullable=true)
     */
    private $TeamCode;

    /**
     * @var string
     *
     * @ORM\Column(name="TeamName", type="string", length=100, nullable=true)
     */
    private $TeamName;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $CreatedById = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=50, nullable=true)
     */
    private $ModifiedById = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime", nullable=true)
     */
    private $DateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $DateModified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=false)
     */
    private $ActiveRecord = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;



    /**
     * Set TeamCode
     *
     * @param string $TeamCode
     *
     * @return Teams
     */
    public function setTeamCode($TeamCode)
    {
        $this->TeamCode = $TeamCode;

        return $this;
    }

    /**
     * Get TeamCode
     *
     * @return string
     */
    public function getTeamCode()
    {
        return $this->TeamCode;
    }

    /**
     * Set TeamName
     *
     * @param string $TeamName
     *
     * @return Teams
     */
    public function setTeamName($TeamName)
    {
        $this->TeamName = $TeamName;

        return $this;
    }

    /**
     * Get TeamName
     *
     * @return string
     */
    public function getTeamName()
    {
        return $this->TeamName;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Teams
     */
    public function setCreatedById($CreatedById)
    {
        $this->CreatedById = $CreatedById;

        return $this;
    }

    /**
     * Get CreatedById
     *
     * @return string
     */
    public function getCreatedById()
    {
        return $this->CreatedById;
    }

    /**
     * Set ModifiedById
     *
     * @param string $ModifiedById
     *
     * @return Teams
     */
    public function setModifiedById($ModifiedById)
    {
        $this->ModifiedById = $ModifiedById;

        return $this;
    }

    /**
     * Get ModifiedById
     *
     * @return string
     */
    public function getModifiedById()
    {
        return $this->ModifiedById;
    }

    /**
     * Set DateCreated
     *
     * @param \DateTime $DateCreated
     *
     * @return Teams
     */
    public function setDateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;

        return $this;
    }

    /**
     * Get DateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->DateCreated;
    }

    /**
     * Set DateModified
     *
     * @param \DateTime $DateModified
     *
     * @return Teams
     */
    public function setDateModified($DateModified)
    {
        $this->DateModified = $DateModified;

        return $this;
    }

    /**
     * Get DateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->DateModified;
    }

    /**
     * Set ActiveRecord
     *
     * @param boolean $ActiveRecord
     *
     * @return Teams
     */
    public function setActiveRecord($ActiveRecord)
    {
        $this->ActiveRecord = $ActiveRecord;

        return $this;
    }

    /**
     * Get ActiveRecord
     *
     * @return boolean
     */
    public function getActiveRecord()
    {
        return $this->ActiveRecord;
    }

    /**
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }
    
    
    /**
     * Set Id
     *
     * @param int $Id
     *
     * @return Teams
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        
        return $this;
    }
}
