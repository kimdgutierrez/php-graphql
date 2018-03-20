<?php
namespace PandoraBundle\Service;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\SystemVariables;

class SystemVariableService
{
    /** @var EntityManagerInterface */
    public $default_em;
    
    /** @var QueryBuilder */
    protected $query;
    
    private $targetEntity = 'AppBundle:SystemVariables';
    
    function __construct(EntityManagerInterface $default_em)
    {
        $this->default_em = $default_em;
    }
    
    public function get(string $variableName = '', $defaultValue = null){
        $this->query = $this->default_em->createQueryBuilder();
        $returnValue = $this->query->select('a.VariableValue')->from($this->targetEntity, 'a')->where('a.VariableName = :VariableName')->setParameters([':VariableName' => $variableName])->setFirstResult(0)->setMaxResults(1)->getQuery()->getOneOrNullResult();
        if($returnValue){
            return $returnValue['VariableValue'];
        }
        return$defaultValue;
    }
    
    public function set(string $variableName = '', $value = null){
        $this->query = $this->default_em->createQueryBuilder();
        $returnValue = $this->query->select('a.VariableValue')->from($this->targetEntity, 'a')->where('a.VariableName = :VariableName')->setParameters([':VariableName' => $variableName])->setFirstResult(0)->setMaxResults(1)->getQuery()->getOneOrNullResult();
        if($returnValue){
            $updateQuery = $this->query->update($this->targetEntity, 'a')
            ->set('a.VariableValue', ':VariableValue')
            ->where('a.VariableName = :VariableName')
            ->setParameter('VariableValue', $value)
            ->setParameter('VariableName', $variableName)
            ->getQuery();
            return $updateQuery->execute();
        }else{
            $systemVariableEntity = new SystemVariables();
            $systemVariableEntity->setVariableName($variableName);
            $systemVariableEntity->setVariableValue($value);
            $this->default_em->persist($systemVariableEntity);
            $this->default_em->flush();
            return $value;
        }
    }
}