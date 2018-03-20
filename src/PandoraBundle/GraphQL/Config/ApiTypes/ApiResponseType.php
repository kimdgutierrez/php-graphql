<?php
namespace PandoraBundle\GraphQL\Config\ApiTypes;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ApiResponseType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'apiResult' => [
                'type' => new NonNullType(new StringType())
            ],
        ]);
    }
}