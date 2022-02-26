<?php
namespace Core\Phinterfaces;

class Blueprints extends \Core\Config\Constants
{
    # 1 Variables
    private static  $DebugMode                      = false;
    private static  $Phinstance                     = false;
    private         $Instances                      = null;
    private         $DefaultBlueprints              = null;
    private         $CustomBlueprints               = null;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($DefaultBlueprints, $DebugMode = false)#: void
    {
        if($DebugMode === true)
        {
            self::$DebugMode                        = true;
        }
        
        $this->initBlueprints($DefaultBlueprints);
    }
    
    # 2.2 __get
    final public function __get($Blueprint): ?object
    {
        return $this->Blueprints($Blueprint);
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): void
    {
        
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $Debug['DebugMode']                         = self::$DebugMode;
        
        $Debug['DefaultBlueprints']                 = $this->DefaultBlueprints;
        $Debug['CustomBlueprints']                  = $this->CustomBlueprints;
        
        return $Debug;
    }
    
    # 3 Public Methods
    # 3.1 Blueprints
    public function Blueprints($Blueprint): ?object
    {
        if($this->instanceBlueprint($Blueprint))
        {
            return $this->Instances[$Blueprint];
        }
        else
        {
            return null;
        }
    }
    
    # 4 Private Methods
    # 4.1 initBlueprints
    private function initBlueprints($DefaultBlueprints): void
    {
        $this->DefaultBlueprints                    = $DefaultBlueprints;
        
    }
    
    # 4.2 instanceBlueprint
    private function instanceBlueprint($Blueprint): bool
    {
        if(in_array($Blueprint, $this->DefaultBlueprints))
        {
            $HelperClass                            = self::NAMESPACE_HELPERS . 'Blueprint';
            $this->Instances[$Blueprint]            = new $HelperClass($Blueprint);
            return true;
        }
        else
        {
            return false;
        }
    }
}