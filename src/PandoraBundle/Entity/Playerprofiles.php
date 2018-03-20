<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Playerprofiles
 *
 * @ORM\Table(name="PlayerProfiles", uniqueConstraints={@ORM\UniqueConstraint(name="UserName", columns={"UserName"})})
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\PlayerProfileRepository")
 */
class Playerprofiles
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
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $UserName;

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
     * @ORM\Column(name="FirstName", type="string", length=50, nullable=true)
     */
    private $FirstName;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRegistrationId", type="bigint", nullable=true)
     */
    private $PlayerRegistrationId = '0';
    
    /**
     *
     * One Player Profile have One Player Registration
     * 
     * @ORM\OneToOne(targetEntity="Playerregistrations")
     * @ORM\JoinColumn(name="PlayerRegistrationId", referencedColumnName="Id")
     */
    private $PlayerRegistration;
    
    /**
     * @ORM\OneToOne(targetEntity="Wallets", mappedBy="PlayerProfiles")
     */
    private $Wallet;
    
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
     * @var integer
     *
     * @ORM\Column(name="StateProvinceId", type="bigint", nullable=false)
     */
    private $StateProvinceId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Zip", type="string", length=20, nullable=true)
     */
    private $Zip;

    /**
     * @var string
     *
     * @ORM\Column(name="CountryCode", type="string", length=5, nullable=true)
     */
    private $CountryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrencyCode", type="string", length=5, nullable=true)
     */
    private $CurrencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=true)
     */
    private $Email;

    /**
     * @var string
     *
     * @ORM\Column(name="FullName", type="string", length=500, nullable=true)
     */
    private $FullName;

    /**
     * @var string
     *
     * @ORM\Column(name="WebChatUserName", type="string", length=50, nullable=true)
     */
    private $WebChatUserName;

    /**
     * @var string
     *
     * @ORM\Column(name="QQUserName", type="string", length=50, nullable=true)
     */
    private $QQUserName;

    /**
     * @var string
     *
     * @ORM\Column(name="InstantMessengerTypeCode", type="string", length=5, nullable=true)
     */
    private $InstantMessengerTypeCode;

    /**
     * @var string
     *
     * @ORM\Column(name="InstantMessengerUserName", type="string", length=50, nullable=true)
     */
    private $InstantMessengerUserName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="DepositAlertEmail", type="boolean", nullable=false)
     */
    private $DepositAlertEmail = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="DepositAlertSms", type="boolean", nullable=false)
     */
    private $DepositAlertSms = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="WithdrawAlertEmail", type="boolean", nullable=false)
     */
    private $WithdrawAlertEmail = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="WithdrawAlertSms", type="boolean", nullable=false)
     */
    private $WithdrawAlertSms = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="InstantMessengerTypeId", type="bigint", nullable=false)
     */
    private $InstantMessengerTypeId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PaymentRiskLevelId", type="bigint", nullable=false)
     */
    private $PaymentRiskLevelId = '0';
    
    /**
     *
     * One Player Profile have One Payment Risk Level
     *
     * @ORM\OneToOne(targetEntity="Paymentrisklevels")
     * @ORM\JoinColumn(name="PaymentRiskLevelId", referencedColumnName="Id")
     */
    private $PaymentRiskLevel;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="VipLevelId", type="bigint", nullable=false)
     */
    private $VipLevelId = '0';
    
    /**
     *
     * One Player Profile have One Vip Level
     *
     * @ORM\OneToOne(targetEntity="Viplevels")
     * @ORM\JoinColumn(name="VipLevelId", referencedColumnName="Id")
     */
    private $VipLevel;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="FraudRiskLevelId", type="bigint", nullable=false)
     */
    private $FraudRiskLevelId = '0';
    
    /**
     *
     * One Player Profile have One Fraud Risk Level
     *
     * @ORM\OneToOne(targetEntity="Fraudrisklevels")
     * @ORM\JoinColumn(name="FraudRiskLevelId", referencedColumnName="Id")
     */
    private $FraudRiskLevel;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="SecurityQuestionId1", type="bigint", nullable=false)
     */
    private $SecurityQuestionId1 = '0';
    
    /**
     *
     * One Player Profile have One Security Question 1
     *
     * @ORM\OneToOne(targetEntity="Securityquestions")
     * @ORM\JoinColumn(name="SecurityQuestionId1", referencedColumnName="Id")
     */
    private $SecurityQuestion1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="SecurityQuestionAnswer1", type="string", length=50, nullable=true)
     */
    private $SecurityQuestionAnswer1;

    /**
     * @var integer
     *
     * @ORM\Column(name="SecurityQuestionId2", type="bigint", nullable=false)
     */
    private $SecurityQuestionId2 = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="SecurityQuestionAnswer2", type="string", length=50, nullable=true)
     */
    private $SecurityQuestionAnswer2;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRegisterActivationType", type="integer", nullable=true)
     */
    private $PlayerRegisterActivationType;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerActivationStatus", type="integer", nullable=true)
     */
    private $PlayerActivationStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="AccountStatus", type="integer", nullable=true)
     */
    private $AccountStatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsLocked", type="boolean", nullable=false)
     */
    private $IsLocked = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="HasBeenUpdated", type="boolean", nullable=false)
     */
    private $HasBeenUpdated = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="LoginAttemp", type="integer", nullable=false)
     */
    private $LoginAttemp = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="BankAccountId", type="bigint", nullable=false)
     */
    private $BankAccountId = '0';

    /**
     *
     * One Player Profile have One Bank Account
     *
     * @ORM\OneToOne(targetEntity="Bankaccounts")
     * @ORM\JoinColumn(name="BankAccountId", referencedColumnName="Id")
     */
    private $BankAccount;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="WithdrawalLevelId", type="bigint", nullable=false)
     */
    private $WithdrawalLevelId = '0';
    
    /**
     *
     * One Player Profile have One Withdrawal Level
     *
     * @ORM\OneToOne(targetEntity="Withdrawallevels")
     * @ORM\JoinColumn(name="WithdrawalLevelId", referencedColumnName="Id")
     */
    private $WithdrawalLevel;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="WithdrawalBankAccountId", type="bigint", nullable=false)
     */
    private $WithdrawalBankAccountId = '0';
    
    /**
     *
     * One Player Profile have One Withdrawal Bank Account
     *
     * @ORM\OneToOne(targetEntity="Bankaccounts")
     * @ORM\JoinColumn(name="WithdrawalBankAccountId", referencedColumnName="Id")
     */
    private $WithdrawalBankAccount;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="CheckForFraud", type="boolean", nullable=false)
     */
    private $CheckForFraud = true;

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
     * @var boolean
     *
     * @ORM\Column(name="IsDoNotAllowBonus", type="boolean", nullable=false)
     */
    private $IsDoNotAllowBonus = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="AgentId", type="bigint", nullable=false)
     */
    private $AgentId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="SubAgentId", type="bigint", nullable=false)
     */
    private $SubAgentId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerCode", type="string", length=50, nullable=true)
     */
    private $PlayerCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="GameBetLimitLevelId", type="bigint", nullable=true)
     */
    private $GameBetLimitLevelId = '0';
    
    /**
     *
     * One Player Profile have One Game Bet Level
     *
     * @ORM\OneToOne(targetEntity="Gamebetlimitlevels")
     * @ORM\JoinColumn(name="GameBetLimitLevelId", referencedColumnName="Id")
     */
    private $GameBetLimitLevel;
    
    /**
     * @var string
     *
     * @ORM\Column(name="LineId", type="string", length=50, nullable=true)
     */
    private $LineId;

    /**
     * @var string
     *
     * @ORM\Column(name="WhatsappId", type="string", length=50, nullable=true)
     */
    private $WhatsappId;

    /**
     * @var string
     *
     * @ORM\Column(name="KakaoTalkId", type="string", length=50, nullable=true)
     */
    private $KakaoTalkId;

    /**
     * @var string
     *
     * @ORM\Column(name="SkypeId", type="string", length=50, nullable=true)
     */
    private $SkypeId;



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
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Playerprofiles
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set UserName
     *
     * @param string $UserName
     *
     * @return Playerprofiles
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * Set Title
     *
     * @param integer $Title
     *
     * @return Playerprofiles
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     * Get title
     *
     * @return integer
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set lastname
     *
     * @param string $LastName
     *
     * @return Playerprofiles
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
     * Set FirstName
     *
     * @param string $FirstName
     *
     * @return Playerprofiles
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
     * Set PlayerRegistrationId
     *
     * @param integer $PlayerRegistrationId
     *
     * @return Playerprofiles
     */
    public function setPlayerRegistrationId($PlayerRegistrationId)
    {
        $this->PlayerRegistrationId = $PlayerRegistrationId;

        return $this;
    }

    /**
     * Get PlayerRegistrationId
     *
     * @return integer
     */
    public function getPlayerRegistrationId()
    {
        return $this->PlayerRegistrationId;
    }

    /**
     * Set BirthDate
     *
     * @param \DateTime $BirthDate
     *
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * Set StateProvinceId
     *
     * @param integer $StateProvinceId
     *
     * @return Playerprofiles
     */
    public function setStateProvinceId($StateProvinceId)
    {
        $this->StateProvinceId = $StateProvinceId;

        return $this;
    }

    /**
     * Get StateProvinceId
     *
     * @return integer
     */
    public function getStateProvinceId()
    {
        return $this->StateProvinceId;
    }

    /**
     * Set Zip
     *
     * @param string $Zip
     *
     * @return Playerprofiles
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
     * Set CountryCode
     *
     * @param string $CountryCode
     *
     * @return Playerprofiles
     */
    public function setCountryCode($CountryCode)
    {
        $this->CountryCode = $CountryCode;

        return $this;
    }

    /**
     * Get CountryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    /**
     * Set CurrencyCode
     *
     * @param string $CurrencyCode
     *
     * @return Playerprofiles
     */
    public function setCurrencyCode($CurrencyCode)
    {
        $this->CurrencyCode = $CurrencyCode;

        return $this;
    }

    /**
     * Get CurrencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->CurrencyCode;
    }

    /**
     * Set Email
     *
     * @param string $Email
     *
     * @return Playerprofiles
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set FullName
     *
     * @param string $FullName
     *
     * @return Playerprofiles
     */
    public function setFullname($FullName)
    {
        $this->FullName = $FullName;

        return $this;
    }

    /**
     * Get FullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->FullName;
    }

    /**
     * Set WebChatUserName
     *
     * @param string $WebChatUserName
     *
     * @return Playerprofiles
     */
    public function setWebChatUserName($WebChatUserName)
    {
        $this->WebChatUserName = $WebChatUserName;

        return $this;
    }

    /**
     * Get WebChatUserName
     *
     * @return string
     */
    public function getWebChatUserName()
    {
        return $this->WebChatUserName;
    }

    /**
     * Set QQUserName
     *
     * @param string $QQUserName
     *
     * @return Playerprofiles
     */
    public function setQqusername($QQUserName)
    {
        $this->QQUserName = $QQUserName;

        return $this;
    }

    /**
     * Get QQUserName
     *
     * @return string
     */
    public function getQQUserName()
    {
        return $this->QQUserName;
    }

    /**
     * Set InstantMessengerTypeCode
     *
     * @param string $InstantMessengerTypeCode
     *
     * @return Playerprofiles
     */
    public function setInstantMessengerTypeCode($InstantMessengerTypeCode)
    {
        $this->InstantMessengerTypeCode = $InstantMessengerTypeCode;

        return $this;
    }

    /**
     * Get InstantMessengerTypeCode
     *
     * @return string
     */
    public function getInstantMessengerTypeCode()
    {
        return $this->InstantMessengerTypeCode;
    }

    /**
     * Set InstantMessengerUserName
     *
     * @param string $InstantMessengerUserName
     *
     * @return Playerprofiles
     */
    public function setInstantMessengerUserName($InstantMessengerUserName)
    {
        $this->InstantMessengerUserName = $InstantMessengerUserName;

        return $this;
    }

    /**
     * Get InstantMessengerUserName
     *
     * @return string
     */
    public function getInstantMessengerUserName()
    {
        return $this->InstantMessengerUserName;
    }

    /**
     * Set DepositAlertEmail
     *
     * @param boolean $DepositAlertEmail
     *
     * @return Playerprofiles
     */
    public function setDepositAlertEmail($DepositAlertEmail)
    {
        $this->DepositAlertEmail = $DepositAlertEmail;

        return $this;
    }

    /**
     * Get DepositAlertEmail
     *
     * @return boolean
     */
    public function getDepositAlertEmail()
    {
        return $this->DepositAlertEmail;
    }

    /**
     * Set DepositAlertSms
     *
     * @param boolean $DepositAlertSms
     *
     * @return Playerprofiles
     */
    public function setDepositAlertSms($DepositAlertSms)
    {
        $this->DepositAlertSms = $DepositAlertSms;

        return $this;
    }

    /**
     * Get DepositAlertSms
     *
     * @return boolean
     */
    public function getDepositAlertSms()
    {
        return $this->DepositAlertSms;
    }

    /**
     * Set WithdrawAlertEmail
     *
     * @param boolean $WithdrawAlertEmail
     *
     * @return Playerprofiles
     */
    public function setWithdrawAlertEmail($WithdrawAlertEmail)
    {
        $this->WithdrawAlertEmail = $WithdrawAlertEmail;

        return $this;
    }

    /**
     * Get WithdrawAlertEmail
     *
     * @return boolean
     */
    public function getWithdrawAlertEmail()
    {
        return $this->WithdrawAlertEmail;
    }

    /**
     * Set WithdrawAlertSms
     *
     * @param boolean $WithdrawAlertSms
     *
     * @return Playerprofiles
     */
    public function setWithdrawAlertSms($WithdrawAlertSms)
    {
        $this->WithdrawAlertSms = $WithdrawAlertSms;

        return $this;
    }

    /**
     * Get WithdrawAlertSms
     *
     * @return boolean
     */
    public function getWithdrawAlertSms()
    {
        return $this->WithdrawAlertSms;
    }

    /**
     * Set InstantMessengerTypeId
     *
     * @param integer $InstantMessengerTypeId
     *
     * @return Playerprofiles
     */
    public function setInstantMessengerTypeId($InstantMessengerTypeId)
    {
        $this->InstantMessengerTypeId = $InstantMessengerTypeId;

        return $this;
    }

    /**
     * Get InstantMessengerTypeId
     *
     * @return integer
     */
    public function getInstantMessengerTypeId()
    {
        return $this->InstantMessengerTypeId;
    }

    /**
     * Set PaymentRiskLevelId
     *
     * @param integer $PaymentRiskLevelId
     *
     * @return Playerprofiles
     */
    public function setPaymentRiskLevelId($PaymentRiskLevelId)
    {
        $this->PaymentRiskLevelId = $PaymentRiskLevelId;

        return $this;
    }

    /**
     * Get PaymentRiskLevelId
     *
     * @return integer
     */
    public function getPaymentRiskLevelId()
    {
        return $this->PaymentRiskLevelId;
    }

    /**
     * Set VipLevelId
     *
     * @param integer $VipLevelId
     *
     * @return Playerprofiles
     */
    public function setVipLevelId($VipLevelId)
    {
        $this->VipLevelId = $VipLevelId;

        return $this;
    }

    /**
     * Get VipLevelId
     *
     * @return integer
     */
    public function getVipLevelId()
    {
        return $this->VipLevelId;
    }

    /**
     * Set FraudRiskLevelId
     *
     * @param integer $FraudRiskLevelId
     *
     * @return Playerprofiles
     */
    public function setFraudRiskLevelId($FraudRiskLevelId)
    {
        $this->FraudRiskLevelId = $FraudRiskLevelId;

        return $this;
    }

    /**
     * Get FraudRiskLevelId
     *
     * @return integer
     */
    public function getFraudRiskLevelId()
    {
        return $this->FraudRiskLevelId;
    }

    /**
     * Set SecurityQuestionId1
     *
     * @param integer $SecurityQuestionId1
     *
     * @return Playerprofiles
     */
    public function setSecurityQuestionId1($SecurityQuestionId1)
    {
        $this->SecurityQuestionId1 = $SecurityQuestionId1;

        return $this;
    }

    /**
     * Get SecurityQuestionId1
     *
     * @return integer
     */
    public function getSecurityQuestionId1()
    {
        return $this->SecurityQuestionId1;
    }

    /**
     * Set SecurityQuestionAnswer1
     *
     * @param string $SecurityQuestionAnswer1
     *
     * @return Playerprofiles
     */
    public function setSecurityQuestionAnswer1($SecurityQuestionAnswer1)
    {
        $this->SecurityQuestionAnswer1 = $SecurityQuestionAnswer1;

        return $this;
    }

    /**
     * Get SecurityQuestionAnswer1
     *
     * @return string
     */
    public function getSecurityQuestionAnswer1()
    {
        return $this->SecurityQuestionAnswer1;
    }

    /**
     * Set SecurityQuestionId2
     *
     * @param integer $SecurityQuestionId2
     *
     * @return Playerprofiles
     */
    public function setSecurityQuestionId2($SecurityQuestionId2)
    {
        $this->SecurityQuestionId2 = $SecurityQuestionId2;

        return $this;
    }

    /**
     * Get SecurityQuestionId2
     *
     * @return integer
     */
    public function getSecurityQuestionId2()
    {
        return $this->SecurityQuestionId2;
    }

    /**
     * Set SecurityQuestionAnswer2
     *
     * @param string $SecurityQuestionAnswer2
     *
     * @return Playerprofiles
     */
    public function setSecurityQuestionAnswer2($SecurityQuestionAnswer2)
    {
        $this->SecurityQuestionAnswer2 = $SecurityQuestionAnswer2;

        return $this;
    }

    /**
     * Get SecurityQuestionAnswer2
     *
     * @return string
     */
    public function getSecurityQuestionAnswer2()
    {
        return $this->SecurityQuestionAnswer2;
    }

    /**
     * Set PlayerRegisterActivationType
     *
     * @param integer $PlayerRegisterActivationType
     *
     * @return Playerprofiles
     */
    public function setPlayerRegisterActivationType($PlayerRegisterActivationType)
    {
        $this->PlayerRegisterActivationType = $PlayerRegisterActivationType;

        return $this;
    }

    /**
     * Get PlayerRegisterActivationType
     *
     * @return integer
     */
    public function getPlayerRegisterActivationType()
    {
        return $this->PlayerRegisterActivationType;
    }

    /**
     * Set PlayerActivationStatus
     *
     * @param integer $PlayerActivationStatus
     *
     * @return Playerprofiles
     */
    public function setPlayerActivationStatus($PlayerActivationStatus)
    {
        $this->PlayerActivationStatus = $PlayerActivationStatus;

        return $this;
    }

    /**
     * Get PlayerActivationStatus
     *
     * @return integer
     */
    public function getPlayerActivationStatus()
    {
        return $this->PlayerActivationStatus;
    }

    /**
     * Set AccountStatus
     *
     * @param integer $AccountStatus
     *
     * @return Playerprofiles
     */
    public function setAccountStatus($AccountStatus)
    {
        $this->AccountStatus = $AccountStatus;

        return $this;
    }

    /**
     * Get AccountStatus
     *
     * @return integer
     */
    public function getAccountStatus()
    {
        return $this->AccountStatus;
    }

    /**
     * Set IsLocked
     *
     * @param boolean $IsLocked
     *
     * @return Playerprofiles
     */
    public function setIsLocked($IsLocked)
    {
        $this->IsLocked = $IsLocked;

        return $this;
    }

    /**
     * Get IsLocked
     *
     * @return boolean
     */
    public function getIsLocked()
    {
        return $this->IsLocked;
    }

    /**
     * Set HasBeenUpdated
     *
     * @param boolean $HasBeenUpdated
     *
     * @return Playerprofiles
     */
    public function setHasBeenUpdated($HasBeenUpdated)
    {
        $this->HasBeenUpdated = $HasBeenUpdated;

        return $this;
    }

    /**
     * Get HasBeenUpdated
     *
     * @return boolean
     */
    public function getHasBeenUpdated()
    {
        return $this->HasBeenUpdated;
    }

    /**
     * Set LoginAttemp
     *
     * @param integer $LoginAttemp
     *
     * @return Playerprofiles
     */
    public function setLoginAttemp($LoginAttemp)
    {
        $this->LoginAttemp = $LoginAttemp;

        return $this;
    }

    /**
     * Get LoginAttemp
     *
     * @return integer
     */
    public function getLoginAttemp()
    {
        return $this->LoginAttemp;
    }

    /**
     * Set BankAccountId
     *
     * @param integer $BankAccountId
     *
     * @return Playerprofiles
     */
    public function setBankAccountId($BankAccountId)
    {
        $this->BankAccountId = $BankAccountId;

        return $this;
    }

    /**
     * Get BankAccountId
     *
     * @return integer
     */
    public function getBankAccountId()
    {
        return $this->BankAccountId;
    }

    /**
     * Set WithdrawalLevelId
     *
     * @param integer $WithdrawalLevelId
     *
     * @return Playerprofiles
     */
    public function setWithdrawalLevelId($WithdrawalLevelId)
    {
        $this->WithdrawalLevelId = $WithdrawalLevelId;

        return $this;
    }

    /**
     * Get WithdrawalLevelId
     *
     * @return integer
     */
    public function getWithdrawalLevelId()
    {
        return $this->WithdrawalLevelId;
    }

    /**
     * Set WithdrawalBankAccountId
     *
     * @param integer $WithdrawalBankAccountId
     *
     * @return Playerprofiles
     */
    public function setWithdrawalBankAccountId($WithdrawalBankAccountId)
    {
        $this->WithdrawalBankAccountId = $WithdrawalBankAccountId;

        return $this;
    }

    /**
     * Get WithdrawalBankAccountId
     *
     * @return integer
     */
    public function getWithdrawalBankAccountId()
    {
        return $this->WithdrawalBankAccountId;
    }

    /**
     * Set CheckForFraud
     *
     * @param boolean $CheckForFraud
     *
     * @return Playerprofiles
     */
    public function setCheckForFraud($CheckForFraud)
    {
        $this->CheckForFraud = $CheckForFraud;

        return $this;
    }

    /**
     * Get CheckForFraud
     *
     * @return boolean
     */
    public function getCheckForFraud()
    {
        return $this->CheckForFraud;
    }

    /**
     * Set CreatedbyId
     *
     * @param string $CreatedbyId
     *
     * @return Playerprofiles
     */
    public function setCreatedbyId($CreatedbyId)
    {
        $this->CreatedbyId = $CreatedbyId;

        return $this;
    }

    /**
     * Get CreatedbyId
     *
     * @return string
     */
    public function getCreatedbyId()
    {
        return $this->CreatedbyId;
    }

    /**
     * Set ModifiedById
     *
     * @param string $ModifiedById
     *
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * @return Playerprofiles
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
     * Set IsDoNotAllowBonus
     *
     * @param boolean $IsDoNotAllowBonus
     *
     * @return Playerprofiles
     */
    public function setIsDoNotAllowBonus($IsDoNotAllowBonus)
    {
        $this->IsDoNotAllowBonus = $IsDoNotAllowBonus;

        return $this;
    }

    /**
     * Get IsDoNotAllowBonus
     *
     * @return boolean
     */
    public function getIsDoNotAllowBonus()
    {
        return $this->IsDoNotAllowBonus;
    }

    /**
     * Set AgentId
     *
     * @param integer $AgentId
     *
     * @return Playerprofiles
     */
    public function setAgentId($AgentId)
    {
        $this->AgentId = $AgentId;

        return $this;
    }

    /**
     * Get AgentId
     *
     * @return integer
     */
    public function getAgentId()
    {
        return $this->AgentId;
    }

    /**
     * Set SubAgentId
     *
     * @param integer $SubAgentId
     *
     * @return Playerprofiles
     */
    public function setSubAgentId($SubAgentId)
    {
        $this->SubAgentId = $SubAgentId;

        return $this;
    }

    /**
     * Get SubAgentId
     *
     * @return integer
     */
    public function getSubAgentId()
    {
        return $this->SubAgentId;
    }

    /**
     * Set PlayerCode
     *
     * @param string $PlayerCode
     *
     * @return Playerprofiles
     */
    public function setPlayerCode($PlayerCode)
    {
        $this->PlayerCode = $PlayerCode;

        return $this;
    }

    /**
     * Get PlayerCode
     *
     * @return string
     */
    public function getPlayerCode()
    {
        return $this->PlayerCode;
    }

    /**
     * Set GameBetLimitLevelId
     *
     * @param integer $GameBetLimitLevelId
     *
     * @return Playerprofiles
     */
    public function setGameBetLimitLevelId($GameBetLimitLevelId)
    {
        $this->GameBetLimitLevelId = $GameBetLimitLevelId;

        return $this;
    }

    /**
     * Get GameBetLimitLevelId
     *
     * @return integer
     */
    public function getGameBetLimitLevelId()
    {
        return $this->GameBetLimitLevelId;
    }

    /**
     * Set LineId
     *
     * @param string $LineId
     *
     * @return Playerprofiles
     */
    public function setLineId($LineId)
    {
        $this->LineId = $LineId;

        return $this;
    }

    /**
     * Get LineId
     *
     * @return string
     */
    public function getLineId()
    {
        return $this->LineId;
    }

    /**
     * Set WhatsappId
     *
     * @param string $WhatsappId
     *
     * @return Playerprofiles
     */
    public function setWhatsappId($WhatsappId)
    {
        $this->WhatsappId = $WhatsappId;

        return $this;
    }

    /**
     * Get WhatsappId
     *
     * @return string
     */
    public function getWhatsappId()
    {
        return $this->WhatsappId;
    }

    /**
     * Set KakaoTalkId
     *
     * @param string $KakaoTalkId
     *
     * @return Playerprofiles
     */
    public function setKakaoTalkId($KakaoTalkId)
    {
        $this->KakaoTalkId = $KakaoTalkId;

        return $this;
    }

    /**
     * Get KakaoTalkId
     *
     * @return string
     */
    public function getKakaoTalkId()
    {
        return $this->KakaoTalkId;
    }

    /**
     * Set SkypeId
     *
     * @param string $SkypeId
     *
     * @return Playerprofiles
     */
    public function setSkypeId($SkypeId)
    {
        $this->SkypeId = $SkypeId;

        return $this;
    }

    /**
     * Get SkypeId
     *
     * @return string
     */
    public function getSkypeId()
    {
        return $this->SkypeId;
    }

