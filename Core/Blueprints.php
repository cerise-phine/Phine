<?php
namespace Core;

trait Blueprints
{
    # 1 Variables
    
    
    # 2 Public Methods
    # 2.1 Blueprints
    public function Blueprints($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'DebugBlueprints'                       => array('Blueprints',  'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
    
    # 3 Private Methods
    # 3.1 initBlueprint
    private function initBlueprint(): bool
    {
        return true;
    }
}