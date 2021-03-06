<?php
namespace Core;

trait Route
{
    # 1 Variables and constants
    private         $Route                          = null;
    private         $RouteString                    = null;
    private         $RouteRequestString             = null;
    private         $RouteEndpoint                  = null;
    private         $RouteModusOperandi             = null;

    # 2 Public methods
    # 2.1 Route
    public function Route($Var = false)#: ?mixed
    {
        switch($Var)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array(
                    'Route'                         => $this->Route,
                    'RouteString'                   => $this->RouteString,
                    'RequestString'                 => $this->RouteRequestString,
                    'Endpoint'                      => $this->RouteEndpoint,
                    'ModusOperandi'                 => $this->RouteModusOperandi
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
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
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            case 'Route':
                return $this->Route;
                
            case 'RouteString':
                return $this->RouteString;
                
            case 'RequestString':
                return $this->RouteRequestString;
                
            case 'Endpoint':
                return $this->RouteEndpoint;
                
            case 'ModusOperandi':
                return $this->RouteModusOperandi;
                
            default:
                return null;
        }
    }
    
    # 3 Private methods
    # 3.1 fetchRequest
    private function initRoute(): void
    {
        
        # 3.1.1 Check if init is needed
        if(is_null($this->RouteRequestString))
        {
            
            # 3.1.2 fetch R
            $this->RouteRequestString               = $this->Handlers('Get')->R;
            
            # 3.1.3 pathinfo with R
            $PathInfo                               = $this->getRoutePathInfo();
            
            # 3.1.4 Default init for empty R
            if(empty($PathInfo['DirName']) && empty($PathInfo['BaseName']))
            {
                # 3.1.4.1 Set route vars to default
                $this->setRouteDefaultRequest();
                
                # 3.1.4.2 Set incident about init
                #$this->setIncident('Debug', 'Phine\\Core\\Route with defaults initialized');
            }
            
            # 3.1.5 Check & set for not empty R
            else
            {
                # 3.1.5.1 check & set route string
                $this->checksetRouteString($PathInfo);
                
                # 3.1.5.2 check & set endpoint
                $this->checksetRouteEndpoint($PathInfo);
                
                # 3.1.5.3 Check & set extension
                $this->checksetRouteExtension($PathInfo['Extension']);
                
                # 3.1.5.4 Set incident about init
                #$this->setIncident('Debug', 'Phine\\Core\\Route with R initialized');
            }
            
            
            
            
            
            
            # baue routen array
            
            
            
            
            
        }
    }
    
    # 3.2 getRoutePathInfo
    private function getRoutePathInfo(): array
    {
        $PathInfo['DirName']                        = pathinfo($this->RequestString, PATHINFO_DIRNAME);
        $PathInfo['BaseName']                       = pathinfo($this->RequestString, PATHINFO_BASENAME);
        $PathInfo['Extension']                      = pathinfo($this->RequestString,  PATHINFO_EXTENSION);
        $PathInfo['FileName']                       = pathinfo($this->RequestString, PATHINFO_FILENAME);
        
        return $PathInfo;
    }
    
    # 3.3 setRouteDefaultRequest
    private function setRouteDefaultRequest(): void
    {
        $this->Route                        = array();
        $this->RouteString                  = 'index';
        $this->RouteRequestString           = false;
        $this->RouteEndpoint                = 'index';
        $this->RouteModusOperandi           = self::MODUS_OPERANDI_HTML;
    }
    
    # 3.4 setRouteErrorRequest
    private function setRouteErrorRequest($ModusOperandi = false): void
    {
        $this->RouteString                  = 'error';
        $this->Route                        = array();
        $this->RouteEndpoint                = 'error';
        
        if($ModusOperandi !== false)
        {
            $this->RouteModusOperandi       = $ModusOperandi;
        }
        else {
            $this->RouteModusOperandi       = self::MODUS_OPERANDI_HTML;
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
    
    # 3.6 checksetRouteEndpoint
    private function checksetRouteEndpoint($PathInfo): void
    {
        if(isset($PathInfo['FileName']))
        {
            $this->RouteEndpoint            = $PathInfo['FileName'];
        }
        else
        {
            #$this->setIncident('Error', 'Request has no Endpoint');
            $this->setErrorRequest();
        }
    }
    
    # 3.7 checksetRouteExtension
    private function checksetRouteExtension($Extension): void
    {
        switch($Extension)
        {
            case self::MODUS_OPERANDI_HTML:
            case 'html': case 'htm':
                $this->RouteModusOperandi           = self::MODUS_OPERANDI_HTML;
                break;
                
            case self::MODUS_OPERANDI_AJAX:
            case 'ajax':
                $this->RouteModusOperandi           = self::MODUS_OPERANDI_AJAX;
                break;
                
            case self::MODUS_OPERANDI_API:
            case 'api':
                $this->RouteModusOperandi           = self::MODUS_OPERANDI_API;
                break;
            
            default:
                #$this->setIncident('Error', 'Request has no ModusOperandi');
                $this->setErrorRequest();
                break;
        }
    }
}