//     /**
//      * Set PlayerRegistration
//      *
//      * @param \PandoraBundle\Entity\PlayerRegistrations $PlayerRegistration
//      *
//      * @return Playerprofiles
//      */
//     public function setPlayerRegistration(\PandoraBundle\Entity\PlayerRegistrations $PlayerRegistration = null)
//     {
//         $this->PlayerRegistration = $PlayerRegistration;

//         return $this;
//     }
    
//     /**
//      * Get PlayerRegistration
//      *
//      * @return \PandoraBundle\Entity\PlayerRegistrations
//      */
//     public function getPlayerRegistration()
//     {
//         return $this->PlayerRegistration;
//     }
    
//     /**
//      * Set Wallet
//      *
//      * @param \PandoraBundle\Entity\Wallets $Wallet
//      *
//      * @return Playerprofiles
//      */
//     public function setWallet(\PandoraBundle\Entity\Wallets $Wallet = null)
//     {
//         $this->Wallet = $Wallet;

//         return $this;
//     }

//     /**
//      * Get Wallet
//      *
//      * @return \PandoraBundle\Entity\Wallets
//      */
//     public function getWallet()
//     {
//         return $this->Wallet;
//     }
    
//     /**
//      * Set Affiliate
//      *
//      * @param \AppBundle\Entity\Affiliates $Affiliate
//      *
//      * @return Playerprofiles
//      */
//     public function setAffiliate(\AppBundle\Entity\Affiliates $Affiliate = null)
//     {
//         $this->Affiliate = $Affiliate;
        
