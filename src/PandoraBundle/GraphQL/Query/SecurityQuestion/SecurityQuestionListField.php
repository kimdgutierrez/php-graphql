<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\SecurityQuestion;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\SecurityQuestion\SecurityQuestionType;
use PandoraBundle\Joinery\SecurityQuestionJoinery;
use PandoraBundle\Resolver\SecurityQuestionResolver;

class SecurityQuestionListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Security Question List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = SecurityQuestionJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new SecurityQuestionType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new SecurityQuestionType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType())
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new SecurityQuestionType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(SecurityQuestionResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}