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
            case 'Debug':
                return array
                (
                    'Handlers'                          => $this->Handlers,
                    'Defaults'                          => $this->DefaultHandlers
                );
                
            case 'Phinterface':
                $Phinterface                        = $this->DefaultHandlers;
                $Phinterface['Handlers']            = 'Handlers';
                $Phinterface['DebugHandlers']       = array('Handlers', 'Debug');
                
                return $Phinterface;
                
            case 'Incidents':
                return null;
                
            # 2.1.2 Specific output
            default:
                if(isset($this->DefaultHandlers[$Handler]) && is_object($this->Handlers) && $Value !== false)
                {
                    $this->Handlers->$Handler = $Value;
                    return null;
                }
                elseif(isset($this->DefaultHandlers[$Handler]) && is_object($this->Handlers) && $Value === false)
                {
                    return call_user_func_array(array($this->Handlers,'Handlers'), array($Handler));
                }
                else
                {
                    return $this->Handlers;
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