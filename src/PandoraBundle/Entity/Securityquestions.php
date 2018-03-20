<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Securityquestions
 *
 * @ORM\Table(name="SecurityQuestions")
 * @ORM\Entity
 */
class Securityquestions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;

    /**
     * @var string
     *
     * @ORM\Column(name="SecurityQuestionDesc", type="string", length=100, nullable=true)
     */
    private $SecurityQuestionDesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

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
     * @var string
     *
     * @ORM\Column(name="Chinese_Description", type="string", length=100, nullable=true)
     */
    private $Chinese_Description;

    /**
     * @var string
     *
     * @ORM\Column(name="Indonesian_Description", type="string", length=100, nullable=true)
     */
    private $Indonesian_Description;

    /**
     * @var string
     *
     * @ORM\Column(name="Thai_Description", type="string", length=100, nullable=true)
     */
    private $Thai_Description;

    /**
     * @var string
     *
     * @ORM\Column(name="Japanese_Description", type="string", length=100, nullable=true)
     */
    private $Japanese_Description;

    /**
     * @var string
     *
     * @ORM\Column(name="Korean_Description", type="string", length=100, nullable=true)
     */
    private $Korean_Description;

    /**
     * Set Id
     *
     * @param integer $Id
     *
     * @return integer
     */
    public function setId($Id)
    {
        return $this->Id = $Id;
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
     * Set SecurityQuestionDesc
     *
     * @param string $SecurityQuestionDesc
     *
     * @return Securityquestions
     */
    public function setSecurityQuestionDesc($SecurityQuestionDesc)
    {
        $this->SecurityQuestionDesc = $SecurityQuestionDesc;

        return $this;
    }

    /**
     * Get SecurityQuestionDesc
     *
     * @return string
     */
    public function getSecurityQuestionDesc()
    {
        return $this->SecurityQuestionDesc;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Securityquestions
     */
    public function setRollbaseId($RollbaseId)
    {
        $this->RollbaseId = $RollbaseId;

        return $this;
    }

    /**
     * Get RollbaseId
     *
     * @return integer
     */
    public function getRollbaseId()
    {
        return $this->RollbaseId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Securityquestions
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
     * @return Securityquestions
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
     * @return Securityquestions
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
     * @return Securityquestions
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
     * @return Securityquestions
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
     * Set Chinese_Description
     *
     * @param string $Chinese_Description
     *
     * @return Securityquestions
     */
    public function setChinese_Description($Chinese_Description)
    {
        $this->Chinese_Description = $Chinese_Description;

        return $this;
    }

    /**
     * Get Chinese_Description
     *
     * @return string
     */
    public function getChinese_Description()
    {
        return $this->Chinese_Description;
    }

    /**
     * Set Indonesian_Description
     *
     * @param string $Indonesian_Description
     *
     * @return Securityquestions
     */
    public function setIndonesian_Description($Indonesian_Description)
    {
        $this->Indonesian_Description = $Indonesian_Description;

        return $this;
    }

    /**
     * Get Indonesian_Description
     *
     * @return string
     */
    public function getIndonesian_Description()
    {
        return $this->Indonesian_Description;
    }

    /**
     * Set Thai_Description
     *
     * @param string $Thai_Description
     *
     * @return Securityquestions
     */
    public function setThai_Description($Thai_Description)
    {
        $this->Thai_Description = $Thai_Description;

        return $this;
    }

    /**
     * Get Thai_Description
     *
     * @return string
     */
    public function getThai_Description()
    {
        return $this->Thai_Description;
    }

    /**
     * Set Japanese_Description
     *
     * @param string $Japanese_Description
     *
     * @return Securityquestions
     */
    public function setJapanese_Description($Japanese_Description)
    {
        $this->Japanese_Description = $Japanese_Description;

        return $this;
    }

    /**
     * Get Japanese_Description
     *
     * @return string
     */
    public function getJapanese_Description()
    {
        return $this->Japanese_Description;
    }

    /**
     * Set Korean_Description
     *
     * @param string $Korean_Description
     *
     * @return Securityquestions
     */
    public function setKorean_Description($Korean_Description)
    {
        $this->Korean_Description = $Korean_Description;

        return $this;
    }

    /**
     * Get Korean_Description
     *
     * @return string
     */
    public function getKorean_Description()
    {
        return $this->Korean_Description;
    }
}
