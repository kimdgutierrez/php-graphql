<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\UserAccessJoinery;
use PandoraBundle\Utility\ModuleListing;
use AppBundle\Entity\UserAccess;

class UserAccessResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'AppBundle:UserAccess';
        $this->rawFieldArrayJoinery = UserAccessJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
        
        // OVERRIDE ENTITY DEFAULT
        $this->promoted_em = $this->default_em;
    }
    
    private function moduleIsInList($methodname){
        $availableModule = ModuleListing::getList();
        foreach ($availableModule as $value){
            if($value['ModuleName'] == $methodname){
                return true;
                break;
            }
        }
        
        return false;
    }
    
    public function mutateUserAccess(){
        // VALIDATE THAT THE METHOD ACTUALLY EXISTS IN OUR LIST
        if(!$this->moduleIsInList($this->args['Method'])){
            return false;
        }
        
        // CHECK FOR EXISTING
        $this->query = $this->promoted_em->createQueryBuilder();
        $this->query->select('a');
        $this->query->from($this->targetEntity, 'a');
        $this->query->andWhere('a.Method = :Method');
        $this->query->setParameters(['Method' => $this->args['Method']]);
        $results = $this->query->getQuery()->setFirstResult(0)->setMaxResults(1)->getResult();
        
        if(count($results) > 0){
            // FORMAT ROLE
            $existingRole = explode(',', $results[0]->getRoles());
            
            if($this->args['Allow']){
                $existingRole[] = $this->args['Roles'];
            }else{
                if (($key = array_search($this->args['Roles'], $existingRole)) !== false) {
                    unset($existingRole[$key]);
                }
            }
            $existingRole = array_filter($existingRole);
            $existingRole = array_unique($existingRole);
            
            $accessData = $this->promoted_em->getReference('AppBundle\Entity\UserAccess', $results[0]->getId());
            $accessData->setRoles(implode(',', $existingRole));
            $this->promoted_em->merge($accessData);
            $this->promoted_em->flush();
        }else{
            $accessData = new UserAccess();
            $accessData->setMethod($this->args['Method']);
            $accessData->setMethodName($this->args['Method']);
            $accessData->setRoles($this->args['Roles']);
            $this->promoted_em->persist($accessData);
            $this->promoted_em->flush();
        }
        
        // IF THE CODE REACHED HERE MEANS EVERYTHING WENT FINE
        return $this->query->getQuery()->setFirstResult(0)->setMaxResults(1)->getArrayResult();
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
    }
    
    public function getQueryBuilderPagingResult()
    {
        $this->queryBuilderSelectAndJoin();
        $results = $this->query->getQuery()->getResult();
        
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if(isset($this->args['count']) && $this->args['count']){
            $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        if(isset($this->args['Id'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        return $this->query->getQuery()->getResult();
    }
}