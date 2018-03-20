<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class CountryTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 'CN',
                'name'  => 'China',
            ],
            [
                'value' => 'JA',
                'name'  => 'Japan',
            ],
            [
                'value' => 'KO',
                'name'  => 'Korea',
            ],
            [
                'value' => 'MY',
                'name'  => 'Malaysia',
            ],
            [
                'value' => 'TH',
                'name'  => 'Thailand',
            ]
        ];
    }
}