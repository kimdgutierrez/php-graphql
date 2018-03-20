<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class FilterExpressionsType extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'name'  => 'EQUALS',
                'value' => '=',
            ],
            [
                'name'  => 'GREATER_THAN',
                'value' => '>',
            ],
            [
                'name'  => 'GREATER_THAN_OR_EQUAL',
                'value' => '>=',
            ],
            [
                'name'  => 'LESS_THAN',
                'value' => '<',
            ],
            [
                'name'  => 'LESS_THAN_OR_EQUAL',
                'value' => '<=',
            ],
            [
                'name'  => 'CONTAINS',
                'value' => '%@%',
            ],
//             [
//                 'name'  => 'BETWEEN',
//                 'value' => 'BETWEEN',
//             ],
        ];
    }
    
}