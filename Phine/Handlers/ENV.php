<?php
namespace Handlers;

class ENV
{
    # 1 Variables and constants
    private         $ENV                            = null;

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct($Phinstance = false)
    {
        if($Phinstance === true) {
            $this->Phinstance                       = \Phine\Phine::Phinstance();
        }
        
        $this->initENV();
    }
    
    # 2.2 __get
    final public function __get($Var): ?string
    {
        if(isset($this->ENV[$Var]))
        {
            return $this->ENV[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        return $this->ENV;
    }
    
    # 4 Private methods
    # 4.1 initGet
    private function initENV()
    {
        $this->ENV                                  = filter_input_array(INPUT_ENV);
    }
}