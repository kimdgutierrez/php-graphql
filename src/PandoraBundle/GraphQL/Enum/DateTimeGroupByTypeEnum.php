<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class DateTimeGroupByTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 'DAY',
                'name'  => 'DAY',
            ],
            [
                'value' => 'WEEK',
                'name'  => 'WEEK',
            ],
            [
                'value' => 'YEARMONTH',
                'name'  => 'MONTH',
            ],
            [
                'value' => 'QUARTER',
                'name'  => 'QUARTER',
            ],
            [
                'value' => 'YEAR',
                'name'  => 'YEAR',
            ]
        ];
    }
}