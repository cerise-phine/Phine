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
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return null;
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'DebugRights'                           => array('Rights',      'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            default:
                return null;
        }
    }
}