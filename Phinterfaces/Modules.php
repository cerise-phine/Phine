<?php
namespace Phinterfaces;

class Modules extends \Config\Constants
{
    # 1 Constants and variables
    private         $DynamicNamespace               = self::NAMESPACE_DYNAMIC_MODULES;
    private         $DefaultNamespace               = self::NAMESPACE_DEFAULT_MODULES;
    private         $Dynamic                        = array();
    private         $Default                        = array();
    private         $Instances                      = array();
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct()#: void
    {
        
    }
    
    # 2.2 __get
    final public function __get($Var): ?object
    {
        return $this->Libraries($Var);
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): void
    {
        
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $Debug['DynamicNamespace']                  = $this->DynamicNamespace;
        $Debug['DefaultNamespace']                  = $this->DefaultNamespace;
        $Debug['Dynamic']                           = $this->Dynamic;
        $Debug['Default']                           = $this->Default;
        $Debug['Instances']                         = $this->Instances;

        return $Debug;
    }
}