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
            # 1.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return null;
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array(
                    'DebugError'                            => array('Error',       'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 1.1.2 Specific output
            default:
                return null;
        }
    }
}