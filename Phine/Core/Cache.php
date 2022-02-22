<?php
namespace Core;

trait Cache
{
    # 1 Constants and variables
    private         $Cache                          = null;
    
    # 2 Public Methods
    # 2.1 Error
    public function Cache($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array(
                    'DebugCache'                            => array('Cache',       'Debug')
                );
                
            case 'Incidents':
                return null;
                
            default:
                return null;
        }
    }
    
    # 3 Private methods
    # 3.1 initCache
    private function initCache(): bool
    {
        if($this->checkCacheDir())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 3.2 checkCacheDir
    private function checkCacheDir(): bool
    {
        if(file_exists($this->Config['Cache']['Dir']))
        {
            if(is_writeable($this->Config['Cache']['Dir']))
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