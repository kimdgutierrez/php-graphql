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
use Youshido\GraphQL\Type\ListType\ListType;
// use Youshido\GraphQL\Type\Scalar\StringType;
// use Youshido\GraphQL\Type\NonNullType;
// use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Type\User\UserType;
use PandoraBundle\Resolver\UserResolver;

class UserPersonalInfoField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'User Personal Info View';
    }

    public function build(FieldConfig $config)
    {
    }
    
    public function getType()
    {
        return new ListType(new UserType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(UserResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        // MODIFY USER ROLE FIELD
        $userInfo = $entityResolver->getQueryBuilderSingleResultPersonalUser();
        $userInfo[0]['roles'] = $userInfo[0]['roles'][0];
        
        return $userInfo;
    }
}