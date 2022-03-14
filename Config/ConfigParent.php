<?php
namespace Config;

class ConfigParent
{
    # 1 Variables
    private         $Config                         = null;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct()#: void
    {
        
    }
    
    # 2.2 __get
    final public function __get($Var)#: ?mixed
    {
        if(isset($this->Config[$Var]))
        {
            return $this->Config[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        
    }
    
    # 3 Public methods
    public static function Defaults($Var)#: ?mixed
    {
        return 'bar';
    }
}