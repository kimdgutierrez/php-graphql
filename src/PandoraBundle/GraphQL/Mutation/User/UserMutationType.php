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


class UserMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'User Create/Edit';
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
        if($args['id'] == 0){
            if($entityResolver->createNewUser()){
                $entityResolver->initEntityResolver();
                $entityResolver->prepareQueryBuilder();
                return $entityResolver->getQueryBuilderSingleResult();
            }
        }else{
            if($entityResolver->updateUser()){
                $entityResolver->initEntityResolver();
                $entityResolver->prepareQueryBuilder();
                return $entityResolver->getQueryBuilderSingleResult();
            }
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}