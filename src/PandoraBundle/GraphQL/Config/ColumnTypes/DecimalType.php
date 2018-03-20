<?php
/*
 * This file is a part of graphql-youshido project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 11/27/15 1:22 AM
 */

namespace PandoraBundle\GraphQL\Config\ColumnTypes;

use Youshido\GraphQL\Type\Scalar\AbstractScalarType;


class DecimalType extends AbstractScalarType
{
    public function getName()
    {
        return 'Float';
    }
    
    public function serialize($value)
    {
        if ($value === null) {
            return null;
        } else {
            return floatval($value);
        }
    }
    
    public function isValidValue($value)
    {
        return is_null($value) || is_numeric($value) || is_int($value);
    }
    
    public function getDescription()
    {
        return 'The `Float` scalar type represents signed double-precision fractional ' .
            'values as specified by ' .
            '[IEEE 754](http://en.wikipedia.org/wiki/IEEE_floating_point).';
    }
}
