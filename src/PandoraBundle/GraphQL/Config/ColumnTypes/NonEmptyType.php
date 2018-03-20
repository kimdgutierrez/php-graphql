<?php
/*
 * This file is a part of graphql-youshido project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 11/27/15 1:22 AM
 */

namespace PandoraBundle\GraphQL\Config\ColumnTypes;

use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\CompositeTypeInterface;
use Youshido\GraphQL\Type\TypeFactory;
use Youshido\GraphQL\Type\TypeMap;
use Youshido\GraphQL\Type\TypeService;
use Youshido\GraphQL\Config\Traits\ConfigAwareTrait;
use Youshido\GraphQL\Exception\ConfigurationException;

final class NonEmptyType extends AbstractType implements CompositeTypeInterface
{
    use ConfigAwareTrait;
    
    private $_typeOf;
    
    /**
     * NonNullType constructor.
     *
     * @param AbstractType|string $fieldType
     *
     * @throws ConfigurationException
     */
    public function __construct($fieldType)
    {
        if (!TypeService::isGraphQLType($fieldType)) {
            throw new ConfigurationException('NonNullType accepts only GraphpQL Types as argument');
        }
        if (TypeService::isScalarType($fieldType)) {
            $fieldType = TypeFactory::getScalarType($fieldType);
        }
        
        $this->_typeOf = $fieldType;
    }
    
    public function getName()
    {
        return null;
    }
    
    public function getKind()
    {
        return TypeMap::KIND_NON_NULL;
    }
    
    public function resolve($value)
    {
        return $value;
    }
    
    public function isValidValue($value)
    {
        if ($value === null || $value === '') {
            return false;
        }
        
        return $this->getNullableType()->isValidValue($value);
    }
    
    public function isCompositeType()
    {
        return true;
    }
    
    public function isInputType()
    {
        return true;
    }
    
    public function getNamedType()
    {
        return $this->getTypeOf();
    }
    
    public function getNullableType()
    {
        return $this->getTypeOf();
    }
    
    public function getTypeOf()
    {
        return $this->_typeOf;
    }
    
    public function parseValue($value)
    {
        return $this->getNullableType()->parseValue($value);
    }
    
    public function getValidationError($value = null)
    {
        if ($value === null || $value === '') {
            return 'Field must not be Empty';
        }
        return $this->getNullableType()->getValidationError($value);
    }

}
