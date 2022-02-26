<?php
namespace Core;

trait Error
{
    # 1 Public Methods
    # 1.1 Error
    public function Error($Var = false)
    {
        switch($Var)
        {
            # 2.1.1 Phine output
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array(
                    'DebugError'                            => array('Error',       'Debug')
                );
                
            case 'Incidents':
                return null;
                
            # 2.1.2 Specific output
            default:
                return null;
        }
    }
}