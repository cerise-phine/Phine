<?php
namespace Handlers;

class Get
{
    # 1 Variables and constants
    private         $Get                            = null;

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct()
    {
        $this->initGet();
    }
    
    # 2.2 __get
    final public function __get($Var = 'all'): ?string
    {
        if($Var === 'all')
        {
            return $this->Get;
        }
        elseif(isset($this->Get[$Var]))
        {
            return $this->Get[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.6 __debugInfo
    final public function __debugInfo(): ?array
    {
        return $this->Get;
    }
    
    # 4 Private methods
    # 4.1 initGet
    private function initGet()
    {
        $this->Get                                  = filter_input_array(INPUT_GET);
    }
}