<?php
namespace Core;

trait Handlers
{
    # 1 Variables
    private         $Handlers                       = null;
    
    # 2 Public methods
    # 2.1 Handlers
    public function Handlers($Handler = false, $Value = false)
    {
        switch($Handler)
        {
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
                
            default:
                if(isset($this->DefaultHandlers[$Handler]) && is_object($this->Handlers))
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