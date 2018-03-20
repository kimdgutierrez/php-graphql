<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation;

use PandoraBundle\GraphQL\Mutation\SecurityQuestion\SecurityQuestionMutationType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\GraphQL\Mutation\UserAccess\UserAccessMutationType;
use PandoraBundle\GraphQL\Mutation\User\UserMutationType;
use PandoraBundle\GraphQL\Mutation\User\UserPersonalInfoMutationType;
use PandoraBundle\GraphQL\Mutation\Teams\TeamsMutationType;

class MutationType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new UserMutationType(),
            new UserPersonalInfoMutationType(),
            new UserAccessMutationType(),
            new SecurityQuestionMutationType(),
            new TeamsMutationType()
        ]);
    }
}