<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Config\Object\EnumTypeConfig;
use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class FilterFieldsAsEnumType extends AbstractEnumType
{
    private $fields = [];
    /**
     * ObjectType constructor.
     * @param $config
     */
    public function __construct($config = [], $fields = [])
    {
        $this->fields = $fields;
        if (empty($config)) {
            $config['name']   = $this->getName();
            $config['values'] = $this->getValues();
        }
        
        $this->config = new EnumTypeConfig($config, $this);
    }
    
    public function getValues()
    {
        $fields = [];
        foreach ($this->fields as $key => $value){
            $fields[] = [
                'name'  => $key,
                'value' => $key,
            ];
        }
        
        return $fields;
    }
    
}