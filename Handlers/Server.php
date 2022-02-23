<?php
namespace Handlers;

class Server
{
    # 1 Variables and constants
    private         $Server                         = null;
    private         $URL                            = null;
    private         $FQDN                           = null;
    private         $ScriptRoot                     = null;
    private         $Protocol                       = null;

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct()
    {
        $this->initServer();
    }
    
    # 2.2 __get
    final public function __get($Var): ?string
    {
        switch($Var)
        {
            case 'URL':
                return $this->URL;
                
            case 'FQDN':
                return $this->FQDN;
            
            case 'ScriptRoot':
                return $this->ScriptRoot;
                
            case 'Protocol':
                return $this->Protocol;
                
            case 'all':
                return array(
                    'Server'                            => $this->Server,
                    'URL'                               => $this->URL,
                    'FQDN'                              => $this->FQDN,
                    'ScriptRoot'                        => $this->ScriptRoot,
                    'Protocol'                          => $this->Protocol
                );
            
            default:
                if(isset($this->Server[$Var]))
                {
                    return $this->Server[$Var];
                }
                else
                {
                    return null;
                }
        }
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        $DebugOutput                                = null;
        
        if(!is_null($this->Server))
        {
            $DebugOutput['Server']                  = $this->Server;
        }
        
        if(!is_null($this->URL))
        {
            $DebugOutput['URL']                     = $this->URL;
        }
        
        if(!is_null($this->FQDN))
        {
            $DebugOutput['FQDN']                    = $this->FQDN;
        }
        
        if(!is_null($this->ScriptRoot))
        {
            $DebugOutput['ScriptRoot']              = $this->ScriptRoot;
        }
        
        if(!is_null($this->Protocol))
        {
            $DebugOutput['Protocol']                = $this->Protocol;
        }
        
        return $DebugOutput;
    }
    
    # 4 Private methods
    # 4.1 initServer
    private function initServer()
    {
        $this->Server                               = filter_input_array(INPUT_SERVER);
        
        
    }
}