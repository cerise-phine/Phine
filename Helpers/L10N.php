<?php
namespace Helpers;

class L10N
{
    # 1 Constants and variables
    private         $L10NFile                       = null;
    private         $Variables                      = null;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($L10NFile = false)#: void
    {
        $this->L10NFile                             = $L10NFile;
        $this->initVariables();
    }
    
    # 2.2 __get
    final public function __get($Var): ?string
    {
        return $this->getVar($Var);
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        return $this->Variables;
    }
    
    # 3 Public methods
    # 3.1 getVar
    public function getVar($Var)
    {
        if(isset($this->Variables[$Var]))
        {
            return $this->Variables[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 3 Private methods
    # 3.1 initVariables
    private function initVariables(): void
    {
        if(is_null($this->Variables))
        {
            $Variables                              = new \ReflectionClass($this->L10NFile);
            $this->Variables                        = $Variables->getConstants();
        }
    }
}