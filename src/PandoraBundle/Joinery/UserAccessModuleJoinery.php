<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UserAccessModuleJoinery{
    
    public static function fields(){
        return [
            'ModuleName' => [
                'type' => new NonNullType(new StringType()),
            ],
            'ModuleSystemName' => [
                'type' => new NonNullType(new StringType()),
            ],
            'ModuleDescription' => [
                'type' => new NonNullType(new StringType()),
            ],
            'ModuleType' => [
                'type' => new NonNullType(new StringType()),
            ]
        ];
    }
}