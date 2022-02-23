<?php
namespace Core;

trait Template
{
    # 1 Public Methods
    # 1.1 Template
    public function Template($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'DebugTemplate'                         => array('Template', 'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
}