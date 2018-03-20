<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class YAxisTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 'SINGLE',
                'name'  => 'SINGLE',
            ],
            [
                'value' => 'MULTI',
                'name'  => 'MULTI',
            ]
        ];
    }
}