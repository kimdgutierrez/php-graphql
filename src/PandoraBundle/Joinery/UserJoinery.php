<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
// use PandoraBundle\GraphQL\Config\ColumnTypes\SerializedType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use PandoraBundle\GraphQL\Enum\GenderTypeEnum;
use PandoraBundle\GraphQL\Enum\UserRoleTypeEnum;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\BooleanType;

class UserJoinery{
    
    public static function fields(){
        return [
            'id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.id',
            ],
            'username' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.username'
            ],
            'email' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.email'
            ],
            'Title' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.Title'
            ],
            'LastName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LastName'
            ],
            'BrandMarkets' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandMarkets'
            ],
            'FirstName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FirstName'
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
            'Zip' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Zip'
            ],
            'enabled' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.enabled'
            ],
            'default_password' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.default_password'
            ],
            'password_requested_at'  => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.password_requested_at'
            ],
            'roles' => [
                'type' => new UserRoleTypeEnum(),
                'joineryTerm' => 'a.roles'
            ],
            'AspNetUserId'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AspNetUserId'
            ],
            'TeamId'  => [
                'type' => new IdType(),
                'joineryTerm' => 'a.TeamId'
            ],
        ];
    }
}