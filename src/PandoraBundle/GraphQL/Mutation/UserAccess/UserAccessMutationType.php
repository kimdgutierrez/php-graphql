<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\UserAccess;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\Joinery\UserAccessJoinery;
use PandoraBundle\GraphQL\Type\UserAccess\UserAccessType;
use PandoraBundle\Resolver\UserAccessResolver;

class UserAccessMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Admin User Access Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments(UserAccessJoinery::fields());
    }
    
    public function getType()
    {
        return new UserAccessType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(UserAccessResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $executeMutation = $entityResolver->mutateUserAccess();
        
        if(!$executeMutation){
            $args['Success'] = false;
            return $args;
        }else{
            $executeMutation[0]['Success'] = true;
            return $executeMutation[0];
        }
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}