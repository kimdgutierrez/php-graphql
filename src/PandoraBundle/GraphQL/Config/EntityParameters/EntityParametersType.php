<?php
namespace PandoraBundle\GraphQL\Config\EntityParameters;

use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;
// use Youshido\GraphQL\Type\Scalar\IntType;

class EntityParametersType extends AbstractInputObjectType
{

    /** @var AbstractType */
    private $type;

    /** @var array */
    private $fields;
    
    public function __construct(AbstractType $type, array $fields)
    {
        $this->type = $type;
        $this->fields = $fields;
        $this->prefix = sprintf("%sEntity", $type->getName());
        
        parent::__construct([
            'name' => $this->prefix . 'Parameters'
        ]);
    }
    
    public function build($config)
    {
        foreach($this->fields as $key => $value){
            $this->addFields([
                $key => [
                    'type' => $value['type'],
                    'description'  => 'Parameters wrapper field.'
                ],
            ]);
        }
    }
}