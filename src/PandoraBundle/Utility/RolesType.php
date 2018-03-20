<?php

namespace PandoraBundle\Utility;

/**
 * @author Echarbeto
 */
class RolesType{
    
    private $roles = [];
    
    public static function getRoles($rolehierarchy){
        $roles = [];
        array_walk_recursive($rolehierarchy, function($val) use (&$roles) {
            $roles[$val] = $val;
        });
        ksort($roles);
        $roles = array_unique($roles);
        return $roles;
    }
    
    public static function getRolesAsOptions($rolehierarchy){
        $roles = [];
        array_walk_recursive($rolehierarchy, function($val) use (&$roles) {
            $roles[$val] = $val;
        });
        ksort($roles);
        $roles = array_unique($roles);
        
        $finalRoles = [];
        foreach($roles as $key => $value){
            $readableRoleFormat = ucwords(strtolower(str_replace('_', ' ', str_replace('ROLE_', '', $key))));
            if(preg_match('/\bCs\b/', $readableRoleFormat)){
                $readableRoleFormat = str_replace('Cs', 'CS', $readableRoleFormat);
            }
            if(preg_match('/\bTl\b/', $readableRoleFormat)){
                $readableRoleFormat = str_replace('Tl', 'TL', $readableRoleFormat);
            }
            $finalRoles[] = [
                'role_name' => $key,
                'role_code' => $value,
                'role_name_readable' => $readableRoleFormat,
            ];
        }
        
        return $finalRoles;
    }
    
    public static function getRolesAsEnum($rolehierarchy){
        $roles = [];
        array_walk_recursive($rolehierarchy, function($val) use (&$roles) {
            $roles[$val] = $val;
        });
        ksort($roles);
        $roles = array_unique($roles);
        
        $finalRoles = [];
        foreach($roles as $value){
            $finalRoles[] = [
                'name' => $value,
                'value' => $value
            ];
        }
        
        return $finalRoles;
    }

}