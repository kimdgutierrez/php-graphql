<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\User;

use PandoraBundle\GraphQL\Type\User\UserType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\UserJoinery;
use PandoraBundle\Resolver\UserResolver;


class UserPersonalInfoMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'User Personal Infor Edit';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments(UserJoinery::fields());
    }
    
    public function getType()
    {
        return new ListType(new UserType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(UserResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        if($entityResolver->updatePersonalUserInfo()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResultPersonalUser();
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}