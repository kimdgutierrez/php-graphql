<?php
/*
 * This file is a part of graphql-youshido project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 11/27/15 1:22 AM
 */

namespace PandoraBundle\GraphQL\Config\ColumnTypes;

use Youshido\GraphQL\Type\Scalar\AbstractScalarType;


class SerializedType extends AbstractScalarType
{
    public function getName()
    {
        return 'Serialized';
    }
    
    public function serialize($value)
    {
        return $value;
//         if ($value === null) {
//             return null;
//         } else {
//             if (is_int($value)) {
//                 return $value;
//             } else {
//                 $value = (int)$value;
//                 return $value != 0 ? $value : null;
//             }
//         }
    }
    
    public function isValidValue($value)
    {
        return true;
    }
    
    public function getDescription()
    {
        return 'The `Serialized`';
    }
    
}
