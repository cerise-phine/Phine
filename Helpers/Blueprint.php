<?php
namespace Helpers;

class Blueprint
{
    # 1 Constants and variables
    private         $L10NFile                       = null;
    private         $Variables                      = null;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($Blueprint = false)#: void
    {
        
    }
    
    # 2.2 __get
    final public function __get($Var): ?string
    {
        return $this->getVar($Var);
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        return $this->Variables;
    }
    
    # 3 Public methods
    
    
    # 4 Private methods
    
}