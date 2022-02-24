<?php
namespace Core;

trait Libraries
{
    # 1 Constants and variables
    private         $Libraries                      = null;

    # 2 Public Methods
    # 2.1 __get method
    public function Libraries($Library = false)
    {
        switch($Library)
        {
            case 'Debug':
                return array
                (
                    'Libraries'                     => $this->Libraries,
                    'DefaultLibraries'              => $this->DefaultLibraries
                );
                
            case 'Phinterface':
                $Phinterface                        = $this->DefaultLibraries;
                $Phinterface['Libs']                = 'Libraries';
                $Phinterface['Libraries']           = 'Libraries';
                $Phinterface['DebugLibraries']      = array('Libraries', 'Debug');
                
                return $Phinterface;
                
            case 'Incidents':
                return array
                (
                    array('Error',                  '001'),
                    array('Error',                  '002')
                );
                
            default:
                if(isset($this->DefaultLibraries[$Library]) && is_object($this->Libraries))
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
        $LibrariesClass                             = self::NAMESPACE_PHINTERFACES . 'Libraries';
        $this->Libraries                            = new $LibrariesClass(self::$DebugMode);
        
        return true;
    }
}