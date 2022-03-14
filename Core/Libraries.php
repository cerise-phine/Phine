<?php
namespace Core;

trait Libraries
{
    # 1 Constants and variables
    private         $Libraries                      = null;

    # 2 Public Methods
    # 2.1 Libraries
    public function Libraries($Library = false)
    {
        switch($Library)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'Libraries'                     => $this->Libraries
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                $Phinterface                        = \Config\Defaults\Libraries::$Phinterfaces;
                $Phinterface['Libs']                = 'Libraries';
                $Phinterface['Libraries']           = 'Libraries';
                $Phinterface['DebugLibraries']      = array('Libraries', 'Debug');
                
                return $Phinterface;
                
            case self::TRAIT_RETURN_INCIDENTS:
                return array
                (
                    array('Error',                  '001'),
                    array('Error',                  '002')
                );
                
            # 2.1.2 Specific output
            default:
                if(isset(\Config\Defaults\Libraries::$Phinterfaces[$Library]) && is_object($this->Libraries))
                {
                    return call_user_func_array(array($this->Libraries,'Libraries'), array($Library));
                }
                else
                {
                    return $this->Libraries;
                }
        }
    }
    
    # 3 Private Methods
    # 3.1 initLibraries
    private function initLibraries(): bool
    {
        $LibrariesPhinterface                       = self::NAMESPACE_PHINTERFACES . 'Libraries';
        $this->Libraries                            = new $LibrariesPhinterface(self::$DebugMode);
        
        return true;
    }
}