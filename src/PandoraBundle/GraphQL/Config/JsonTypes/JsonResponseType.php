<?php
namespace PandoraBundle\GraphQL\Config\JsonTypes;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class JsonResponseType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'jsonResult' => [
                'type' => new NonNullType(new StringType())
            ],
        ]);
    }
}