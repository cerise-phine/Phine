<?php
namespace Core;

trait Cache
{
    # 1 Constants and variables
    private         $Cache                          = null;
    
    # 2 Public Methods
    # 2.1 Cache
    public function Cache($Var = false)
    {
        switch($Var)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return null;
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array(
                    'DebugCache'                    => array('Cache', 'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            default:
                return null;
        }
    }
    
    # 3 Private methods
    # 3.1 initCache
    private function initCache(): bool
    {
        if($this->checkCacheDirs())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 3.2 checkCacheDir
    private function checkCacheDirs(): bool
    {
        if(file_exists($this->Config['Cache']['Private']) && file_exists($this->Config['Cache']['Public']))
        {
            if(is_writeable($this->Config['Cache']['Private']) && is_writeable($this->Config['Cache']['Public']))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}