//         return $this;
//     }
    
//     /**
//      * Get Affiliate
//      *
//      * @return \AppBundle\Entity\Affiliates
//      */
//     public function getAffiliate()
//     {
//         return $this->Affiliate;
//     }
    
//     /**
//      * Set VipLevel
//      *
//      * @param \PandoraBundle\Entity\Viplevels $VipLevel
//      *
//      * @return Playerprofiles
//      */
//     public function setVipLevel(\PandoraBundle\Entity\Viplevels $VipLevel = null)
//     {
//         $this->VipLevel = $VipLevel;
        
//         return $this;
//     }
    
//     /**
//      * Get VipLevel
//      *
//      * @return \AppBundle\Entity\Viplevels
//      */
//     public function getVipLevel()
//     {
//         return $this->VipLevel;
//     }
    
//     /**
//      * Set PaymentRiskLevel
//      *
//      * @param \PandoraBundle\Entity\Paymentrisklevels $PaymentRiskLevel
//      *
//      * @return Playerprofiles
//      */
//     public function setPaymentRiskLevel(\PandoraBundle\Entity\Paymentrisklevels $PaymentRiskLevel = null)
//     {
//         $this->PaymentRiskLevel = $PaymentRiskLevel;
        
//         return $this;
//     }
    
//     /**
//      * Get PaymentRiskLevel
//      *
//      * @return \AppBundle\Entity\Paymentrisklevels
//      */
//     public function getPaymentRiskLevel()
//     {
//         return $this->PaymentRiskLevel;
//     }
    
