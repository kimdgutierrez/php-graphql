<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\User;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use PandoraBundle\GraphQL\Type\User\UserRoleType;
use PandoraBundle\Utility\RolesType;

class UserRoleListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'User Role List';
    }

    public function build(FieldConfig $config)
    {
    }
    
    public function getType()
    {
        return new PaginatedResultType(new UserRoleType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return [
            'items' => RolesType::getRolesAsOptions($this->container->getParameter('security.role_hierarchy.roles'))
        ];
    }
}