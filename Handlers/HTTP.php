<?php
namespace Handlers;

class HTTP
{
    # 1 Variables and constants
    private         $HTTP                           = array();

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct()
    {
        $this->initHTTP();
    }
    
    # 2.2 __get
    final public function __get($Var): ?string
    {
        if(isset($this->HTTP[$Var]))
        {
            return $this->HTTP[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): bool
    {
        
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
       return $this->HTTP;
    }
    
    # 4 Private methods
    # 4.1 initGet
    private function initHTTP(): void
    {
        if(getallheaders() !== false)
        {
            
        }
    }
}