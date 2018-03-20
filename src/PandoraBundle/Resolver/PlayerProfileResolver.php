<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerProfileJoinery;

class PlayerProfileResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:Playerprofiles';
    public function initEntityResolver(){
        // $this->targetEntity = 'PandoraBundle:Playerprofiles';
        $this->rawFieldArrayJoinery = PlayerProfileJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        // if(strpos($implodedField, 'b.') !== false){
        $this->query->join('a.PlayerRegistration', 'b');
        // }
        
        if(strpos($implodedField, 'c.') !== false){
            $this->query->join('a.Wallet', 'c');
        }
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('a.VipLevel', 'd');
        }
        if(strpos($implodedField, 'e.') !== false){
            $this->query->leftjoin('a.PaymentRiskLevel', 'e');
        }
        if(strpos($implodedField, 'f.') !== false){
            $this->query->leftjoin('a.WithdrawalLevel', 'f');
        }
        if(strpos($implodedField, 'g.') !== false){
            $this->query->leftjoin('a.FraudRiskLevel', 'g');
        }
        if(strpos($implodedField, 'h.') !== false){
            $this->query->leftjoin('a.SecurityQuestion1', 'h');
        }
        if(strpos($implodedField, 'i.') !== false){
            $this->query->leftjoin('a.GameBetLimitLevel', 'i');
        }
        if(strpos($implodedField, 'j.') !== false){
            $this->query->leftjoin('a.BankAccount', 'j');
        }
        if(strpos($implodedField, 'k.') !== false){
            $this->query->leftjoin('a.WithdrawalBankAccount', 'k');
        }
    }
    
    public function getQueryBuilderPagingResult()
    {
        $this->queryBuilderSelectAndJoin();
        $results = $this->query->getQuery()->getResult();
        
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if(isset($this->args['count']) && $this->args['count']){
            $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        // MASK SENSITIVE FIELDS
        $visibleEmail = $this->hasAccessToModule('FieldPlayerEmail', $this->currentUser->getRoles()[0]);
        $visibleMobile = $this->hasAccessToModule('FieldPlayerMobile', $this->currentUser->getRoles()[0]);
        if(count($results) > 0 && (!$visibleEmail || !$visibleMobile)){
            foreach ($results as $key => $value){
                if(isset($value['Email']) && !$visibleEmail){
                    $results[$key]['Email'] = $this->maskField($value['Email']);
                }
                if(isset($value['MobileNo']) && !$visibleMobile){
                    $results[$key]['MobileNo'] = $this->maskField($value['MobileNo']);
                }
            }
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        if(isset($this->args['Id'])){
            $this->query->andWhere('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        $result = $this->query->getQuery()->getResult();
        
        // MASK SENSITIVE FIELDS
        if(isset($result[0]['Email']) && !$this->hasAccessToModule('FieldPlayerEmail', $this->currentUser->getRoles()[0])){
            $result[0]['Email'] = $this->maskField($result[0]['Email']); 
        }
        if(isset($result[0]['MobileNo']) && !$this->hasAccessToModule('FieldPlayerMobile', $this->currentUser->getRoles()[0])){
            $result[0]['MobileNo'] = $this->maskField($result[0]['MobileNo']);
        }
        
        return $result;
    }
    
    public function getEntity(string $UserName = ''){
        return $this->pandora_em->getRepository($this->targetEntity)->findOneBy(['UserName'=> $UserName]);
    }
    
    // ACTIONs
    public function updateFraudRiskLevelId(int $playerProfileId, int $fraudRiskLevelId){
        try{
            if(!$this->promoted_em->getRepository('PandoraBundle:Fraudrisklevels')->find($fraudRiskLevelId)){
                throw new \Exception('Invalid Fraud Risk level. Please contact Administrator.');
            }
            
            $playerData = $this->promoted_em->getRepository($this->targetEntity)->find($playerProfileId);
            $playerData->setFraudRiskLevelId($fraudRiskLevelId);
            $this->promoted_em->merge($playerData);
            $this->promoted_em->flush();
            return $playerData;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
    
    public function updateGameBetLimitLevelId(int $playerProfileId, int $gameBetLimitLevelId){
        try{
            if(!$this->promoted_em->getRepository('PandoraBundle:Gamebetlimitlevels')->find($gameBetLimitLevelId)){
                throw new \Exception('Invalid Game Bet Limit level. Please contact Administrator.');
            }
            
            $playerData = $this->promoted_em->getRepository($this->targetEntity)->find($playerProfileId);
            $playerData->setGameBetLimitLevelId($gameBetLimitLevelId);
            $this->promoted_em->merge($playerData);
            $this->promoted_em->flush();
            return $playerData;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
    
    public function updatePaymentRiskLevelId(int $playerProfileId, int $paymentRiskLevelId){
        try{
            if(!$this->promoted_em->getRepository('PandoraBundle:Fraudrisklevels')->find($paymentRiskLevelId)){
                throw new \Exception('Invalid Fraud Risk level. Please contact Administrator.');
            }
            
            $playerData = $this->promoted_em->getRepository($this->targetEntity)->find($playerProfileId);
            $playerData->setPaymentRiskLevelId($paymentRiskLevelId);
            $this->promoted_em->merge($playerData);
            $this->promoted_em->flush();
            return $playerData;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
}