<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\BooleanType;

class UserAccessJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.Id',
            ],
            'Roles' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Roles'
            ],
            'Method' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.Method'
            ],
            'MethodName' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.MethodName'
            ],
            'Allow' => [
                'type' => new NonNullType(new BooleanType()),
                'joineryTerm' => 'a.MethodName'
            ],
            'Success' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.MethodName'
            ]
        ];
    }
}