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
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array(
                    'DebugError'                            => array('Error',       'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
}