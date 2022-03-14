<?php
namespace Core;

trait Config
{
    # 2 Constants and variables
    private         $Config                         = null;

    # 3 Magic Methods
    # 3.1 __get method
    public function Config($Var = false)#: ?mixed
    {
        switch($Var)
        {
            # 3.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'Config'                        => $this->Config
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'Config'                        => 'Config',
                );

            case self::TRAIT_RETURN_INCIDENTS:
                return array();
                
            # 3.1.2 Specific output
            default:
                return $this->Config;
        }
    }
    
    # 4 Private Methods
    # 4.1 initConfig
    private function initConfig(): bool
    {
        $ConfigPhinterface                          = self::NAMESPACE_PHINTERFACES . 'Config';
        $this->Config                               = new $ConfigPhinterface(self::$DebugMode);
        
        return true;
    }
}