<?php
namespace Core\Phinterfaces;

class Handlers extends \Core\Config\Constants
{
    # 1 Variables
    private         $Instances                      = array();
    private         $Namespace                      = self::NAMESPACE_HANDLERS;
    private         $Handlers                       = array(
                        'Client'                        => 'Client',
                        'Cookies'                       => 'Cookies',
                        'Data'                          => 'Data',
                        'ENV'                           => 'ENV',
                        'Get'                           => 'Get',
                        'Post'                          => 'Post',
                        'Server'                        => 'Server',
                        'Session'                       => 'Session',
                        'Uploads'                       => 'Uploads'
                    );
    private static  $DebugMode                      = false;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($DebugMode = false)#: void
    {
        if($DebugMode === true)
        {
            self::$DebugMode                        = true;
        }
    }
    
    # 2.2 __get
    final public function __get($Var): ?object
    {
        return $this->Handlers($Var);
    }
    
    # 2.3 __set
    final public function __set($Handler, $Values): void
    {
        if(!is_array($Values) || (!isset($Values[0]) && !isset($Values[1])))
        {
            return;
        }
        
        if(isset($this->Handlers[$Handler]) && $this->instanceHandler($Handler))
        {
            $HandlerObject                          = $this->$Handler;
            $Property                               = $Values[0];
            $Value                                  = $Values[1];
            $HandlerObject->$Property               = $Value;
        }
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        return array
        (
            'DebugMode'                         => self::$DebugMode,
            'Namespace'                         => $this->Namespace,
            'Handlers'                          => $this->Handlers,
            'Instances'                         => (self::$DebugMode === true ? $this->Instances : null)
        );
    }
    
    # 2 Public methods
    # 2.1 Handlers
    public function Handlers($Handler = false): ?object
    {
        if($this->instanceHandler($Handler))
        {
            return $this->Instances[$Handler];
        }
        else
        {
            return null;
        }
    }
    
    # 3 Private methods
    # 3.1 instanceHandler
    private function instanceHandler($Handler): bool
    {
        if(isset($this->Handlers[$Handler]) && (isset($this->Instances[$Handler]) && is_object($this->Instances[$Handler])))
        {
            return true;
        }
        elseif(isset($this->Handlers[$Handler]) && !isset($this->Instances[$Handler]))
        {
            $HandlerWithNamespace                   = $this->Namespace . $this->Handlers[$Handler];
            $this->Instances[$Handler]              = new $HandlerWithNamespace(true);
            return true;
        }
        else
        {
            return false;
        }
    }
}