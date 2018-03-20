<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class SecurityQuestionJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'SecurityQuestionDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecurityQuestionDesc'
            ],
            'CreatedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new IdType(),
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
            'Chinese_Description' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Chinese_Description'
            ],
            'Indonesian_Description' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Indonesian_Description'
            ],
            'Thai_Description' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Thai_Description'
            ],
            'Japanese_Description' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Japanese_Description'
            ],
            'Korean_Description' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Korean_Description'
            ]
        ];
    }
}