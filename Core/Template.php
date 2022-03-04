<?php
namespace Core;

trait Template
{
    # 2 Public Methods
    # 2.1 Template
    public function Template($Var = false)
    {
        switch($Var)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return null;
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'DebugTemplate'                         => array('Template', 'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            default:
                return null;
        }
    }
}