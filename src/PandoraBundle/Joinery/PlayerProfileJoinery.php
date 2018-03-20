<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\CountryTypeEnum;
use PandoraBundle\GraphQL\Enum\GenderTypeEnum;
use PandoraBundle\GraphQL\Enum\PlayerAccountStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\PlayerTypeEnum;

class PlayerProfileJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserId'
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'Title' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Title'
            ],
            'LastName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LastName'
            ],
            'FirstName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FirstName'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerRegistrationId'
            ],
            'BirthDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.BirthDate'
            ],
            'Gender' => [
                'type' => new GenderTypeEnum(),
                'joineryTerm' => 'a.Gender'
            ],
            'Street1' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Street1'
            ],
            'Street2' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Street2'
            ],
            'CityCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CityCode'
            ],
            'RegionCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RegionCode'
            ],
            'StateProvinceCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.StateProvinceCode'
            ],
            'StateProvinceId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.StateProvinceId'
            ],
            'Zip' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Zip'
            ],
            'CountryCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CountryCode'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'Email' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CurrencyCode'
            ],
            'FullName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FullName'
            ],
            'WebChatUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WebChatUserName'
            ],
            'QQUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.QQUserName'
            ],
            'InstantMessengerUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.InstantMessengerUserName'
            ],
            'DepositAlertEmail' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.DepositAlertEmail'
            ],
            'DepositAlertSms' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.DepositAlertSms'
            ],
            'WithdrawAlertEmail' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.WithdrawAlertEmail'
            ],
            'WithdrawAlertSms' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.WithdrawAlertSms'
            ],
            'InstantMessengerTypeId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.InstantMessengerTypeId'
            ],
            'PaymentRiskLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PaymentRiskLevelId'
            ],
            'VipLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.VipLevelId'
            ],
            'FraudRiskLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.FraudRiskLevelId'
            ],
            'SecurityQuestionId1' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SecurityQuestionId1'
            ],
            'SecurityQuestionAnswer1' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecurityQuestionAnswer1'
            ],
            'SecurityQuestionId2' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SecurityQuestionId2'
            ],
            'SecurityQuestionAnswer2' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecurityQuestionAnswer2'
            ],
            'PlayerRegisterActivationType' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.PlayerRegisterActivationType'
            ],
            'PlayerActivationStatus' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerActivationStatus'
            ],
            'AccountStatus' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AccountStatus'
            ],
            'IsLocked' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsLocked'
            ],
            'HasBeenUpdated' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.HasBeenUpdated'
            ],
            'LoginAttemp' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.LoginAttemp'
            ],
            'BankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankAccountId'
            ],
            'WithdrawalLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WithdrawalLevelId'
            ],
            'WithdrawalBankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WithdrawalBankAccountId'
            ],
            'CheckForFraud' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.CheckForFraud'
            ],
            'IsDoNotAllowBonus' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsDoNotAllowBonus'
            ],
            'AgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AgentId'
            ],
            'SubAgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SubAgentId'
            ],
            'PlayerCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerCode'
            ],
            'GameBetLimitLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GameBetLimitLevelId'
            ],
            'LineId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LineId'
            ],
            'WhatsappId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WhatsappId'
            ],
            'KakaoTalkId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.KakaoTalkId'
            ],
            'SkypeId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SkypeId'
            ],
            'CreatedById' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ModifiedById'
            ],
            'DateCreated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated'
            ],
            'DateModified' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified'
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
            ],
            'Country' => [
                'type' => new CountryTypeEnum(),
                'joineryTerm' => 'a.CountryCode AS Country'
            ],
            'AccountStatus' => [
                'type' => new PlayerAccountStatusTypeEnum(),
                'joineryTerm' => 'a.AccountStatus'
            ],
            'DaysRegistered' => [
                'type' => new StringType(),
                'joineryTerm' => 'DATE_DIFF(CURRENT_TIME(), b.DateCreated) AS DaysRegistered'
            ],
            'LockedBalance' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(wla.ActualDepositAmount) FROM PandoraBundle:Walletdeposits AS wla WHERE wla.WalletId = c.Id AND wla.Status = 2 AND wla.IsWageringFulfilled = 0) AS LockedBalance' // 2 MEANS APPROVED STATUS
            ],
            
            /* PLAYER REGISTRATION FIELDs */
            'UserAccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserAccountNo'
            ],
            'MobileNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.MobileNo'
            ],
            'Email' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.Email'
            ],
            'PlayerType' => [
                'type' => new PlayerTypeEnum(),
                'joineryTerm' => 'b.PlayerType'
            ],
            'RegistrationDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'b.DateCreated AS RegistrationDate'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.CurrencyCode'
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
            ],
            'SourceUrl' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.SrcUrl AS SourceUrl'
            ],
            'Platform' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.Platform'
            ],
            'IsEmailVerified' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'b.IsEmailVerified'
            ],
            'IsMobileVerified' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'b.IsMobileVerified'
            ],
            'IPAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.IPAddress'
            ],
            'LastLoginTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'b.LastLoginTime'
            ],
            'LastLoginIPAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.LastLoginIPAddress'
            ],
            'PlayerRegisterStatus' => [
                'type' => new PlayerAccountStatusTypeEnum(),
                'joineryTerm' => 'b.PlayerRegisterStatus'
            ],
            
            
            /* WALLET FIELDS */
            'WalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.WalletCode'
            ],
            'WalletLastUpdated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'c.WalletLastUpdated'
            ],
            'Balance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'c.Balance'
            ],
            'WithdrawableAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'c.WithdrawableAmount'
            ],
            
            
            /* VIP FIELDS */
            'VipLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.VipLevelName'
            ],
            
            
            /* PAYMENT RISK LEVEL FIELDS */
            'PaymentRiskLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.PaymentRiskLevelName'
            ],
            
            
            /* WITHDRAWAL LEVEL FIELDS */
            'WithdrawalLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'f.WithdrawalLevelName'
            ],
            
            /* FRAUD RISK LEVEL FIELDS */
            'FraudRiskLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'g.FraudRiskLevelName'
            ],
            
            
            /* SECURITY QUESTION FIELDS */
            'SecurityQuestionDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'h.SecurityQuestionDesc'
            ],
            
            /* GAME BET LIMIT FIELDS */
            'BetLimitLevelDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.BetLimitLevelDesc'
            ],
            
            /* GAME BET LIMIT FIELDS */
            'DepositBankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'j.BankName AS DepositBankName'
            ],
            
            
            /* GAME BET LIMIT FIELDS */
            'WithdrawalBankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'k.BankName AS WithdrawalBankName'
            ]
        ];
    }
}
