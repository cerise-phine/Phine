<?php
namespace Core;

trait Rights
{
    # 1 Public Methods
    # 1.1 Rights
    public function Rights($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'DebugRights'                           => array('Rights',      'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
}