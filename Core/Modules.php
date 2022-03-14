<?php
namespace Core;

trait Modules
{
    # 1 Constants and variables
    private         $Modules                        = null;
    
    # 2 Public Methods
    # 2.1 Module
    public function Modules($Module = false)
    {
        switch($Module)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return null;
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'Modules'                       => 'Modules',
                    'DebugModules'                  => array('Modules', 'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            default:
                return $this->getModule($Module);
        }
    }
    
    # 3 Public methods
    # 3.1 getModule
    public function getModule($Module): ?object
    {
        return $this->Modules;
    }
    
    # 3.2 setModule
    public function setModule($Module, $Values): void
    {
        
    }
    
    # 3 Private methods
    # 3.1 initModules
    private function initModules(): bool
    {
        $ModulesPhinterface                         = self::NAMESPACE_PHINTERFACES . 'Modules';
        $this->Modules                              = new $ModulesPhinterface();
        
        return true;
    }
}