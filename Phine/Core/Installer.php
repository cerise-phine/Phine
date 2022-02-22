<?php
namespace Core;

trait Installer
{
    # 1 Public Methods
    # 1.1 Installer
    public function Installer($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'DebugInstaller'                        => array('Installer',   'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
}