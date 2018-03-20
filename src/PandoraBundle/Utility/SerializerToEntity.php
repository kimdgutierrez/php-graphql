<?php
namespace PandoraBundle\Utility;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class SerializerToEntity{
    
    public static function arrayToEntity($data, $class, string $format, $oldEntity) {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        
        if(count($oldEntity) > 0){
            return $serializer->deserialize($data, $class, $format, $oldEntity);
        }
        
        return $serializer->deserialize($data, $class, $format);
    }
    
}