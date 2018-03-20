<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query;

use PandoraBundle\GraphQL\Query\User\UserField;
use PandoraBundle\GraphQL\Query\User\UserListField;
use PandoraBundle\GraphQL\Query\User\UserRoleListField;
use PandoraBundle\GraphQL\Query\UserAccess\UserAccessListField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\GraphQL\Query\UserAccess\UserAccessModuleListField;
use PandoraBundle\GraphQL\Query\PlayerProfile\PlayerProfileField;
use PandoraBundle\GraphQL\Query\PlayerProfile\PlayerProfileListField;
use PandoraBundle\GraphQL\Query\SecurityQuestion\SecurityQuestionField;
use PandoraBundle\GraphQL\Query\SecurityQuestion\SecurityQuestionListField;
use PandoraBundle\GraphQL\Query\User\UserPersonalInfoField;
use PandoraBundle\GraphQL\Query\Teams\TeamsListField;
use PandoraBundle\GraphQL\Query\Teams\TeamsField;

class QueryType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new PlayerProfileField(),
            new PlayerProfileListField(),
            new UserField(),
            new UserPersonalInfoField(),
            new UserListField(),
            new UserRoleListField(),
            new UserAccessListField(),
            new UserAccessModuleListField(),
            new SecurityQuestionField(),
            new SecurityQuestionListField(),
            new TeamsField(),
            new TeamsListField(),
        ]);
    }
}