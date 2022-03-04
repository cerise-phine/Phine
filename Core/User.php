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
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return null;
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'DebugUser'                             => array('User',        'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
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