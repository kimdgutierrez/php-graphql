<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class GenderTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Not_Defined',
            ],
            [
                'value' => 1,
                'name'  => 'Male',
            ],
            [
                'value' => 2,
                'name'  => 'Female',
            ]
        ];
    }
}