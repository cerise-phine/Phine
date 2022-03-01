<?php
namespace Libraries\CSS;

class CSS extends Generator
{
    # 1 Traits
    
    # 2 Variables and constants
    private         $Debug                          = null;
    private         $Break                          = '';
    private         $Tab                            = '';

    # 3 Magic methods
    # 3.1 __construct
    final public function __construct($Debug = false)
    {
        $this->setDebug($Debug);
    }
    
    # 3.2 __get
    final public function __get($Var): ?string
    {
        switch($Var)
        {
            case 'Break';
                return $this->Break;
                
            case 'Tab':
                return $this->Tab;
                
            default:
                return false;
        }
    }
    
    # 3.3 __set
    final public function __set($Var, $Value)
    {
        switch($Var)
        {
            
        }
    }
    
    # 3.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $DebugOutput                                = null;
        
        if($this->Debug === true)
        {
            $DebugOutput['Debug']                   = $this->Debug;
            $DebugOutput['Break']                   = $this->Break;
            $DebugOutput['Tab']                     = $this->Tab;
            $DebugOutput['Generator']               = $this->Generator();
        }
        
        return $DebugOutput;
    }
    
    # 4 Public methods
    # 4.1 Tab
    public function Tab($Count = 1): ?string
    {
        $Tab                                        = '';
        
        for($i = 1; $i <= $Count; $i++)
        {
            $Tab                                    .= $this->Tab;
        }
        
        return $Tab;
    }
    
    # 4.2 Break
    public function Break($Count = 1): ?string
    {
        $Break                                      = '';
        
        for($i = 1; $i <= $Count; $i++)
        {
            $Break                                  .= $this->Break;
        }
        
        return $Break;
    }
    
    # 5 Private methods
    # 5.1 setDebug
    private function setDebug($Debug): void
    {
        if(($Debug === true))
        {
            $this->Debug                            = true;
            $this->Break                            = "\r\n";
            $this->Tab                              = "\t";
        }
    }
}