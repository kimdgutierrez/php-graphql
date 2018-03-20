<?php
namespace PandoraBundle\GraphQL\Config\PageInfoTypes;

// use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
// use Youshido\GraphQL\Type\Scalar\IntType;

class PageInfoType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
//             'offset'     => new IntType(),
//             'limit'      => new IntType(),
//             'totalCount' => new IntType(),
        ]);
    }
}