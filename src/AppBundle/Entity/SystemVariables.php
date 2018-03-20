<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAccess
 *
 * @ORM\Table(name="system_variables")
 * @ORM\Entity
 */
class SystemVariables
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="VariableName", type="string", length=100, nullable=false)
     */
    private $VariableName;

    /**
     * @var string
     *
     * @ORM\Column(name="VariableValue", type="text", nullable=true)
     */
    private $VariableValue;
    
    /**
     * Set VariableName
     *
     * @param string $VariableName
     *
     * @return SystemVariables
     */
    public function setVariableName($VariableName)
    {
        $this->VariableName = $VariableName;

        return $this;
    }

    /**
     * Get VariableName
     *
     * @return string
     */
    public function getVariableName()
    {
        return $this->VariableName;
    }

    /**
     * Set VariableValue
     *
     * @param string $VariableValue
     *
     * @return SystemVariables
     */
    public function setVariableValue($VariableValue)
    {
        $this->VariableValue = $VariableValue;

        return $this;
    }

    /**
     * Get VariableValue
     *
     * @return string
     */
    public function getVariableValue()
    {
        return $this->VariableValue;
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
}