//     /**
//      * Set WithdrawalLevel
//      *
//      * @param \PandoraBundle\Entity\Withdrawallevels $WithdrawalLevel
//      *
//      * @return Playerprofiles
//      */
//     public function setWithdrawalLevel(\PandoraBundle\Entity\Withdrawallevels $WithdrawalLevel = null)
//     {
//         $this->WithdrawalLevel = $WithdrawalLevel;
        
//         return $this;
//     }
    
//     /**
//      * Get WithdrawalLevel
//      *
//      * @return \PandoraBundle\Entity\Withdrawallevels
//      */
//     public function getWithdrawalLevel()
//     {
//         return $this->WithdrawalLevel;
//     }
    
//     /**
//      * Set FraudRiskLevel
//      *
//      * @param \AppBundle\Entity\Fraudrisklevels $FraudRiskLevel
//      *
//      * @return Playerprofiles
//      */
//     public function setFraudRiskLevel(\PandoraBundle\Entity\Fraudrisklevels $FraudRiskLevel = null)
//     {
//         $this->FraudRiskLevel = $FraudRiskLevel;
        
//         return $this;
//     }
    
//     /**
//      * Get FraudRiskLevel
//      *
//      * @return \PandoraBundle\Entity\Fraudrisklevels
//      */
//     public function getFraudRiskLevel()
//     {
//         return $this->FraudRiskLevel;
//     }
    
