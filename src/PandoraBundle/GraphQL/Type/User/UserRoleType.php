<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\User;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UserRoleType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'role_name' => [
                'type' => new NonNullType(new StringType()),
            ],
            'role_code' => [
                'type' => new NonNullType(new StringType()),
            ],
            'role_name_readable' => [
                'type' => new StringType(),
            ]
        ]);
    }
}