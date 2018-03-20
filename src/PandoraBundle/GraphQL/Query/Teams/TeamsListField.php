<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Teams;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\Teams\TeamsType;
use PandoraBundle\Joinery\TeamsJoinery;
use PandoraBundle\Resolver\TeamsResolver;

class TeamsListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Teams List';
    }

    public function build(FieldConfig $config)
    {
        $fields = TeamsJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new TeamsType(), array_keys($fields)),
            'filter' => new FilterParamsType(new TeamsType(), $fields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType())
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new TeamsType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(TeamsResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}