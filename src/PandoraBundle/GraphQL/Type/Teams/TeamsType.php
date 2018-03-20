<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\Teams;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\Joinery\TeamsJoinery;

class TeamsType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(TeamsJoinery::fields());
    }
}