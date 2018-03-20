<?php

namespace PandoraBundle\Utility;

use PandoraBundle\GraphQL\Mutation\MutationType;
use PandoraBundle\GraphQL\Query\QueryType;

/**
 * @author Echarbeto
 */
class ModuleListing{
    public static function getList(){
        $items = [];
        $query = new QueryType();
        $queryFields = $query->getFields();
        foreach($queryFields as $value){
            $queryItem = [];
            $queryItem['ModuleName'] = $value->getName();
            $queryItem['ModuleSystemName'] = $value->getName();
            $queryItem['ModuleDescription'] = $value->getDescription();
            $queryItem['ModuleType'] = 'INFOS';
            array_push($items, $queryItem);
        }
        
        $mutation = new MutationType();
        $mutationFields = $mutation->getFields();
        foreach($mutationFields as $value){
            $mutationItem = [];
            $mutationItem['ModuleName'] = $value->getName();
            $mutationItem['ModuleSystemName'] = $value->getName();
            $mutationItem['ModuleDescription'] = $value->getDescription();
            $mutationItem['ModuleType'] = 'ACTIONS';
            array_push($items, $mutationItem);
        }
        
        // FIELD LEVEL SECURITY
        $items[] = [
            'ModuleName' => 'FieldPlayerEmail',
            'ModuleSystemName' => 'FieldPlayerEmail',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Player Field Player Email'
        ];
        $items[] = [
            'ModuleName' => 'FieldPlayerMobile',
            'ModuleSystemName' => 'FieldPlayerMobile',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Player Field Player Mobile'
        ];
        
        // SORT FIRST
        usort($items, function($a, $b) {
            $a1 = $a["ModuleDescription"]; //get the name string value
            $b1 = $b["ModuleDescription"];
            
            $out = strcasecmp($a1,$b1);
            if($out == 0){ return 0;} //they are the same string, return 0
            if($out > 0){ return 1;} // $a1 is lower in the alphabet, return 1
            if($out < 0){ return -1;} //$a1 is higher in the alphabet, return -1
        });
        
        return $items;
    }
}
