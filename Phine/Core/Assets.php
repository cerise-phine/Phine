<?php
namespace Core;

trait Assets
{
    # 1 Public Methods
    # 1.1 Assets
    public function Assets($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array(
                    'DebugAssets'                           => array('Assets',      'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
}