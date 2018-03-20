<?php
/**
 * This file is a part of GraphQLExtensions project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 2/23/17 4:10 PM
 */

namespace PandoraBundle\GraphQL\Config\Filter;

use PandoraBundle\GraphQL\Enum\FilterExpressionsType;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;

class FilterParamFieldsType extends AbstractInputObjectType
{
    /** @var AbstractType */
    private $type;
    
    /** @var array */
    private $field;
    
    public function __construct(AbstractType $type, array $field)
    {
        $this->type   = $type;
        $this->field = $field;
        $this->prefix = sprintf("%sFilter", $type->getName());
        
        parent::__construct([
            'name' => $this->prefix . 'Parameter'
        ]);
    }
    
    public function build($config)
    {
        $this->addFields([
            'parameter' => [
                'type' => $this->field['type'],
                'description'  => 'Filter field.',
                // 'defaultValue' => 'id',
            ],
            'expression' => new FilterExpressionsType()
        ]);
    }
    
}