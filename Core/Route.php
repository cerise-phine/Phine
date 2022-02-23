<?php
namespace Core;

trait Route
{
    # 1 Variables and constants
    private         $RequestString                  = null;
    private         $RouteString                    = null;
    private         $Route                          = null;
    private         $Endpoint                       = null;
    private         $ModusOperandi                  = null;

    # 2 Public methods
    # 2.1 Route
    public function Route($Var = false)
    {
        switch($Var) {
            case 'Debug':
                return array(
                    'RequestString'                 => $this->RequestString,
                    'RouteString'                   => $this->RouteString,
                    'Route'                         => $this->Route,
                    'Endpoint'                      => $this->Endpoint,
                    'ModusOperandi'                 => $this->ModusOperandi
                );
                
            case 'Phinterface':
                return array
                (
                    'RequestString'                 => array('Route', 'RequestString'),
                    'RouteString'                   => array('Route', 'RouteString'),
                    'Route'                         => array('Route', 'Route'),
                    'Endpoint'                      => array('Route', 'Endpoint'),
                    'ModusOperandi'                 => array('Route', 'ModusOperandi'),
                    'ModOp'                         => array('Route', 'ModusOperandi'),
                    'DebugRoute'                    => array('Route', 'Debug')
                );
                
            case 'Incidents':
                return null;
                
            case 'RequestString':
                return $this->RequestString;
                
            case 'RouteString':
                return $this->RouteString;
                
            case 'Route':
                return '$this->Route';
                
            case 'Endpoint':
                return $this->Endpoint;
                
            case 'ModusOperandi':
                return $this->ModusOperandi;
                
            default:
                return null;
        }
    }
    
    # 3 Private methods
    # 3.1 fetchRequest
    private function initRoute(): void
    {
        
        # 3.1.1 Check if init is needed
        if(is_null($this->RequestString))
        {
            
            # 3.1.2 fetch R
            $this->RequestString                    = $this->Handlers('Get')->R;
            
            # 3.1.3 pathinfo with R
            $PathInfo                               = $this->getPathInfo();
            
            # 3.1.4 Default init for empty R
            if(empty($PathInfo['DirName']) && empty($PathInfo['BaseName']))
            {
                # 3.1.4.1 Set route vars to default
                $this->setDefaultRequest();
                
                # 3.1.4.2 Set incident about init
                #$this->setIncident('Debug', 'Phine\\Core\\Route with defaults initialized');
            }
            
            # 3.1.5 Check & set for not empty R
            else
            {
                # 3.1.5.1 check & set route string
                $this->checksetRouteString($PathInfo);
                
                # 3.1.5.2 check & set endpoint
                $this->checksetEndpoint($PathInfo);
                
                # 3.1.5.3 Check & set extension
                $this->checksetExtension($PathInfo['Extension']);
                
                # 3.1.5.4 Set incident about init
                #$this->setIncident('Debug', 'Phine\\Core\\Route with R initialized');
            }
            
            
            
            
            
            
            # baue routen array
            
            
            
            
            
        }
    }
    
    # 3.2 getPathInfo
    private function getPathInfo(): array
    {
        $PathInfo['DirName']                        = pathinfo($this->RequestString, PATHINFO_DIRNAME);
        $PathInfo['BaseName']                       = pathinfo($this->RequestString, PATHINFO_BASENAME);
        $PathInfo['Extension']                      = pathinfo($this->RequestString,  PATHINFO_EXTENSION);
        $PathInfo['FileName']                       = pathinfo($this->RequestString, PATHINFO_FILENAME);
        
        return $PathInfo;
    }
    
    # 3.3 setDefaultRequest
    private function setDefaultRequest(): void
    {
        $this->RequestString                = false;
        $this->RouteString                  = 'index';
        $this->Route                        = array();
        $this->Endpoint                     = 'index';
        $this->ModusOperandi                = self::MODUS_OPERANDI_HTML;
    }
    
    # 3.4 setErrorRequest
    private function setErrorRequest($ModusOperandi = false): void
    {
        $this->RouteString                  = 'error';
        $this->Route                        = array();
        $this->Endpoint                     = 'error';
        
        if($ModusOperandi !== false)
        {
            $this->ModusOperandi            = $ModusOperandi;
        }
        else {
            $this->ModusOperandi            = self::MODUS_OPERANDI_HTML;
        }
    }
    
    # 3.5 checksetRouteString
    private function checksetRouteString($PathInfo): void
    {
        if(empty($PathInfo['DirName']) || $PathInfo['DirName'] === '.')
        {
            $this->RouteString                      = $PathInfo['FileName'];
        }
        else
        {
            $this->RouteString                      = $PathInfo['DirName'] . '/' . $PathInfo['FileName'];
        }
    }
    
    # 3.6 checksetEndpoint
    private function checksetEndpoint($PathInfo): void
    {
        if(isset($PathInfo['FileName']))
        {
            $this->Endpoint                 = $PathInfo['FileName'];
        }
        else
        {
            #$this->setIncident('Error', 'Request has no Endpoint');
            $this->setErrorRequest();
        }
    }
    
    # 3.7 checksetExtension
    private function checksetExtension($Extension): void
    {
        switch($Extension)
        {
            case self::MODUS_OPERANDI_HTML:
            case 'html': case 'htm':
                $this->ModusOperandi                = self::MODUS_OPERANDI_HTML;
                break;
                
            case self::MODUS_OPERANDI_AJAX:
            case 'ajax':
                $this->ModusOperandi                = self::MODUS_OPERANDI_AJAX;
                break;
                
            case self::MODUS_OPERANDI_API:
            case 'api':
                $this->ModusOperandi                = self::MODUS_OPERANDI_API;
                break;
            
            default:
                #$this->setIncident('Error', 'Request has no ModusOperandi');
                $this->setErrorRequest();
                break;
        }
    }
}