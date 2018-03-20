<?php
namespace PandoraBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Unirest;
use Unirest\Exception;

class PandoraBackendService {
    private $headers = [];
    private $body = [];
    private $container;
    private $endpoint;
    private $token;
    private $method = 'POST';
    private $url = '';
    private $formatReturn = true;
    
    public function __construct(ContainerInterface $container){
        $this->container = $container;
        $this->endpoint = $this->container->getParameter('pandora_api_endpoint').'/api/';
        $this->token = $this->container->getParameter('pandora_api_token');
    }
    
    public function setParameters(string $url, string $method, array $body, array $header = [], bool $formatReturn = true){
        // GET CURRENT LOGGED-IN USER
        $usr = $this->container->get('security.token_storage')->getToken()->getUser();
        $this->formatReturn = $formatReturn;
        $defaultHeaders = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-PANDORA-API-Key' => $this->token,
            'X-PANDORA-CREATEDBYID' => $usr->getAspNetUserId()
        ];
        
        $this->url = $url;
        $this->method = $method;
        $this->headers = array_merge($defaultHeaders, $header);
        $this->body = Unirest\Request\Body::json($body);
        return $this;
    }
    
    public function executeQuery(){
        $apiResult = $this->consumeServerApi();
        
        // CHECK FOR ERROR
        if(!$apiResult->Status){
            try{
                foreach ($apiResult->Messages->Errors as $value){
                    throw new \Exception($value->Code.' - '.$value->Description);
                }
            }catch(Exception $error){
                throw new \Exception('Unable to process you request. Please contact Administrator.');
            }
        }
        
        return $apiResult;
    }
    
    private function consumeServerApi(){
        $apiReturn = new \stdClass();
        $apiReturn->Status = false;
        $apiReturn->Data = [];
        $apiReturn->Messages = [];
        $apiReturn->hasInfo = false;
        $apiReturn->hasError = false;
        $apiReturn->hasWarning = false;
        
        $apiReturn->Message = '';
        $apiReturn->ExceptionMessage = '';
        $apiReturn->ExceptionType = '';
        $apiReturn->StackTrace = '';
        
        try{
            $response = false;
            switch ($this->method){
                case 'POST':
                    $response = Unirest\Request::post($this->endpoint.$this->url, $this->headers, $this->body);
                    break;
                case 'GET':
                    $response = Unirest\Request::get($this->endpoint.$this->url, $this->headers, $this->body);
                    break;
                default:
                    break;
            }
            
            // IF NOT IN SWITCH CASE RETURN DEFAULT VALUES
            if(!$response){
                return $apiReturn;
            }
            
            if($this->formatReturn){
                if(isset($response->body->Status)){
                    $apiReturn->Status = ($response->body->Status == 'SUCCESS') ? true: false;
                }
                if(isset($response->body->Data)){
                    $apiReturn->Data = $response->body->Data;
                }
                if(isset($response->body->Messages)){
                    $apiReturn->Messages = $response->body->Messages;
                }
                if(isset($response->body->hasInfo)){
                    $apiReturn->hasInfo = $response->body->hasInfo;
                }
                if(isset($response->body->hasError)){
                    $apiReturn->hasError = $response->body->hasError;
                }
                if(isset($response->body->hasWarning)){
                    $apiReturn->hasWarning = $response->body->hasWarning;
                }
                
                if(isset($response->body->Message)){
                    $apiReturn->Message = $response->body->Message;
                }
                if(isset($response->body->ExceptionMessage)){
                    $apiReturn->ExceptionMessage = $response->body->ExceptionMessage;
                }
                if(isset($response->body->ExceptionType)){
                    $apiReturn->ExceptionType = $response->body->ExceptionType;
                }
                if(isset($response->body->StackTrace)){
                    $apiReturn->StackTrace = $response->body->StackTrace;
                }
            }else{
                return $response->raw_body;
            }
            
            return $apiReturn;
            
        }catch(Exception $error){
            $apiReturn->ExceptionMessage = (string)$error;
            return $apiReturn;
        }
    }
}