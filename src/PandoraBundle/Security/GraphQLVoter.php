<?php
namespace PandoraBundle\Security;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Youshido\GraphQLBundle\Security\Manager\SecurityManagerInterface;

class GraphQLVoter extends Voter
{
    /** @var EntityManagerInterface */
    private $default_em;
    
    /* TODO: THIS HAS BEEN ADDED BY KIM G */
    function __construct(EntityManagerInterface $default_em)
    {
        $this->default_em = $default_em;
    }
    
    /**
     * @inheritdoc
     */
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, [SecurityManagerInterface::RESOLVE_ROOT_OPERATION_ATTRIBUTE]);
    }
    
    /**
     * @inheritdoc
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        try{
            $userRole = $token->getRoles()[0]->getRole();
            
            // IF ADMIN OPEN THE FLOOD GATE M'THERF*CKER
            if($userRole == 'ROLE_ADMIN'){
                return true;
            }
            
            if (SecurityManagerInterface::RESOLVE_ROOT_OPERATION_ATTRIBUTE == $attribute) {
                // CHECK FOR EXISTING
                $query = $this->default_em->createQueryBuilder();
                $query->select('a');
                $query->from('AppBundle:UserAccess', 'a');
                $query->andWhere('a.Method = :Method');
                $query->andWhere($query->expr()->like('a.Roles', ':Role'));
                $query->setParameters([
                    'Method' => $subject->getName(),
                    'Role' => '%'.$userRole.'%'
                ]);
                $results = $query->getQuery()->setFirstResult(0)->setMaxResults(1)->getResult();
                // VALIDATE IF IT IS INDEED THE SAME ROLE
                if(count($results) > 0){
                    $explodeRoles = explode(',', $results[0]->getRoles());
                    if(in_array($userRole, $explodeRoles)){
                        return true;
                    }
                    return false;
                }else{
                    return false;
                }
            }
        }catch(\Exception $err){
            return false;
        }
        return false;
    }
}
