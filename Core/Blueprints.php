<?php
namespace Core;

trait Blueprints
{
    # 1 Variables
    private         $Blueprints                     = null;
    
    # 2 Public Methods
    # 2.1 Blueprints
    public function Blueprints($Var = false)
    {
        switch($Var)
        {
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'Blueprints'                    => $this->Blueprints
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'Blueprints'                    => 'Blueprints',
                    'DebugBlueprints'               => array('Blueprints',  'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            default:
                return $this->Blueprints;
        }
    }
    
    # 3 Private Methods
    # 3.1 initBlueprint
    private function initBlueprints(): bool
    {
        $BlueprintsClass                            = self::NAMESPACE_PHINTERFACES . 'Blueprints';
        $this->Blueprints                           = new $BlueprintsClass($this->DefaultBlueprints, self::$DebugMode);
        
        return true;
    }
}