<?php
namespace Core;

trait Module
{
    # 1 Constants and variables
    private         $ModulePath                     = self::DIR_CUSTOM_MODULES;
    private         $Module                         = array
                    (
                        'Repo'                          => false,
                        'ID'                            => false,
                        'Assets'                        => array
                        (
                            
                        )
                    );
    
    # 2 Public Methods
    # 2.1 Error
    public function Module($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'DebugModule'                           => array('Module',      'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
}