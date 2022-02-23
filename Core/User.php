<?php
namespace Core;

trait User
{
    # 1 Public Methods
    # 1.1 User
    public function User($Var)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'DebugUser'                             => array('User',        'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
    
    # 2 Private Methods
    # 2.1 initUser
    private function initUser(): bool
    {
        
        return true;
    }
}