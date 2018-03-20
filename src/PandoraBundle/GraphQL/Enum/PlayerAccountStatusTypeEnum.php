<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class PlayerAccountStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Created',
            ],
            [
                'value' => 1,
                'name'  => 'Verified_by_Player',
            ],
            [
                'value' => 2,
                'name'  => 'Verified_by_CS',
            ],
            [
                'value' => 3,
                'name'  => 'Completed',
            ],
            [
                'value' => 4,
                'name'  => 'Locked',
            ],
            [
                'value' => 5,
                'name'  => 'UnLocked',
            ],
            [
                'value' => 6,
                'name'  => 'Failed_Login',
            ],
            [
                'value' => 7,
                'name'  => 'De_Activated',
            ],
            [
                'value' => 8,
                'name'  => 'Re_Activated',
            ],
            [
                'value' => 9,
                'name'  => 'Password_Reset',
            ],
            [
                'value' => 10,
                'name'  => 'Archived',
            ]
        ];
    }
}