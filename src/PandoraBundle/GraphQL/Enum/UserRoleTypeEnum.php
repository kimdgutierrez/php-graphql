<?php
namespace PandoraBundle\GraphQL\Enum;

use PandoraBundle\Utility\RolesType;
use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class UserRoleTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        global $kernel;
        return RolesType::getRolesAsEnum($kernel->getContainer()->getParameter('security.role_hierarchy.roles'));
    }
}