//     /**
//      * Set GameBetLimitLevel
//      *
//      * @param \PandoraBundle\Entity\Gamebetlimitlevels $GameBetLimitLevel
//      *
//      * @return Playerprofiles
//      */
//     public function setGameBetLimitLevel(\PandoraBundle\Entity\Gamebetlimitlevels $GameBetLimitLevel = null)
//     {
//         $this->GameBetLimitLevel = $GameBetLimitLevel;
        
//         return $this;
//     }
    
//     /**
//      * Get GameBetLimitLevel
//      *
//      * @return \PandoraBundle\Entity\Gamebetlimitlevels
//      */
//     public function getGameBetLimitLevel()
//     {
//         return $this->GameBetLimitLevel;
//     }
    
//     /**
//      * Set BankAccount
//      *
//      * @param \PandoraBundle\Entity\Bankaccounts $BankAccount
//      *
//      * @return Playerprofiles
//      */
//     public function setBankAccount(\PandoraBundle\Entity\Bankaccounts $BankAccount = null)
//     {
//         $this->BankAccount = $BankAccount;
        
//         return $this;
//     }
    
//     /**
//      * Get BankAccount
//      *
//      * @return \PandoraBundle\Entity\Bankaccounts
//      */
//     public function getBankAccount()
//     {
//         return $this->BankAccount;
//     }
    
//     /**
//      * Set WithdrawalBankAccount
//      *
//      * @param \PandoraBundle\Entity\Bankaccounts $WithdrawalBankAccount
//      *
//      * @return Playerprofiles
//      */
//     public function setWithdrawalBankAccount(\PandoraBundle\Entity\Bankaccounts $WithdrawalBankAccount = null)
//     {
//         $this->WithdrawalBankAccount = $WithdrawalBankAccount;
        
//         return $this;
//     }
    
//     /**
//      * Get WithdrawalBankAccount
//      *
//      * @return \PandoraBundle\Entity\Bankaccounts
//      */
//     public function getWithdrawalBankAccount()
//     {
//         return $this->WithdrawalBankAccount;
//     }
    
}
