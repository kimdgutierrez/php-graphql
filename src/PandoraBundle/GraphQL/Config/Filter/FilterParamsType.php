<?php
namespace PandoraBundle\GraphQL\Config\Filter;

use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;

class FilterParamsType extends AbstractInputObjectType
{

    /** @var AbstractType */
    private $type;

    /** @var array */
    private $fields;
    
    public function __construct(AbstractType $type, array $fields)
    {
        $this->type = $type;
        $this->fields = $fields;
        $this->prefix = sprintf("%sFilter", $type->getName());
        
        parent::__construct([
            'name' => $this->prefix . 'Params'
        ]);
    }
    
    public function build($config)
    {
        foreach($this->fields as $key => $value){
            $config->addFields([
                $key => new FilterParamFieldsType($this->type, $value)
            ]);
        }
    }
}