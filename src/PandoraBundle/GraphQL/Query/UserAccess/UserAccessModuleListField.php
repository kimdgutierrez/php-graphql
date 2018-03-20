<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\UserAccess;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use PandoraBundle\GraphQL\Type\UserAccessModule\UserAccessModuleType;
use PandoraBundle\Utility\ModuleListing;

class UserAccessModuleListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'User Access Module List';
    }

    public function build(FieldConfig $config)
    {
    }
    
    public function getType()
    {
        return new PaginatedResultType(new UserAccessModuleType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return ['items' => ModuleListing::getList()];
    }
    
}