<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\User;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\User\UserType;
use PandoraBundle\Joinery\UserJoinery;
use PandoraBundle\Resolver\UserResolver;

class UserListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'User List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = UserJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new UserType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new UserType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType())
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new UserType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(UserResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        // MODIFY USER ROLE FIELD
        $userInfo = $entityResolver->getQueryBuilderPagingResult();
        
        foreach ($userInfo['items'] as $key => $value){
            $userInfo['items'][$key]['roles'] = $this->extractUserRole($value);
        }
        
        return $userInfo;
    }
    
    private function extractUserRole(array $value){
        try{
            return $value['roles'][0];
        }catch(\Exception $e){
        }
        return 'ROLE_USER';
    }
}