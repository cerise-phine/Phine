<?php
namespace Core;

trait Handlers
{
    # 1 Variables
    private         $Handlers                       = null;
    
    # 2 Public methods
    # 2.1 Handlers
    public function Handlers($Handler = false, $Value = false)#: mixed
    {
        switch($Handler)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'Handlers'                          => $this->Handlers
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                $Phinterface                        = \Config\Defaults\Handlers::$Phinterfaces;
                $Phinterface['Handlers']            = 'Handlers';
                $Phinterface['DebugHandlers']       = array('Handlers', 'Debug');
                
                return $Phinterface;
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            default:
                if(isset(\Config\Defaults\Handlers::$Phinterfaces[$Handler]) && is_object($this->Handlers) && $Value !== false)
                {
                    $this->Handlers->$Handler = $Value;
                    return null;
                }
                elseif(isset(\Config\Defaults\Handlers::$Phinterfaces[$Handler]) && is_object($this->Handlers) && $Value === false)
                {
                    return call_user_func_array(array($this->Handlers,'Handlers'), array($Handler));
                }
                else
                {
                    return null;
                }
        }
    }
    
    # 3 Private methods
    # 3.1 initHandlers
    private function initHandlers(): bool
    {
        $HandlersClass                              = self::NAMESPACE_PHINTERFACES . 'Handlers';
        $this->Handlers                             = new $HandlersClass(self::$DebugMode);
        
        return true;
    }
}