<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class PlayerTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'REAL',
            ],
            [
                'value' => 1,
                'name'  => 'HOUSE',
            ],
            [
                'value' => 2,
                'name'  => 'TEST',
            ],
            [
                'value' => 3,
                'name'  => 'SHOP',
            ]
        ];
    }
}