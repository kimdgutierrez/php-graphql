<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAccess
 *
 * @ORM\Table(name="user_access")
 * @ORM\Entity
 */
class UserAccess
{
    /**
     * @var string
     *
     * @ORM\Column(name="Roles", type="string", length=500, nullable=true)
     */
    private $Roles;

    /**
     * @var string
     *
     * @ORM\Column(name="Method", type="string", length=50, nullable=true)
     */
    private $Method;

    /**
     * @var string
     *
     * @ORM\Column(name="MethodName", type="string", length=50, nullable=true)
     */
    private $MethodName;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;



    /**
     * Set Roles
     *
     * @param string $Roles
     *
     * @return UserAccess
     */
    public function setRoles($Roles)
    {
        $this->Roles = $Roles;

        return $this;
    }

    /**
     * Get Roles
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->Roles;
    }

    /**
     * Set Method
     *
     * @param string $Method
     *
     * @return UserAccess
     */
    public function setMethod($Method)
    {
        $this->Method = $Method;

        return $this;
    }

    /**
     * Get Method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->Method;
    }

    /**
     * Set MethodName
     *
     * @param string $MethodName
     *
     * @return UserAccess
     */
    public function setMethodName($MethodName)
    {
        $this->MethodName = $MethodName;

        return $this;
    }

    /**
     * Get MethodName
     *
     * @return string
     */
    public function getMethodName()
    {
        return $this->MethodName;
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
